<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Statement;
use App\Models\SubCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use PDF;

class EarningController extends Controller
{
    protected $model;

    public function __construct(Earning $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $earnings = Earning::orderBy('date', 'DESC')->paginate(20);
        $accounts = Account::all();
        $earning_cat = Category::where('slug', 'earnings')->first();
        $categories = Category::where('parent_id', $earning_cat->id)->get();
        $query = [
            'fromdate' => '',
            'todate'    => '',
            'category'  => '',
            'account'   =>  '',
        ];

        return view('earnings.index', compact('earnings', 'categories', 'accounts', 'query'));
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
        $earning->sub_category       = 0;
        $earning->transaction_id    = $transaction->id;
        $earning->account_id        = $request->get('account_id');
        $earning->details           = $request->get('details');
        $earning->amount            = $request->get('amount');
        $earning->charge            = $request->get('charge');
        $earning->save();

        return redirect()->route('earning.index')->withSuccess('New Earning Deposited Successfully.');
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
    public function edit($id)
    {
        $earning = Earning::find($id);
        $parent_category = Category::where('slug', 'earnings')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();
        $accounts = Account::all();

        return view('earnings.edit', compact('categories', 'earning', 'accounts', 'parent_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'   => 'required',
            'date'          =>  'required',
            'amount'        => 'required',
            'account_id'    => 'required',
        ]);


        $earning = Earning::find($id);
        $earning->date              = $request->get('date');
        $earning->category_id       = $request->get('category_id');
        $earning->account_id        = $request->get('account_id');
        $earning->details           = $request->get('details');
        $earning->amount            = $request->get('amount');
        $earning->charge            = $request->get('charge');
        $earning->save();

        $transaction = Transaction::find($earning->transaction_id);
        $transaction->date          = $request->get('date');
        $transaction->category_id   = $request->get('category_id');
        $transaction->account_id    = $request->get('account_id');
        $transaction->details       = $request->get('details');
        $transaction->debit         = 0;
        $transaction->credit        = $request->get('amount') - $request->get('charge');
        $transaction->save();

        return redirect()->route('earning.index')->with('success', 'Earning Updated Successfully');
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

    public function create_voucher($id)
    {
        $earning = Earning::find($id);

        $pdf = PDF::loadview('earnings.voucher', compact('earning'));

        return $pdf->stream('earning_voucher.pdf');
    }

    public function filter_earning(Request $request)
    {
        $builder = $this->model;

        if (request()->fromdate || request()->category || request()->account) {

            if (!empty($request->fromdate)) {
                $builder = $builder->whereBetween('date', [request()->fromdate, request()->todate]);
            }

            if (!empty($request->category)) {
                $builder = $builder->where('category_id', request()->category);
            }

            if (!empty($request->account)) {
                $builder = $builder->where('account_id', request()->account);
            }

            $earnings = $builder->get();

            // $expenses = Expense::whereBetween('date', [request()->fromdate, request()->todate])
            //                     ->orWhere('category_id', request()->category)
            //                     ->orWhere('account_id', request()->account)
            //                     ->orderBy('id', 'DESC')->get();
            // dd($expenses);
        } else {
            $earnings = Earning::orderBy('id', 'DESC')->get();
        }
        $accounts = Account::all();
        $earning_cat = Category::where('slug', 'earnings')->first();
        $categories = Category::where('parent_id', $earning_cat->id)->get();
        $query = request()->all();

        return view('earnings.index', compact('earnings', 'categories', 'accounts', 'query'));
    }

    public function getsubcategories(Request $request)
    {
        $cates = SubCategory::where('parent_id', $request->parent_id)->get();
        return $cates;
    }
}
