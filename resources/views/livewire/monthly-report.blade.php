<div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Filter Show Hide Button -->
                <!-- <a  class="px-4 py-4 bg-gray-200"> Filter Expense </a> -->

                <!-- Filter form -->
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                        Monthly Report
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>


                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-12 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                                <select id="year" wire:model="year" autocomplete="year" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Select Year</option>
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
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- <div class="flex flex-wrap mx-4 my-8">
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-red-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($expenses->sum('amount') + $expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge'), 2) }}</p>
                                <p>Total Expense</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - $earnings->sum('charge'), 2) }}</p>
                                <p>Total Earnings</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - $earnings->sum('charge') - $expenses->sum('amount') - $expenses->sum('charge') - $salaries->sum('amount') - $salaries->sum('charge'), 2) }}</p>
                                <p>Net Earnings</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 sm:px-6 bg-gray-200">

                    <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                        Report of: {{ date('F', strtotime($this->datefrom)) .', '. $year }} <br>
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="flex flex-wrap mx-4 my-8">
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-red-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($expenses->sum('amount') + $expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge'), 2) }}</p>
                                <p>Total Expense</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - $earnings->sum('charge'), 2) }}</p>
                                <p>Total Earnings</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/3 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - $earnings->sum('charge') - $expenses->sum('amount') - $expenses->sum('charge') - $salaries->sum('amount') - $salaries->sum('charge'), 2) }}</p>
                                <p>Net Earnings</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-yellow-400 rounded-lg flex items-center p-6">
                            <svg viewBox="0 0 20 20" class="w-16 h-16 fill-current mr-4 hidden lg:block">
                                <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">##</p>
                                <p>Last Month</p>
                            </div>
                        </div>
                    </div> -->
                </div>

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
                            <th class="py-3 px-6 text-left">Amount</th>
                            <th class="py-3 px-6 text-left">Charge</th>
                            <th class="py-3 px-6 text-left">Net Expense</th>
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
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_charge }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $expense->total_amount + $expense->total_charge }}</span>
                            </td>
                        </tr>
                        @endforeach


                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Total</th>
                                <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_charge') }}</th>
                                <th class="py-3 px-6 text-left">{{ $expenseByCategory->sum('total_amount') + $expenseByCategory->sum('total_charge') }}</th>
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
                            <th class="py-3 px-6 text-left">Amount</th>
                            <th class="py-3 px-6 text-left">Charge</th>
                            <th class="py-3 px-6 text-left">Net Earning</th>
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
                                <span class="font-medium">{{ $earning->total_amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $earning->total_charge }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $earning->total_amount - $earning->total_charge }}</span>
                            </td>
                        </tr>
                        @endforeach


                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Total</th>
                                <th class="py-3 px-6 text-left">{{ $earningByCategory->sum('total_amount') }}</th>
                                <th class="py-3 px-6 text-left">{{ $earningByCategory->sum('total_charge') }}</th>
                                <th class="py-3 px-6 text-left">{{ $earningByCategory->sum('total_amount') - $earningByCategory->sum('total_charge') }}</th>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>