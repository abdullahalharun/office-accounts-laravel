<div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Filter Show Hide Button -->
                <!-- <a  class="px-4 py-4 bg-gray-200"> Filter Expense </a> -->

                <!-- Filter form -->
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                        Office Bookkeeping
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 text-center">
                        {{ date('F, Y', strtotime($this->datefrom))  }}
                    </p>
                </div>

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-12 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                                <select id="year" wire:model="year" autocomplete="year" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Select Year</option>
                                    <option>2024</option>
                                    <option>2023</option>
                                    <option>2022</option>
                                    <option>2021</option>
                                    <option>2020</option>
                                    <option>2019</option>
                                    <option>2018</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="month" class="block text-sm font-medium text-gray-700">Month</label>
                                <select id="month" wire:model="month" autocomplete="month" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 sm:px-6 bg-gray-200">

                    <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                        Summary of <strong> {{ date('F', strtotime($this->datefrom)) .', '. $year }} </strong> <br>
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="flex flex-wrap mx-4 my-8">
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($officeDeposit->sum('credit'), 2) }}</p>
                                <p>Office Deposit</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-red-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($officeExpense->sum('amount') + $officeExpense->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge'), 2) }}</p>
                                <p>Total Expense</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($officeDeposit->sum('credit') - $officeExpense->sum('amount') - $officeExpense->sum('charge') - $salaries->sum('amount') - $salaries->sum('charge'), 2) }}</p>
                                <p>Office Balance</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid md:grid-cols-2 md:gap-6">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6 bg-red-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Expense Report By Category - {{ date('F', strtotime($this->datefrom)) .', '. $year }}
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
                                    <span>{{ $expense->category_name->name }}</span>
                                </div>
                            </th>
                            <!-- <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_charge }}</span>
                            </td> -->
                            <td class="py-3 px-6 text-right whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_amount + $expense->total_charge }}</span>
                            </td>
                        </tr>
                        @endforeach

                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Total</th>
                                <!-- <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_charge') }}</th> -->
                                <th class="py-3 px-6 text-right">{{ $expenseByCategory->sum('total_amount') + $expenseByCategory->sum('total_charge') }}</th>
                            </tr>
                        </thead>
                    </tbody>
                </table>

            </div>

            @if (auth()->user()->hasRole('admin'))
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6 bg-red-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Salary Disbursement - {{ date('F', strtotime($this->datefrom)) .', '. $year }}
                    </h3>
                </div>

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">From Account</th>
                            <th class="py-3 px-6 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($salaries as $salary)
                        <tr class="border-b border-gray-200  hover:bg-gray-100">
                            <th class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $salary->employee_name->name }}</span>
                                </div>
                            </th>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $salary->account_name->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-right whitespace-nowrap">
                                <span class="font-medium">{{ $salary->amount }}</span>
                            </td>
                        </tr>
                        @endforeach


                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-left">Total</th>
                                <th class="py-3 px-6 text-right">{{ $salaries->sum('amount') }}</th>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 sm:px-6 bg-green-200 border-b">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Recent Deposits
                    </h3>
                </div>
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Date</th>
                            <!-- <th class="py-3 px-6 text-center">Category</th> -->
                            <th class="py-3 px-6 text-center">Account</th>
                            <th class="py-3 px-6 text-center">Amount (৳{{ $recentTransfers->sum('credit') }})</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($recentTransfers as $transaction)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">

                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ date('d M Y', strtotime($transaction->date)) }}</span>
                                </div>
                            </td>
                            <!-- <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $transaction->category_name->name }}</span>
                                    </div>
                                </td> -->
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $transaction->account_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $transaction->credit }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center {{ $loop->even ? 'hidden' : '' }}">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a href="/transfer/{{ $transaction->id }}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-center">Total Amount</th>
                                <th class="py-3 px-6 text-center">৳ {{ $recentTransfers->sum('credit') }}</th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>