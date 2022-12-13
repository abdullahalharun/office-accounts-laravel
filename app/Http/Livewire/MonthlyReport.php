<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Salary;
use Livewire\Component;

class MonthlyReport extends Component
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
        $this->datefrom = date($this->year . '-' . $this->month . '-1');
        $this->dateto = date($this->year . '-' . $this->month . '-31');
        $this->earnings = Earning::whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->expenses = Expense::whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->salaries = Salary::whereBetween('month', [$this->datefrom, $this->dateto])->get();
        $this->categories = Category::all();
        $this->expenseByCategory = Expense::groupBy('parent_id')
            ->selectRaw('parent_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();
        $this->earningByCategory = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();

        return view('livewire.monthly-report');
    }
}
