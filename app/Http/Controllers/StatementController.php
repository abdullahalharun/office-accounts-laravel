<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Statement;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    protected $model;

    public function __construct(Transaction $model)
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
        $statements = Transaction::orderBy('id', 'DESC')->paginate(20);
        $categories = Category::all();
        $accounts   = Account::all();
        $query = [
            'fromdate' => '',
            'todate'    => '',
            'category'  => '',
            'account'   =>  '',
        ];

        return view('statements.index', compact('statements', 'categories', 'accounts', 'query'));
    }

    public function filter_transaction(Request $request)
    {
        $builder = $this->model;
        
        if(request()->fromdate || request()->category || request()->account){

            if(!empty($request->fromdate)){
                $builder = $builder->whereBetween('date', [request()->fromdate, request()->todate]);
            }
            
            if(!empty($request->category)){
                $builder = $builder->where('category_id', request()->category);
            }
            
            if(!empty($request->account)){
                $builder = $builder->where('account_id', request()->account);
            }

            $statements = $builder->get();
            


            // $statements = Transaction::whereBetween('date', [request()->fromdate, request()->todate])
            //                     ->orWhere('category_id', request()->category)
            //                     ->orWhere('account_id', request()->account)
            //                     ->orderBy('id', 'DESC')->get();
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
