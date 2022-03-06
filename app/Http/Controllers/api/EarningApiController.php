<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EarningApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Earning::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',

        ]);

        // $parent_category = Category::where('slug', 'earnings')->first();

        $transaction                = new Transaction();
        $transaction->date          = Carbon::today()->toDateString();
        $transaction->parent_id     = $request->parent_category;
        $transaction->category_id   = $request->category_id;
        $transaction->account_id    = $request->account_id;
        $transaction->details       = $request->details;
        $transaction->debit         = 0;
        $transaction->credit        = $request->amount - $request->charge;
        $transaction->save();

        $earning = new Earning;
        $earning->date              = Carbon::today()->toDateString();
        $earning->parent_id         = $request->parent_category;
        $earning->category_id       = $request->category_id;
        $earning->transaction_id    = $transaction->id;
        $earning->account_id        = $request->account_id;
        $earning->details           = $request->details;
        $earning->amount            = $request->amount;
        $earning->charge            = $request->charge;
        $earning->save();

        return "New earning created successfully!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Earning::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $earning = Earning::find($id);
        $earning->update($request->all());
        return $earning;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Earning::destroy($id);
    }
}
