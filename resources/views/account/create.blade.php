@extends('layouts.admin')

@section('content') 
    <div class="row mb-4">
        <div class="col-lg-6 col-12">
            <div class="card-header bg-white py-15">Add New Account</div>

            <form class="card text-center form-horizontal card-body" method="post" action="{{ route('account.store') }}">
                {{ csrf_field() }}
                               
                    <div class="mb-15 row">
                        <label class="col-sm-2 col-form-label" for="example-input-small">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="acc_name" id="no" class="form-control">
                        </div>
                    </div>
                                                            
                    <div class="mb-15 mb-0 justify-content-start row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">Add Account</button>
                        </div>
                    </div>                
            </form>
        </div>

        <div class="col-lg-6 col-12">

        <div class="card mb-15">
                <div class="card-header bg-transparent py-15">All Account</div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#AC ID</th>
                                <th>Account Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                            <tr>
                                <td>{{$account->id}}</td>
                                <td>{{$account->name}}</td>
                                
                                <td class="text-right">
                                    <a class="text-secondary" href="/account/{{$account->id}}/edit"><i class="fas fa-edit"></i></a>
                                    <!-- <a class="text-danger" href="#"><i class="fas fa-trash"></i></a> -->
                                        <form style="display:inline-block;" action="{{ action('AccountController@destroy', $account->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" id="MId" value="{{$account->id}}">
                                            <button class="btn text-danger" type="submit"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    
                                    <!-- <div class="dropdown">
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
                                    </div> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection