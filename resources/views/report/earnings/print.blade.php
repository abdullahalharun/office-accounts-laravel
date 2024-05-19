<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taibah Earnings Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body onload="printDocument()">
    <div class="container flex justify-end py-6 print:hidden">
        <!-- <a href="/report/monthly" class="px-6 py-2 mx-3 bg-blue-600 hover:bg-blue-500 text-white rounded-lg">Back</a> -->
        <button onclick="window.print()" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg">Print</button>
    </div>

    <div class="my-4">
        <div class="flex justify-center py-8 space-y-1">
            <div class="text-center">
                <h1 class="text-xl">Earnings Report</h1>
                <p class="border-b py-1">{{ $title }}</p>
            </div>
        </div>

        <div class="container mx-auto sm:px-6 lg:px-8">
            <!-- Table component -->
            <table class="w-a4 h-a4 ">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b border-gray-300">
                        <th class="py-3 px-6 w-1/12 text-left">#ID</th>
                        <th class="py-3 px-6 w-2/12 text-left">Date</th>
                        <th class="py-3 px-6 w-2/12 text-left">Category</th>
                        <!-- <th class="py-3 px-6 w-4/12 text-left">Details</th> -->
                        <!-- <th class="py-3 px-6 text-center">Account</th> -->
                        <th class="py-3 px-6 w-3/12 text-right">Amount</th>

                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($earnings as $earning)
                    <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $earning->id }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ date('d M Y', strtotime($earning->date)) }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $earning->category_name->name }}</span>
                            </div>
                        </td>
                        <!-- <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{ $earning->details }}</span>
                            </div>
                        </td> -->
                        <!-- <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span>{{ $earning->account_name->name }}</span>
                            </div>
                        </td> -->
                        <td class="py-3 px-6 text-right">
                            <div class="flex items-center justify-end">
                                <span class="font-medium">৳ {{ $earning->total_amount + $earning->total_charge }}</span>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left"></th>
                            <th class="py-3 px-6 text-left"></th>
                            <!-- <th class="py-3 px-6 text-left"></th> -->
                            <!-- <th class="py-3 px-6 text-left"></th> -->
                            <th class="py-3 px-6 text-right">Total Amount</th>
                            <th class="py-3 px-6 text-right font-medium">৳{{ $earnings->sum('total_amount') + $earnings->sum('total_charge') }}</th>
                        </tr>
                    </thead>
                </tbody>
            </table>

            <div class="flex justify-end">
                <div class="border-t border-gray-400 text-gray-500 mt-24">
                    <p>Approved by</p>
                    <p>Dr. Mohammad Monzur E Elahi</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printDocument() {
            window.print()
        }
    </script>
</body>

</html>