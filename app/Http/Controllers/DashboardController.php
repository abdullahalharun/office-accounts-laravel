<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Models\Expense;
use App\Models\Salary;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $datefrom = Carbon::now()->startOfMonth()->toDateString();
        $dateto = Carbon::now()->endOfMonth()->toDateString();

        $total_expenses = Expense::all();
        $earnings = Earning::all();
        $salaries = Salary::all();
        $running_month_salary =  Salary::whereBetween('disburse_date', [$datefrom, $dateto])->get();

        $officeDeposit = Transaction::where('account_id', 1)
            ->whereBetween('date', [Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])->get();
        $officeExpense = Expense::whereBetween('date', [Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])->get();

        // $month = [ 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, ];
        // $expenses = Expense::whereIn('date', $month)->get();


        $expenses = Expense::select(
            // "id" ,
            DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(DATE_FORMAT(date, '%M-%Y')) as month_year")
        )
            // ->orderBy('date')
            ->groupBy(DB::raw("DATE_FORMAT(date, '%M-%Y')"))
            ->get();

        // dd($expenses);

        return view('dashboard', compact(
            'expenses',
            'total_expenses',
            'earnings',
            'salaries',
            'officeDeposit',
            'officeExpense',
            'running_month_salary'
        ));
    }
}
