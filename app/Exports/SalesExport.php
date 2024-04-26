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
            $purchase->payAmount ? $purchase->payAmount : '0',
            $purchase->amountDue ? $purchase->amountDue : '0',
            $purchase->user ? $purchase->user->username : 'No User',
            $purchase->item ? $purchase->item->itemName : 'No Item',
            $purchase->customer ? $purchase->customer->first_name : 'No Customer'
            
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
            'Amount Paid',
            'Due',
            'Sold By',
            'Item Name',
            'Customer Name'            
        ];
    }
}
