<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statements = Transaction::orderBy('id', 'DESC')->paginate(20);
        $categories = Category::all();
        $accounts   = Account::all();
        $query = null;

        return view('statements.index', compact('statements', 'categories', 'accounts', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {
        //
    }

    public function filter_transaction()
    {
        if(request()->fromdate || request()->category || request()->account){
            $statements = Transaction::whereBetween('date', [request()->fromdate, request()->todate])
                                ->orWhere('category_id', request()->category)
                                ->orWhere('account_id', request()->account)
                                ->orderBy('id', 'DESC')->get();
            // dd($statements);
        } else {
            $statements = Transaction::orderBy('id', 'DESC')->get();
        }
        $accounts = Account::all();
        // $expense_cat = Category::where('slug', 'expense')->first();
        // $categories = Category::where('parent_id', $expense_cat->id)->get();
        $categories = Category::all();

        $query = request()->all();

        return view('statements.index', compact('statements', 'categories', 'accounts', 'query'));
    }
}
