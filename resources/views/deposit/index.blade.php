<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('deposit.index') }}" :active="request()->routeIs('deposit.index')">
            All Deposit
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('deposit.create') }}" :active="request()->routeIs('deposit.create')">
            {{ __('New Deposit') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('transfer.create') }}" :active="request()->routeIs('transfer.create')">
            {{ __('Transfer Money') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Table component -->
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-center">Category</th>
                            <th class="py-3 px-6 text-center">Account</th>
                            <th class="py-3 px-6 text-center">Details</th>
                            <th class="py-3 px-6 text-center">Amount (৳{{ $deposits->sum('amount') }})</th>
                            <th class="py-3 px-6 text-center">Charge (৳{{ $deposits->sum('charge') }})</th>
                            <th class="py-3 px-6 text-center">Net Deposit (৳{{ $deposits->sum('amount') - $deposits->sum('charge') }})</th>
                            <th class="py-3 px-6 text-center">Voucher</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach($deposits as $deposit)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">

                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ date('d M Y', strtotime($deposit->date)) }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->category_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->account_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->details }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->amount }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->charge }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span>{{ $deposit->amount - $deposit->charge }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <a href="/deposit/{{$deposit->id}}/create-voucher" target="_blank"><span>Create Voucher</span></a>
                                </div>
                            </td>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
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
                                <th class="py-3 px-6 text-left"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center">Total Amount</th>
                                <th class="py-3 px-6 text-center">৳ {{ $deposits->sum('amount') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $deposits->sum('charge') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $deposits->sum('amount') - $deposits->sum('charge') }}</th>
                                <th class="py-3 px-6 text-center"></th>
                                <th class="py-3 px-6 text-center"></th>
                            </tr>
                        </thead>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>