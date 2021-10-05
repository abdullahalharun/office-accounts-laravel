<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $month = [ 7, 8, 9, 10, 11, 12, 1, 2, 3, 4, 5, 6, ];
        // $expenses = Expense::whereIn('date', $month)->get();

        $expenses = Expense::select(
            // "id" ,
            DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(DATE_FORMAT(date, '%M-%Y')) as month_year")
            )
            ->orderBy('date')
            ->groupBy(DB::raw("DATE_FORMAT(date, '%M-%Y')"))
            ->get();
        
        // dd($expenses);
                
        return view('dashboard', compact('expenses'));
    }
}
