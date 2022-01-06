<div>

    

    <div class="px-4 py-4 sm:px-6 bg-white-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Yearly Reports
        </h3>
    </div>

    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Year</th>
                <th class="py-3 px-6 text-left">2018</th>
                <th class="py-3 px-6 text-left">2019</th>
                <th class="py-3 px-6 text-left">2020</th>
                <th class="py-3 px-6 text-left">2021</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">

            <tr class="border-b border-gray-200  hover:bg-gray-100">
                <th class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>Income</span>
                    </div>
                </th>
                <td class="py-3 px-6 text-left whitespace-nowrap">                    
                    <span class="font-medium">{{ $earnings_18->sum('amount') - $earnings_18->sum('charge') }}</span>
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $earnings_19->sum('amount') - $earnings_19->sum('charge') }}</span>                    
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $earnings_20->sum('amount') - $earnings_20->sum('charge') }}</span>
                    
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $earnings_21->sum('amount') - $earnings_21->sum('charge') }}</span>
                </td>
            </tr>
            <tr class="border-b border-gray-200  hover:bg-gray-100">
                <th class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>Expense</span>
                    </div>
                </th>
                <td class="py-3 px-6 text-left whitespace-nowrap">                    
                    <span class="font-medium">{{ $expense_18->sum('amount') + $expense_18->sum('charge') }}</span>
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $expense_19->sum('amount') + $expense_19->sum('charge') }}</span>                    
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $expense_20->sum('amount') + $expense_20->sum('charge') }}</span>
                    
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $expense_21->sum('amount') + $expense_21->sum('charge') }}</span>
                </td>
            </tr>

            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Net Earnings</th>
                    <th class="py-3 px-6 text-left">{{ $earnings_18->sum('amount') - $expense_18->sum('amount') }}</th>
                    <th class="py-3 px-6 text-left">{{ $earnings_19->sum('amount') - $expense_19->sum('amount') }}</th>
                    <th class="py-3 px-6 text-left">{{ $earnings_20->sum('amount') - $expense_20->sum('amount') }}</th>
                    <th class="py-3 px-6 text-left">{{ $earnings_21->sum('amount') - $expense_21->sum('amount') }}</th>
                </tr>
            </thead>
        </tbody>
    </table>

    

</div>