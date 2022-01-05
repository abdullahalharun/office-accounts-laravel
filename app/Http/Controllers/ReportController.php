<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Models\Expense;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        $expense_18 = Expense::whereBetween('date', [date('2018-01-01'), date('2018-12-31')])->get();
        $expense_19 = Expense::whereBetween('date', [date('2019-01-01'), date('2019-12-31')])->get();
        $expense_20 = Expense::whereBetween('date', [date('2020-01-01'), date('2020-12-31')])->get();
        $expense_21 = Expense::whereBetween('date', [date('2021-01-01'), date('2021-12-31')])->get();
        $earnings = Earning::all();
        
        return view('report.index', compact('expenses', 'earnings', 'expense_18', 'expense_19', 'expense_20', 'expense_21'));
    }
}