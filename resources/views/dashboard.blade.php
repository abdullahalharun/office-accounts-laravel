<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">            
              
                <div class="flex flex-wrap mx-4 my-8">
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-red-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ $total_expenses->sum('amount') + $total_expenses->sum('charge') + $salaries->sum('amount') + $salaries->sum('charge') }}</p>
                                <p>Total Expense</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            
                            <!-- <svg viewBox="0 0 20 20" class="w-16 h-16 fill-current mr-4 hidden lg:block">
                                <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
                            </svg> -->
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ $earnings->sum('amount') - $earnings->sum('charge') }}</p>
                                <p>Total Earnings</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-green-400 rounded-lg flex items-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                            <div class="text-gray-700">
                                <p class="font-semibold text-3xl">{{ $earnings->sum('amount') - $earnings->sum('charge') - $total_expenses->sum('amount') - $total_expenses->sum('charge') - $salaries->sum('amount') - $salaries->sum('charge') }}</p>
                                <p>Net Earnings</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="w-1/2 xl:w-1/4 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6"><svg viewBox="0 0 20 20" class="w-16 h-16 fill-current mr-4 hidden lg:block">
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
                    {{ $expense['total_amount'] }},
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