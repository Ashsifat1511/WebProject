<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Models\Rental;

class UpdateStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update item stock based on overdue rentals';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $overdueRentals = Rental::whereNotNull('returnDate')
            ->where('returnDate', '<', now())
            ->get();

        foreach ($overdueRentals as $rental) {
            $item = Item::find($rental->Item_itemID);
            if ($item) {
                // Increment the stock by the rental quantity for the returned item
                $item->stock += $rental->quantity;
                $item->save();
            }
        }

        $this->info('Stock updated successfully based on overdue rentals.');
    }
}
