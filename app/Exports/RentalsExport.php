<?php
namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RentalsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Return a collection of the data.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager load related models to optimize the query
        return Rental::with(['user', 'item', 'customer'])->get();
    }

    /**
     * Map the data for each rental to match the headings.
     *
     * @param mixed $rental
     * @return array
     */
    public function map($rental): array
    {
        return [
            $rental->rentalID,
            $rental->item ? $rental->item->itemName : '',  
            $rental->customer ? $rental->customer->first_name : '',  
            $rental->rentalDate,
            $rental->returnDate,
            $rental->quantity,
            $rental->paid,
            $this->formatAmountDue($rental->amountDue),  
            $rental->user ? $rental->user->name : '', 
            $rental->isReturned ? 'Yes' : 'No'
        ];
    }

    /**
     * Explicitly format the amount due.
     *
     * @param mixed $amountDue
     * @return float
     */
    private function formatAmountDue($amountDue): float
    {
        //check if the amount due is 0
        if ($amountDue == 0) {
            return 0;
        }

        return $amountDue;
    }

    /**
     * Define the headings for each column.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Rental ID',
            'Item ID',
            'Customer ID',
            'Rental Date',
            'Return Date',
            'Quantity',
            'Paid',
            'Amount Due',
            'Processed By',
            'Returned'
        ];
    }
}
