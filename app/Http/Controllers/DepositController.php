<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Deposit;
use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::all();
        
        return view('deposit.index', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $parent_category = Category::where('slug', 'deposit')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();

        return view('deposit.create', compact('accounts', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
        ]);

        $deposit = new Deposit;
        $deposit->account_id = $request->get('account');
        $deposit->from = $request->get('from');
        $deposit->details = $request->get('details');
        $deposit->amount = $request->get('amount');
        $deposit->save();

        $parent_category = Category::where('slug', 'deposit')->first();
        
        $transaction = new Transaction;
        $transaction->parent_id     = $parent_category->id;
        $transaction->category_id   = $request->get('category_id');
        $transaction->account_id    = $request->get('account');
        $transaction->details       = $request->get('details');
        $transaction->debit         = 0;
        $transaction->credit        = $request->get('amount');
        $transaction->save();

        return redirect()->back()->withSuccess('Your amount has been deposited successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
