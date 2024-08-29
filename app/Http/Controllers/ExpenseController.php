<?php

namespace App\Http\Controllers;

use App\Exports\ExpenseExport;
use App\Models\Expense;
use App\Models\Account;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use TCG\Voyager\Models\Category;

class ExpenseController extends Controller
{
    protected $model;

    public function __construct(Expense $model)
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
        $expenses = Expense::orderBy('id', 'DESC')->paginate(20);

        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        if ($expense_cat == null) {
            $expense_cat = new Category;
            $expense_cat->name = 'Expense';
            $expense_cat->slug = 'expense';
            $expense_cat->save();
        }
        $categories = Category::where('parent_id', $expense_cat->id)->get();
        $query = [
            'fromdate' => '',
            'todate'    => '',
            'category'  => '',
            'account'   =>  '',
        ];

        return view('expense.index', compact('expenses', 'categories', 'accounts', 'query'));

        // return view('expense.index', compact('expenses', 'expensecategories', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();
        $accounts = Account::all();
        $expenses = Expense::whereBetween('date', [Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->lastOfMonth()->toDateString()])->get();

        return view('expense.create', compact('categories', 'expenses', 'accounts'));
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
            'category_id'   => 'required',
            'date'          =>  'required',
            'amount'        => 'required',
            'account_id'    => 'required',
        ]);

        //Handle file upload
        if ($request->hasFile('invoice')) {
            //get filename with the extension
            $fileNameWithExtension = $request->file('invoice')->getClientOriginalName();
            //Get file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('invoice')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $fileName . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('invoice')->storeAs('public/invoices', $fileNametoStore);
        } else {
            $fileNametoStore = null;
        }

        $parent_category = Category::where('slug', 'expense')->first();

        $transaction = new Transaction;
        $transaction->date          = $request->get('date');
        $transaction->parent_id     = $parent_category->id;
        $transaction->category_id   = $request->get('category_id');
        $transaction->account_id    = $request->get('account_id');
        $transaction->details       = $request->get('details');
        $transaction->debit         = $request->get('amount') + $request->get('charge');
        $transaction->credit        = 0;
        $transaction->save();

        $expense = new Expense;
        $expense->date              = $request->get('date');
        $expense->parent_id         = $parent_category->id;
        $expense->category_id       = $request->get('category_id');
        $expense->transaction_id    = $transaction->id;
        $expense->account_id        = $request->get('account_id');
        $expense->details           = $request->get('details');
        $expense->amount            = $request->get('amount');
        $expense->charge            = $request->get('charge');
        $expense->invoice           = $fileNametoStore;
        $expense->save();

        return redirect()->back()->with('success', '#' . $expense->id . ' - Expense added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $expense = Expense::find($id);
        $parent_category = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $parent_category->id)->get();
        $accounts = Account::all();

        return view('expense.edit', compact('categories', 'expense', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
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

        //Handle file upload
        if ($request->hasFile('invoice')) {
            //get filename with the extension
            $fileNameWithExtension = $request->file('invoice')->getClientOriginalName();
            //Get file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('invoice')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $fileName . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('invoice')->storeAs('public/invoices', $fileNametoStore);
        } else {
            $fileNametoStore = null;
        }

        $expense = Expense::find($id);
        $expense->date              = $request->get('date');
        $expense->category_id       = $request->get('category_id');
        $expense->account_id        = $request->get('account_id');
        $expense->details           = $request->get('details');
        $expense->amount            = $request->get('amount');
        $expense->charge            = $request->get('charge');
        $expense->invoice           = $fileNametoStore;
        $expense->save();

        $transaction = Transaction::find($expense->transaction_id);
        $transaction->date          = $request->get('date');
        $transaction->category_id   = $request->get('category_id');
        $transaction->account_id    = $request->get('account_id');
        $transaction->details       = $request->get('details');
        $transaction->debit         = $request->get('amount') + $request->get('charge');
        $transaction->credit        = 0;
        $transaction->save();

        return redirect()->back()->with('success', '#' . $expense->id . ' - Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        return redirect()->back()->with('success', 'Expense Deleted Successfully!');
    }

    public function filter_expense(Request $request)
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

            $expenses = $builder->get();

            // $expenses = Expense::whereBetween('date', [request()->fromdate, request()->todate])
            //                     ->orWhere('category_id', request()->category)
            //                     ->orWhere('account_id', request()->account)
            //                     ->orderBy('id', 'DESC')->get();
            // dd($expenses);
        } else {
            $expenses = Expense::orderBy('id', 'DESC')->get();
        }
        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $expense_cat->id)->get();
        $query = request()->all();

        return view('expense.index', compact('expenses', 'categories', 'accounts', 'query'));
    }

    public function create_invoice($id)
    {
        $expense = Expense::find($id);
        // dd($expense);

        $pdf = PDF::loadview('expense.invoice', ['expense' => $expense]);

        return $pdf->stream('invoice.pdf');
    }

    public function report()
    {

        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $expense_cat->id)->get();
        $expenses = Expense::groupBy('category_id')
            ->selectRaw('date, category_id, account_id, details, SUM(amount) as group_amount, SUM(charge) as group_charge')
            ->get();
        // dd($expenses);

        $query = [
            'fromdate'  => '',
            'todate'    => '',
            'category'  => '',
            'account'   =>  '',
        ];

        return view('expense.report', compact('expenses', 'categories', 'accounts', 'query'));
    }

    public function expenseApi()
    {
        $expenses = Expense::all();

        return $expenses;
    }

    // export test
    public function export(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;

        // dd($fromDate, $toDate);

        return Excel::download(new ExpenseExport($fromDate, $toDate), $fromDate . '_' . $toDate . '_expense.xlsx');
    }
}
