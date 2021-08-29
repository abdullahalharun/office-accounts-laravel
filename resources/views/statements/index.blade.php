<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('statement.index') }}" :active="request()->routeIs('statement.index')">
            All Statement
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('account.index') }}" :active="request()->routeIs('account.index')">
            {{ __('Accounts') }}
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
                            <th class="py-3 px-6 text-center">Debit (৳{{ $statements->sum('debit') }})</th>
                            <th class="py-3 px-6 text-center">Credit (৳{{ $statements->sum('credit') }})</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                      @foreach($statements as $statement)
                        <tr class="border-b border-gray-200 @if($loop->even) bg-gray-50 @endif hover:bg-gray-100">
                            
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">                                    
                                    <span>{{ $statement->date }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->category_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->account_name->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->details }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->debit }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                  <span>{{ $statement->credit }}</span>
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
                                <th class="py-3 px-6 text-center">৳ {{ $statements->sum('debit') }}</th>
                                <th class="py-3 px-6 text-center">৳ {{ $statements->sum('credit') }}</th>
                            </tr>
                        </thead>
                        </tbody>
                </table>          
            </div>
        </div>
    </div>

</x-app-layout>