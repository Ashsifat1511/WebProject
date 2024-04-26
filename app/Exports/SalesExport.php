<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Return a collection of the data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager load the related user, item, and customer models
        return Purchase::with(['user', 'item', 'customer'])->get();
    }

    /**
     * Map the data for each purchase to match the headings.
     *
     * @param mixed $purchase
     * @return array
     */
    public function map($purchase): array
    {
        return [
            $purchase->purchaseID,
            $purchase->purchaseDate,
            $purchase->purchaseQuantity,
            $purchase->amountDue, // Use null coalescence to ensure 0 is shown if amountDue is null or unset
            $purchase->user ? $purchase->user->username : 'No User', // Display user's username if available
            $purchase->item ? $purchase->item->itemName : 'No Item', // Display item's name if available
            $purchase->customer ? $purchase->customer->first_name : 'No Customer', // Display customer's first name if available
            $purchase->payAmount
        ];
    }

    /**
     * Define the headings for each column.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Purchase ID',
            'Purchase Date',
            'Quantity',
            'Due',
            'Sold By',
            'Item Name',
            'Customer Name',
            'Amount Paid'
        ];
    }
}
