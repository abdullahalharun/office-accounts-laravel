<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Account;
use App\Models\Expensecategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $expensecategories = Expensecategory::all();
        $accounts = Account::all();

        return view('expense.index', compact('expenses', 'expensecategories', 'accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expensecategories = Expensecategory::all();
        $accounts = Account::all();
        $expenses = Expense::all();

        return view('expense.create', compact('expensecategories', 'expenses', 'accounts'));
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
            'cat_id' => 'required',
            'date'  =>  'required',
            'amount' => 'required',
            'account' => 'required',
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
            $fileNametoStore = 'noimage.jpg';
        }

        $expense = new Expense;
        $expense->cat_id = $request->get('cat_id');
        $expense->details = $request->get('details');
        $expense->date = $request->get('date');
        $expense->amount = $request->get('amount');
        $expense->account = $request->get('account');
        $expense->remarks = $request->get('remarks');
        $expense->save();

        return redirect()->back()->with('success', 'Expense Inserted Successfully');
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
        $expensecategories = Expensecategory::all();
        $accounts = Account::all();
        $expenses = Expense::all();
        $expense = Expense::find($id);
        
        return view('expense.edit', compact('expensecategories', 'expenses', 'accounts', 'expense'));
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
            'cat_id' => 'required',
            'date'  =>  'required',
            'amount' => 'required',
            'account' => 'required',
        ]);

        $expense = Expense::find($id);
        $expense->cat_id = $request->get('cat_id');
        $expense->details = $request->get('details');
        $expense->date = $request->get('date');
        $expense->amount = $request->get('amount');
        $expense->account = $request->get('account');
        $expense->remarks = $request->get('remarks');
        $expense->save();

        return redirect()->back()->with('success', 'Expense Updated Successfully');
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
                                ->orWhere('cat_id', request()->category)
                                ->orWhere('account', request()->account)
                                ->get();
            // dd($expenses);
        } else {
            $expenses = Expense::all();
        }
        $accounts = Account::all();
        $categories = Expensecategory::all();

        return view('test.index', compact('expenses', 'categories', 'accounts'));
    }
}
