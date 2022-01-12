<?php

namespace App\Http\Livewire;

use App\Models\Earning;
use App\Models\Expense;
use Livewire\Component;

class Report extends Component
{
    public $expense_22;
    public $expense_21;
    public $expense_20;
    public $expense_19;
    public $expense_18;
    public $earnings_21;
    public $earnings_22;
    public $earnings_20;
    public $earnings_19;
    public $earnings_18;
    
    public function mount()
    {
        $this->expense_22 = Expense::whereBetween('date', [date('2022-01-01'), date('2022-12-31')])->get();
        $this->expense_21 = Expense::whereBetween('date', [date('2021-01-01'), date('2021-12-31')])->get();
        $this->expense_20 = Expense::whereBetween('date', [date('2020-01-01'), date('2020-12-31')])->get();
        $this->expense_19 = Expense::whereBetween('date', [date('2019-01-01'), date('2019-12-31')])->get();
        $this->expense_18 = Expense::whereBetween('date', [date('2018-01-01'), date('2018-12-31')])->get();
        
        $this->earnings_22 = Earning::whereBetween('date', [date('2022-01-01'), date('2022-12-31')])->get();
        $this->earnings_21 = Earning::whereBetween('date', [date('2021-01-01'), date('2021-12-31')])->get();
        $this->earnings_20 = Earning::whereBetween('date', [date('2020-01-01'), date('2020-12-31')])->get();
        $this->earnings_19 = Earning::whereBetween('date', [date('2019-01-01'), date('2019-12-31')])->get();
        $this->earnings_18 = Earning::whereBetween('date', [date('2018-01-01'), date('2018-12-31')])->get();
        
    }

    public function render()
    {
        // $expense_18 = Expense::whereBetween('date', [date('2018-01-01'), date('2018-12-31')])->get();

        return view('livewire.report');
    }
}
