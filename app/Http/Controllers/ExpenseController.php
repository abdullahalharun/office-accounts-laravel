<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PDF;
use TCG\Voyager\Models\Category;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->fromdate || request()->category || request()->account){
            $expenses = Expense::whereBetween('date', [request()->fromdate, request()->todate])
                                ->orWhere('cat_id', request()->category)
                                ->orWhere('account', request()->account)
                                ->orderBy('id', 'DESC')->get();
            // dd($expenses);
        } else {
            $expenses = Expense::orderBy('id', 'DESC')->paginate(20);
        }
        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $expense_cat->id)->get();

        return view('expense.index', compact('expenses', 'categories', 'accounts'));

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
        $expenses = Expense::all();

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
            $fileName = pathinfo($fileNameWithExtension , PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('invoice')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $fileName.'_'.time().'.'.$extension;
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

        return redirect()->route('expense.index')->with('success', 'New Expense Inserted Successfully');
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
            $fileName = pathinfo($fileNameWithExtension , PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('invoice')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = $fileName.'_'.time().'.'.$extension;
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

        return redirect()->route('expense.index')->with('success', 'Expense Updated Successfully');
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

        return redirect()->back()->with('success', 'Expense Deleted Successfully');
    }

    public function filter_expense()
    {
        if(request()->fromdate || request()->category || request()->account){
            $expenses = Expense::whereBetween('date', [request()->fromdate, request()->todate])
                                ->orWhere('category_id', request()->category)
                                ->orWhere('account_id', request()->account)
                                ->orderBy('id', 'DESC')->get();
            // dd($expenses);
        } else {
            $expenses = Expense::orderBy('id', 'DESC')->get();
        }
        $accounts = Account::all();
        $expense_cat = Category::where('slug', 'expense')->first();
        $categories = Category::where('parent_id', $expense_cat->id)->get();

        return view('expense.index', compact('expenses', 'categories', 'accounts'));
    }

    public function create_invoice($id)
    {
        $expense = Expense::find($id);
        // dd($expense);

        $pdf = PDF::loadview('expense.invoice', ['expense' => $expense]);

        return $pdf->stream('invoice.pdf');
    }
}
