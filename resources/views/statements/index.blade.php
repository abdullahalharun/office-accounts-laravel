<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('statement.index') }}" :active="request()->routeIs('statement.index')">
            All Statement
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('account.index') }}" :active="request()->routeIs('account.index')">
            {{ __('Accounts') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('transfer.create') }}" :active="request()->routeIs('transfer.create')">
            {{ __('Transfer Money') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              
                <!-- Filter Show Hide Button -->
                <!-- <a  class="px-4 py-4 bg-gray-200"> Filter Expense </a> -->

                <!-- Filter form -->            
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Filter Statement
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
              <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('statement.filter') }}" method="GET">
                    <!-- {{ csrf_field() }} -->
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">From</label>
                                    <input type="date" name="fromdate" value="{{ $query['fromdate'] }}" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">To</label>
                                    <input type="date" name="todate" value="{{ $query['todate'] }}" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>

                                <!-- <div class="col-span-6 sm:col-span-4">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div> -->

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="country" name="category" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $query['category'] == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Account</label>
                                    <select id="country" name="account" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select Account</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}" {{ $query['account'] == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <a href="/statement">
                                    Clear Filter
                                </a>
                            </button>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">            
              <!-- Table component -->            
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-center">Category</th>
                            <th class="py-3 px-6 text-center">Account</th>
                            <th class="py-3 px-6 text-center">Details</th>
                            <th class="py-3 px-6 text-center">Debit (৳{{ $statements->sum('debit') }})</th>
                            <th class="py-3 px-6 text-center">Credit (৳{{ $statements->sum('credit') }})</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                      @foreach($statements as $statement)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">
                            
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">                                    
                                    <span>{{ date('d M Y', strtotime($statement->date)) }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->category_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->account_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->details }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->debit }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->credit }}</span>
                                </div>
                            </td>
                           
                        </tr>
                        @endforeach                       
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center">Total Amount</th>
                                <th class="py-3 px-6 text-center">৳ {{ $statements->sum('debit') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $statements->sum('credit') }}</th>
                            </tr>
                        </thead>
                        </tbody>
                </table>          
            </div>
            @if($statements instanceof \Illuminate\Pagination\AbstractPaginator)
                {{ $statements->links() }}
            @endif
        </div>
    </div>

</x-app-layout>