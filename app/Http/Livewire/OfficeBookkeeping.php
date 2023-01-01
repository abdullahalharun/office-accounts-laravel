<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Salary;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class OfficeBookkeeping extends Component
{
    public $earnings, $earningByCategory, $officeDeposit;
    public $expenses, $expenseByCategory, $officeExpense;
    public $salaries;
    public $recentTransfers;
    public $categories;
    public $query;
    public $date, $month, $year, $datefrom, $dateto, $displayMonth;

    public function mount()
    {
        $this->month = date('m', strtotime(now()));
        $this->year =  date('Y', strtotime(now()));
    }

    public function render()
    {
        $this->datefrom = date($this->year . '-' . $this->month . '-01');
        $this->dateto = date($this->year . '-' . $this->month . '-31');
        // dd($this->month);
        $this->earnings = Earning::whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->expenses = Expense::whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->salaries = Salary::whereBetween('month', [$this->datefrom, $this->dateto])->get();
        $this->categories = Category::all();
        $this->expenseByCategory = Expense::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();

        $this->earningByCategory = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();

        $this->officeDeposit = Transaction::where('account_id', 1)
            ->whereBetween('date', [$this->datefrom, $this->dateto])->get();
        $this->officeExpense = Expense::whereBetween('date', [$this->datefrom, $this->dateto])->get();

        $parent_category = Category::where('slug', 'transfer')->first();
        $this->recentTransfers = Transaction::where('parent_id', $parent_category->id)
            ->where('account_id', 1)
            ->whereBetween('date', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->lastOfMonth()->toDateString()])
            ->orderBy('date', 'desc')->limit(6)->get();

        return view('livewire.office-bookkeeping');
    }
}
