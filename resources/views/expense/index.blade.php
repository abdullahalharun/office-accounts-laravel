<x-app-layout>
    
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense') }}
        </h2> -->
        <!-- <a href="#"><h2>Add New</h2></a> -->
        <x-jet-nav-link href="{{ route('expense.index') }}" :active="request()->routeIs('expense.index')">
            All Expense
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('expense.create') }}" :active="request()->routeIs('create')">
            {{ __('Add New') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('expense-category.create') }}" :active="request()->routeIs('expense-category.create')">
            {{ __('Add New Category') }}
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
                        Filter Expense
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('expense.filter') }}" method="GET">
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
                                    <a href="/expense">
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

 
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">            
              <!-- Table component -->            
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-center">Details</th>
                            <th class="py-3 px-6 text-center">Account</th>
                            <th class="py-3 px-6 text-center">Amount (৳ {{ $expenses->sum('amount') }})</th>
                            <th class="py-3 px-6 text-center">Charge (৳ {{ $expenses->sum('charge') }})</th>
                            <th class="py-3 px-6 text-center">Net Expense (৳ {{ $expenses->sum('amount') + $expenses->sum('charge') }})</th>
                            <th class="py-3 px-6 text-center">Invoice</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                      @foreach($expenses as $expense)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">                                    
                                    <span>{{ date('d M Y', strtotime($expense->date)) }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">                                    
                                    <span class="font-medium">{{ $expense->category_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center justify-center">
                                  <span>{{ $expense->details }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $expense->account_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $expense->amount }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $expense->charge }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $expense->amount + $expense->charge }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <a href="/expense/{{$expense->id}}/create-invoice" target="_blank"><span>Create Invoice</span></a>
                                </div>
                            </td>
                            <!-- <td class="py-3 px-6 text-center">
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                            </td> -->
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="/expense/{{ $expense->id }}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"> 
                                        <a href="/expense/{{ $expense->id }}/delete" class="delete" data-confirm="Are you sure to delete this item?">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg> 
                                        </a>
                                        <!-- <a href="#" id="buttonmodal" data-confirm="Are you sure to delete this item?">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg> 
                                        </a> -->

                                        
                                        
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
                                <th class="py-3 px-6 text-center">Total Amount</th>
                                <th class="py-3 px-6 text-center">৳ {{ $expenses->sum('amount') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $expenses->sum('charge') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $expenses->sum('amount') + $expenses->sum('charge') }}</th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                    </tbody>
                </table>          
            </div>
            @if($expenses instanceof \Illuminate\Pagination\AbstractPaginator)
            {{ $expenses->links() }}
            @endif
        </div>
    </div>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg justify-content-center">            
                
            </div>
        </div>
    </div>
    
    
    <script>    
        var deleteLinks = document.querySelectorAll('.delete');
        
        for (var i = 0; i < deleteLinks.length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();
                
                var choice = confirm(this.getAttribute('data-confirm'));
                
                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
        }
        </script>

    <!--Open modal button-->
    <div>    
        <!-- <button id="buttonmodal" class="focus:outline-none p-2 bg-blue-600 text-white bg-opacity-75 rounded-lg ring-4 ring-indigo-300" type="button">Open modal</button> -->
    </div>

    <div id="modal" class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-500 bg-opacity-50 transform scale-0 transition-transform duration-300">
        <!-- Modal content -->         
        <!-- <div class="absolute bg-black opacity-80 inset-0 z-0"></div> -->
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <form style="display:inline-block;" action="" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" id="MId" value="">
                    <button class="btn text-danger" type="submit"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
                    <!--body-->
                    <div class="text-center p-5 flex-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                                                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                    <p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                            This process cannot be undone</p>    
                    </div>
                    <!--footer-->
                    <div class="p-3  mt-2 text-center space-x-4 md:block">
                        <button id="closebutton" type="button" class="focus:outline-none mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                            Cancel
                        </button>
                        <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Delete</button>
                    </div>
                     
            </div>
        </div>
    </div>

    <script> 
        const button = document.getElementById('buttonmodal')
        const closebutton = document.getElementById('closebutton')
        const modal = document.getElementById('modal')

        button.addEventListener('click',()=>modal.classList.add('scale-100'))
        closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))
    </script>

</x-app-layout>
