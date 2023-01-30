<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('earning.index') }}" :active="request()->routeIs('earning.index')">
            All Earning
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('earning.create') }}" :active="request()->routeIs('earning.create')">
            {{ __('Add New') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('earning-category.create') }}" :active="request()->routeIs('earning-category.create')">
            {{ __('Add Earning Category') }}
        </x-jet-nav-link>
        <x-jet-nav-link :active="request()->routeIs('earning-category.edit')">
            {{ __('Edit Category') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Filter form -->
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit Category
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('earning-category.update', $category->id) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-4">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                        <input type="text" name="name" value="{{ $category->name }}" id="name" required placeholder="Category name..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="admission_target" class="block text-sm font-medium text-gray-700">Admission Target</label>
                                        <input type="number" name="admission_target" value="{{ $category->admission_target }}" id="admission_target" required placeholder="Admission target..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                                        <input type="number" name="order" value="{{ $category->order }}" id="order" required placeholder="Category order..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Table component -->
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">#ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-center">Slug</th>
                            <th class="py-3 px-6 text-center">Order</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($categories as $category)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $category->id }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $category->slug }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $category->order }}</span>
                                </div>
                            </td>

                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>







@section('content')
<div class="row mb-4">
    <div class="col-lg-6 col-12">
        <div class="card-header bg-white py-15">Add New Expense Category</div>

        <form class="card text-center form-horizontal card-body" method="post" action="{{ route('expense-category.store') }}">
            {{ csrf_field() }}

            <div class="mb-15 row">
                <label class="col-sm-2 col-form-label" for="example-input-small">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="cat_name" id="no" class="form-control">
                </div>
            </div>

            <div class="mb-15 mb-0 justify-content-start row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-6 col-12">

        <div class="card mb-15">
            <div class="card-header bg-transparent py-15">Latest Category</div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#C ID</th>
                            <th>Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>

                            <td class="text-right">
                                <a class="text-secondary" href="/expense-category/{{$category->id}}/edit"><i class="fas fa-edit"></i></a>
                                <!-- <a class="text-danger" href="#"><i class="fas fa-trash"></i></a> -->
                                <form style="display:inline-block;" action="{{ action('ExpensecategoryController@destroy', $category->id) }}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" id="MId" value="{{$category->id}}">
                                    <button class="btn text-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </form>

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