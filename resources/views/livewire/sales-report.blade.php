<div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Filter Show Hide Button -->
                <!-- <a  class="px-4 py-4 bg-gray-200"> Filter Expense </a> -->

                <!-- Filter form -->
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 text-center">
                        Sales Report
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


        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 sm:px-6 bg-gray-200">

                    <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                        Report of: {{ date('F', strtotime($this->datefrom)) .', '. $year }} <br>
                    </h3>
                </div>
                <div class="flex flex-wrap mx-4 my-8">
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
                </div>
            </div>
        </div> -->
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid md:grid-cols-1 md:gap-6">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6 bg-green-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Sales Report - {{ date('F', strtotime($this->datefrom)) .', '. $year }}
                    </h3>
                </div>

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Category</th>
                            <th class="py-3 px-6 text-left">Admission Target</th>
                            <th class="py-3 px-6 text-left">Admitted</th>
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
                                <span class="font-medium">{{ $earning->category_name->admission_target ?? '' }}</span>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $earning->total_count }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>