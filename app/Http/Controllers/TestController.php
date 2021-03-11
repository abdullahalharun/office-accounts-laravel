<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('test.index', compact('expenses'));
    }

    public function test()
    {
        $expenses = Expense::all();
        return view('test.index', compact('expenses'));
    }
}
