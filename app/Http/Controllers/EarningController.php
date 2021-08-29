<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Earning;
use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $earnings = Earning::all();

        return view('earnings.index', compact('earnings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        $cat_id = Category::where('slug', 'earnings')->first();
        // dd($cat_id->id);
        $categories = Category::where('parent_id', $cat_id->id)->get();

        return view('earnings.create', compact('accounts', 'categories'));
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
            'account_id' => 'required',
            'amount'     => 'required'
        ]);

        $parent_category = Category::where('slug', 'earnings')->first();

        $transaction                = new Transaction;
        $transaction->date          = $request->get('date');
        $transaction->parent_id     = $parent_category->id;
        $transaction->category_id   = $request->get('category_id');
        $transaction->account_id    = $request->get('account_id');
        $transaction->details       = $request->get('details');
        $transaction->debit         = 0;
        $transaction->credit        = $request->get('amount') - $request->get('charge');
        $transaction->save();

        $earning = new Earning;
        $earning->date              = $request->get('date');
        $earning->parent_id         = $parent_category->id;
        $earning->category_id       = $request->get('category_id');
        $earning->transaction_id    = $transaction->id;
        $earning->account_id        = $request->get('account_id');
        $earning->details           = $request->get('details');
        $earning->amount            = $request->get('amount');
        $earning->charge            = $request->get('charge');
        $earning->save(); 

        return redirect()->back()->withSuccess('New Earning Deposited Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function show(Earning $earning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function edit(Earning $earning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Earning $earning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Earning $earning)
    {
        //
    }
}
