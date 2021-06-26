@extends('layouts.admin')

@section('content') 
    <div class="row mb-15">
        <div class="col-lg-12 col-12">
            <div class="card-header bg-white py-15">Filter</div>

            <form class="card text-center form-horizontal card-body" method="post" action="{{ route('expense.store') }}">
                {{ csrf_field() }}
                
                   <!-- Status -->
                   <div class="mb-15 row">
                        <label class="col-sm-1 col-form-label" for="example-input-small">Category</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="cat_id">
                                <option value="">Select category</option>
                                @foreach($expensecategories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-1 col-form-label" for="example-input-small">Account</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="account">
                                <option value="">Select Account</option>
                                @foreach($accounts as $account)
                                <option value="{{$account->id}}">{{$account->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    
                    <div class="mb-15 row">
                        <label class="col-sm-1 col-form-label" for="example-date-input">Date</label>
                        <div class="col-sm-4 col-lg-4">
                            <input type="date" name="date" id="example-date-input" class="form-control">
                        </div>
                        <label class="col-sm-1 col-form-label" for="example-date-input">To</label>
                        <div class="col-sm-4 col-lg-4">
                            <input type="date" name="date" id="example-date-input" class="form-control">
                        </div>

                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>

                    <!-- <div class="mb-15 row">
                        <label class="col-sm-2 col-form-label" for="example-input-small">Expense Details</label>
                        <div class="col-sm-10">
                            <input type="textarea" name="details" id="title" class="form-control">
                        </div>
                    </div>
                    
                    <div class="mb-15 row">
                        <label class="col-sm-2 col-form-label" for="example-input-small">Amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" value="" id="title" class="form-control">
                        </div>
                    </div>

                    <div class="mb-15 row">
                        <label class="col-sm-2 col-form-label" for="example-input-small">Expense From</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="account">
                                <option value="">Select Account</option>
                                @foreach($accounts as $account)
                                <option value="{{$account->id}}">{{$account->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-15 row">
                        <label class="col-sm-2 col-form-label" for="example-input-small">Remarks</label>
                        <div class="col-sm-10">
                            <input type="textarea" name="remarks" id="title" class="form-control">
                        </div>
                    </div>  -->
                                        
                    <!-- <div class="mb-15 mb-0 justify-content-start row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>                 -->
            </form>
        </div>
    </div>

    <div class="row mt-5">
        
        <div class="col-lg-12 col-12">

            <div class="card mb-15">
                <div class="card-header bg-transparent py-15">All Expenses</div>

                <div class="table-responsive table-striped">
                    <table class="table px-15">
                        <thead>
                            <tr>
                                <th>#Category</th>
                                <th>Details</th>
                                <th>Account</th>
                                <th>Remarks</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                            <tr>
                                <td>{{$expense->category_name->name}}</td>
                                <td>{{$expense->details}}</td>                                
                                <td>{{$expense->account_name->name}}</td>
                                <td>{{$expense->remarks}}</td>
                                <td>{{$expense->amount}}</td>
                                <td><a href="#">Create a Invoice</a></td>
                                <!-- <td class="text-right">
                                    <a class="text-secondary" href="/expense/{{$expense->id}}/edit"><i class="fas fa-edit"></i></a>
                                    <a class="text-danger" href="#"><i class="fas fa-trash"></i></a>
                                        <form style="display:inline-block;" action="{{ action('ExpenseController@destroy', $expense->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" id="MId" value="{{$expense->id}}">
                                            <button class="btn text-danger" type="submit"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-default btn-sm btn-icon btn-transparent font-xl"
                                            type="button" id="d350ad" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="d350ad">
                                                <a class="dropdown-item" href="#">View</a>
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Detele</a>
                                            </div>
                                        </button>
                                    </div>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
