<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_category = Category::where('slug', 'transfer')->first();
        $transactions = Transaction::where('parent_id', $parent_category->id)->orderBy('date', 'desc')->paginate(20);

        return view('transfer.index', compact('transactions', 'parent_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $parent_category = Category::where('slug', 'transfer')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();

        $transactions = Transaction::where('parent_id', $parent_category->id)->orderBy('date', 'desc')->limit(8)->get();

        return view('transfer.create', compact('accounts', 'parent_category', 'categories', 'transactions'));
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
            'from_account_id'   => 'required',
            'to_account_id'     => 'required',
            'amount'            => 'required',
        ]);

        $parent_category = Category::where('slug', 'transfer')->first();

        $debit = new Transaction;
        $debit->date          = $request->get('date');
        $debit->parent_id     = $parent_category->id;
        $debit->category_id   = $request->get('category_id');
        $debit->account_id    = $request->get('from_account_id');
        $debit->details       = $request->get('details');
        $debit->debit         = $request->get('amount');
        $debit->credit        = 0;
        $debit->save();

        $credit = new Transaction;
        $credit->date          = $request->get('date');
        $credit->parent_id     = $parent_category->id;
        $credit->category_id   = $request->get('category_id');
        $credit->account_id    = $request->get('to_account_id');
        $credit->details       = $request->get('details');
        $credit->debit         = 0;
        $credit->credit        = $request->get('amount');
        $credit->save();

        return redirect()->route('account.index')->withSuccess('Fund transfered Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = Account::all();
        $parent_category = Category::where('slug', 'transfer')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();

        return view('transfer.edit', [
            'accounts'      => $accounts,
            'categories'    => $categories,
            'trxTo'         => Transaction::find($id),
            'trxFrom'       => Transaction::find($id - 1),
            'transactions'  => Transaction::where('parent_id', $parent_category->id)->orderBy('id', 'desc')->limit(8)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'from_account_id'   => 'required',
            'to_account_id'     => 'required',
            'amount'            => 'required',
        ]);

        $parent_category = Category::where('slug', 'transfer')->first();

        $debit = Transaction::find($id - 1);
        $debit->date          = $request->get('date');
        $debit->parent_id     = $parent_category->id;
        $debit->category_id   = $request->get('category_id');
        $debit->account_id    = $request->get('from_account_id');
        $debit->details       = $request->get('details');
        $debit->debit         = $request->get('amount');
        $debit->credit        = 0;
        $debit->save();

        $credit = Transaction::find($id);
        $credit->date          = $request->get('date');
        $credit->parent_id     = $parent_category->id;
        $credit->category_id   = $request->get('category_id');
        $credit->account_id    = $request->get('to_account_id');
        $credit->details       = $request->get('details');
        $credit->debit         = 0;
        $credit->credit        = $request->get('amount');
        $credit->save();

        return redirect()->back()->withSuccess('Transfer Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        Transaction::find($id - 1)->delete();

        return redirect()->route('transfer.create')->withSuccess('Fund transfer deleted successfully!');
    }
}
