<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-8">
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