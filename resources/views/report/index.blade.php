<x-app-layout>
    <x-slot name="header">
        @if (auth()->user()->hasRole('admin'))
        <x-jet-nav-link href="/report" :active="request()->is('report')">
            Office Bookkeeping
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/monthly" :active="request()->routeIs('report/monthly')">
            Monthly Report
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/full-report" :active="request()->is('report/full-report')">
            Full Report
        </x-jet-nav-link>
        @endif
        <x-jet-nav-link href="/report/sales" :active="request()->is('report/sales')">
            Sales Report
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8 px-3 lg:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-wrap mx-4 my-8">
                    <div class="w-full xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount'), 2) }}</p>
                                <p>Total Revenue</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-red-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($expenses->sum('amount') + $expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge') + $earnings->sum('charge'), 2) }}</p>
                                <p>Total Expense</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - ($expenses->sum('amount') + $expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge') + $earnings->sum('charge')), 2) }}</p>
                                <p>Net Earnings</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Livewire component -->
                @livewire('report')

            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid md:grid-cols-2 md:gap-6">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6 bg-red-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Expense Report By Category
                    </h3>
                </div>

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Category</th>
                            <!-- <th class="py-3 px-6 text-left">Amount</th>
                            <th class="py-3 px-6 text-left">Charge</th> -->
                            <th class="py-3 px-6 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($expenseByCategory as $expense)
                        <tr class="border-b border-gray-200  hover:bg-gray-100">
                            <th class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <a href="/expense/{{$expense->id}}">{{ $expense->parent_category->name }}</a>
                                </div>
                            </th>
                            <!-- <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_charge }}</span>
                            </td> -->
                            <td class="py-3 px-6 text-right whitespace-nowrap">
                                <span class="font-medium">{{ number_format($expense->total_amount + $expense->total_charge, 2) }}</span>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="border-b border-gray-200  hover:bg-gray-100">
                            <th class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>SSL/Bkash Charge</span>
                                </div>
                            </th>
                            <td class="py-3 px-6 text-right whitespace-nowrap">
                                <span class="font-medium">{{ number_format($earnings->sum('charge'), 2) }}</span>
                            </td>
                        </tr>

                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Total</th>
                                <!-- <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_charge') }}</th> -->
                                <th class="py-3 px-6 text-right">{{ number_format($expenseByCategory->sum('total_amount') + $expenseByCategory->sum('total_charge') + $earnings->sum('charge'), 2) }}</th>
                            </tr>
                        </thead>
                    </tbody>
                </table>

            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6 bg-green-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Earning Report By Category
                    </h3>
                </div>

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-left">Admitted</th>
                            <!-- <th class="py-3 px-6 text-left">Charge</th> -->
                            <th class="py-3 px-6 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($earningByCategory as $earning)
                        <tr class="border-b border-gray-200  hover:bg-gray-100">
                            <th class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $earning->category_name->name }}</span>
                                </div>
                            </th>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $earning->total_count }}</span>
                            </td>
                            </td>
                            <td class="py-3 px-6 text-right whitespace-nowrap">
                                <span class="font-medium">{{ number_format($earning->total_amount, 2) }}</span>
                            </td>
                        </tr>
                        @endforeach


                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Total</th>
                                <th class="py-3 px-6 text-left"></th>
                                <!-- <th class="py-3 px-6 text-left">{{ $earningByCategory->sum('total_charge') }}</th> -->
                                <th class="py-3 px-6 text-right">{{ number_format($earningByCategory->sum('total_amount'), 2) }}</th>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>