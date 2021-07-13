<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::all();

        return view('salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        // $get_employees =  Http::get('https://taibahacademy.com/api/employees');
        // $employees = json_decode($get_employees);
        $employees = Employee::all();

        return view('salary.create', compact('accounts', 'employees'));
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

        $parent_category = Category::where('slug', 'expense')->first();
        $category = Category::where('slug', 'salary')->first();
        
        $transaction = new Transaction;
        $transaction->parent_id     = $parent_category->id;
        $transaction->category_id   = $category->id;
        $transaction->account_id    = $request->get('account_id');
        $transaction->details       = $request->get('details');
        $transaction->debit         = $request->get('amount');
        $transaction->credit        = 0;
        $transaction->save();

        $salary = new Salary;
        $salary->month          = Carbon::createFromFormat('Y-m', $request->get('month'));
        $salary->transaction_id = $transaction->id;
        $salary->employee_id    = $request->get('employee_id');
        $salary->account_id     = $request->get('account_id');
        $salary->details        = $request->get('details');
        $salary->amount         = $request->get('amount');
        $salary->save();

        return redirect()->back()->withSuccess('Salary has been inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }

    public function create_voucher($id)
    {
        $voucher = Salary::find($id);
        // dd($expense);

        $pdf = PDF::loadview('salary.voucher', compact('voucher'));

        return $pdf->stream('voucher.pdf');
    }
}
