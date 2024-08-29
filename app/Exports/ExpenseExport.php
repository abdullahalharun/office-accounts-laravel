<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpenseExport implements WithHeadings, FromQuery, WithMapping
{
    use Exportable;

    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'Category',
            'Account',
            'Details',
            'Amount',
            'Created_At'
        ];
    }

    public function query()
    {
        return Expense::query()->whereBetween('date', [$this->fromDate, $this->toDate]);
    }

    public function map($expense): array
    {
        return [
            $expense->id,
            $expense->date,
            $expense->category_name->name,
            $expense->account_name->name,
            $expense->details,
            $expense->amount + $expense->charge,
            $expense->created_at
        ];
    }
}
