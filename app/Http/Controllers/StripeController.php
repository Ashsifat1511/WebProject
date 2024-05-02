<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $productItems = [];

        Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {
            $product_name = $details['product_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];

            $unit_amount = $total * 100; // Convert total to cents for Stripe

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'USD',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => auth()->user()->id
            ],
            'customer_email' => auth()->user()->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        DB::beginTransaction();
        try {
            $cart = session('cart');
            foreach ($cart as $id => $details) {
                $item = Item::findOrFail($id);
                $item->decrement('stock', $details['quantity']);

                if ($item->rentalOrSale === 'Rental') {
                    Rental::create([
                        'Item_itemID' => $id,
                        'rentalDate' => now()->format('Y-m-d'),
                        'returnDate' => now()->addDays(7)->format('Y-m-d'),
                        'quantity' => $details['quantity'],
                        'paid' => $details['price'],
                        'Customers_customerID' => auth()->user()->customer->id,
                    ]);
                } elseif ($item->rentalOrSale === 'Sale') {
                    Purchase::create([
                        'purchaseDate' => now()->format('Y-m-d'),
                        'purchaseQuantity' => $details['quantity'],
                        'Item_itemID' => $id,
                        'Customers_customerID' => auth()->user()->customer->id,
                        'payAmount' => $details['price'],
                    ]);
                }
            }
            session()->forget('cart');
            DB::commit();

            if(auth()->user()->role == 'Admin'|| auth()->user()->role == 'Employee'){
                return view('denial.admin');
            }

            return view('success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('error')->with('error', 'Failed to process your transaction: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        if(auth()->user()->role == 'Admin'|| auth()->user()->role == 'Employee'){
            return view('denial.admin');
        }
        return view('cancel');
    }
}
