<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('salary.create') }}" :active="request()->routeIs('salary.create')">
            {{ __('New Salary') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('salary.index') }}" :active="request()->routeIs('salary.index')">
            All Salary
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('employee.create') }}" :active="request()->routeIs('employee.create')">
            {{ __('Add New Employee') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-4 py-4 sm:px-6 bg-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            New Salary
                        </h3>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('salary.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                        <div class="col-span-3 md:col-span-1">
                                            <label for="month" class="block text-sm font-medium text-gray-700">Salaried Month</label>
                                            <input type="month" name="month" value="{{ Carbon\Carbon::now()->previous('month')->format('Y-m') }}" id="salaried_month" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-3 md:col-span-1">
                                            <label for="disburse_date" class="block text-sm font-medium text-gray-700">Disburse Date</label>
                                            <input type="date" name="disburse_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="disburse_date" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="employee" class="block text-sm font-medium text-gray-700">Employee</label>
                                            <select id="employee" name="employee_id" autocomplete="employee" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select Employee</option>
                                                @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="account" class="block text-sm font-medium text-gray-700">From Account</label>
                                            <select id="account" name="account_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select Account</option>
                                                @foreach($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-3 md:col-span-1">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Amount</label>
                                            <input type="text" name="amount" required placeholder="Enter amount..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-3 md:col-span-1">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Charge</label>
                                            <input type="text" name="charge" required placeholder="Transaction charge..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="from" class="block text-sm font-medium text-gray-700">Note</label>
                                            <textarea name="details" id="" cols="30" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-4 py-4 sm:px-6 bg-gray-200 border-b">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Salaries of {{ date('F', strtotime(now())) }}
                        </h3>
                    </div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">Employee</th>
                                <th class="py-3 px-6 text-center">Account</th>
                                <th class="py-3 px-6 text-center">Details</th>
                                <!-- <th class="py-3 px-6 text-center">Amount (৳{{ $salaries->sum('amount') }})</th>
                                <th class="py-3 px-6 text-center">Charge (৳{{ $salaries->sum('charge') }})</th> -->
                                <th class="py-3 px-6 text-center">Net Amount (৳{{ $salaries->sum('amount') + $salaries->sum('charge') }})</th>
                                <!-- <th class="py-3 px-6 text-center">Voucher</th> -->
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($salaries as $salary)
                            <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">

                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->employee_name->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->account_name->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->details }}</span>
                                    </div>
                                </td>
                                <!-- <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->amount }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->charge }}</span>
                                    </div>
                                </td> -->
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $salary->amount + $salary->charge }}</span>
                                    </div>
                                </td>
                                <!-- <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <a href="/salary/{{$salary->id}}/create-voucher" target="_blank"><span>Create Voucher</span></a>
                                    </div>
                                </td> -->
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
                                            <a href="/salary/{{ $salary->id }}/edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
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
                                    <th class="py-3 px-6 text-center"></th>
                                    <th class="py-3 px-6 text-center"></th>
                                    <th class="py-3 px-6 text-center">Total Amount</th>
                                    <!-- <th class="py-3 px-6 text-center">৳ {{ $salaries->sum('amount') }}</th>
                                    <th class="py-3 px-6 text-center">৳ {{ $salaries->sum('charge') }}</th> -->
                                    <th class="py-3 px-6 text-center">৳ {{ $salaries->sum('amount') + $salaries->sum('charge') }}</th>
                                    <!-- <th class="py-3 px-6 text-center"></th> -->
                                    <th class="py-3 px-6 text-center"></th>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>