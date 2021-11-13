<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Category;
use App\Models\Expense as ModelsExpense;
use Livewire\Component;

class Expense extends Component
{
    public $expenses;
    public $accounts;
    public $categories;
    public $query;
    public $expenseId;

    public function render()
    {
        $expenses = ModelsExpense::all();
        
        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $expense_cat->id)->get();
        $query = [
            'fromdate' => '',
            'todate'    => '',
            'category'  => '',
            'account'   =>  '',
        ];
        return view('livewire.expense', compact('expenses'));
    }

    public function deleteExpense()
    {
        
        dd('Hello, Ziad.');
    }

}
