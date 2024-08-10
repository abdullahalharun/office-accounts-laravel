<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex flex-col lg:flex-row gap-2">
            <a class="border px-3 py-2 my-2 rounded-full text-white bg-blue-800 hover:bg-blue-700 text-center" href="{{ route('expense.create') }}" :active="request()->routeIs('expense.create')">
                {{ __('Add Expense') }}
            </a>
            <a class="border px-3 py-2 my-2 rounded-full text-white bg-blue-800 hover:bg-blue-700 text-center" href="{{ route('earning.create') }}" :active="request()->routeIs('earning.create')">
                {{ __('Add Income') }}
            </a>
            <a class="border px-3 py-2 my-2 rounded-full text-white bg-blue-800 hover:bg-blue-700 text-center" href="{{ route('transfer.create') }}" :active="request()->routeIs('transfer.create')">
                {{ __('Transfer Money') }}
            </a>
            <a class="border px-3 py-2 my-2 rounded-full text-white bg-blue-800 hover:bg-blue-700 text-center" href="{{ route('report.index') }}" :active="request()->routeIs('report.index')">
                {{ __('See Reports') }}
            </a>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-4">
            <div class="border-t py-2"></div>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                        Bookkeeping of <strong> {{ date('F, Y', strtotime(now())) }} </strong> <br>
                    </h3>
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
                                <p class="font-semibold text-3xl">{{ number_format($officeExpense->sum('amount') + $officeExpense->sum('charge') + $running_month_salary->sum('amount') + $running_month_salary->sum('charge'), 2) }}</p>
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
                                <p class="font-semibold text-3xl">{{ number_format($officeDeposit->sum('credit') - ($officeExpense->sum('amount') + $officeExpense->sum('charge') + $running_month_salary->sum('amount') + $running_month_salary->sum('charge')), 2) }}</p>
                                <p>Office Balance</p>
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

                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 ">
                        Accounts Summary <br>
                    </h3>
                </div>
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
                                <p class="font-semibold text-3xl">{{ number_format($total_expenses->sum('amount') + $total_expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge') + $earnings->sum('charge'), 2) }}</p>
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
                                <p class="font-semibold text-3xl">{{ number_format($earnings->sum('amount') - ($total_expenses->sum('amount') + $total_expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge') + $earnings->sum('charge')), 2) }}</p>
                                <p>Net Earnings</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
            </div>
            <div class="bg-white">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">
                        Expense Chart
                    </div>
                    <canvas class="p-10 " id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
    // const labels = [        
    //     'July',
    //     'August',
    //     'September',
    //     'October',
    //     'November',
    //     'December',
    //     'January',
    //     'February',
    //     'March',
    //     'April',
    //     'May',
    //     'June',
    // ];
    const labels = new Array();
    @foreach($expenses as $label)
    labels.push("{{ $label['month_year'] }}");
    @endforeach;


    const data = {
        labels: labels,
        datasets: [{
            label: 'Expense chart of 2021',
            backgroundColor: 'hsl(252, 82.9%, 67.8%)',
            borderColor: 'hsl(252, 82.9%, 67.8%)',
            // data: [20, 30, 25, 20, 20, 30, 25, 20, 30, 25, 20, 30, 30, 45],
            data: [
                @foreach($expenses as $expense)
                "{{ $expense['total_amount'] }}",
                @endforeach
            ],
        }]
    };

    const configBarChart = {
        type: 'bar',
        data,
        options: {}
    };

    var chartLine = new Chart(
        document.getElementById('chartBar'),
        configBarChart
    );
</script>