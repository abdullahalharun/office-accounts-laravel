<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Salary;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        $expenseByCategory = Expense::groupBy('parent_id')
            ->selectRaw('parent_id, category_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->get();
        // dd($expenseByCategory);
        // $expenseByCategory = Expense::groupBy('category_id')
        //     ->selectRaw('category_id, account_id, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
        //     ->get();

        $expense_18 = Expense::whereBetween('date', [date('2018-01-01'), date('2018-12-31')])->get();
        $expense_19 = Expense::whereBetween('date', [date('2019-01-01'), date('2019-12-31')])->get();
        $expense_20 = Expense::whereBetween('date', [date('2020-01-01'), date('2020-12-31')])->get();
        $expense_21 = Expense::whereBetween('date', [date('2021-01-01'), date('2021-12-31')])->get();

        $salary_18 = Salary::whereBetween('month', [date('2018-01-01'), date('2018-12-31')])->get();
        $salary_19 = Salary::whereBetween('month', [date('2019-01-01'), date('2019-12-31')])->get();
        $salary_20 = Salary::whereBetween('month', [date('2020-01-01'), date('2020-12-31')])->get();
        $salary_21 = Salary::whereBetween('month', [date('2021-01-01'), date('2021-12-31')])->get();
        $salaries = Salary::all();

        $earnings = Earning::all();
        $earningByCategory = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, count(amount) as total_count, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->get();

        return view('report.index', compact(
            'expenses',
            'expenseByCategory',
            'earnings',
            'earningByCategory',
            'expense_18',
            'expense_19',
            'expense_20',
            'expense_21',
            'salaries',
            'salary_18',
            'salary_19',
            'salary_20',
            'salary_21'
        ));
    }

    public function monthly()
    {
        return view('report.monthly');
    }

    public function monthly_print_format(Request $request)
    {
        // $expenses = Expense::groupBy('category_id')
        //     ->selectRaw('id, date, category_id, account_id, details, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
        //     ->whereBetween('date', [$request->datefrom, $request->dateto])
        //     ->get();
        $expenses = Expense::groupBy('id')
            ->selectRaw('id, date, category_id, account_id, details, amount, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$request->datefrom, $request->dateto])
            ->get();

        return view('report.monthly-report-print', [
            'expenses' => $expenses,
            'datefrom' => $request->datefrom
        ]);
    }

    public function office_bookkeeping()
    {
        return view('report.office-bookkeeping');
    }

    public function sales_report()
    {
        return view('report.sales-report');
    }
}
