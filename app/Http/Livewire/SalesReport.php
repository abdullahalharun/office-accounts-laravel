<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Salary;
use Livewire\Component;

class SalesReport extends Component
{
    public $earnings;
    public $expenses;
    public $earningByCategory;
    public $expenseByCategory;
    public $salaries;
    public $categories;
    public $query;
    public $year;
    public $month;
    public $datefrom;
    public $dateto;
    public $displayMonth;

    // protected $listeners = ['updateReport' => '$refresh'];

    public function mount()
    {
        $this->month = date('m', strtotime(now()));
        $this->year =  date('Y', strtotime(now()));
    }

    public function render()
    {
        $this->datefrom = date($this->year . '-' . $this->month . '-01');
        $this->dateto = date($this->year . '-' . $this->month . '-31');
        $this->expenses = Expense::whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->salaries = Salary::whereBetween('month', [$this->datefrom, $this->dateto])->get();
        $this->categories = Category::all();
        $this->earnings = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, count(amount) as total_count, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->get();
        $this->earningByCategory = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, count(amount) as total_count, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();

        return view('livewire.sales-report');
    }
}
