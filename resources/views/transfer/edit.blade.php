<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('statement.index') }}" :active="request()->routeIs('statement.index')">
            All Statement
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('account.index') }}" :active="request()->routeIs('account.index')">
            {{ __('Accounts') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('transfer.create') }}" :active="request()->routeIs('transfer.create')">
            {{ __('New Transfer') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('transfer.index') }}" :active="request()->routeIs('transfer.index')">
            {{ __('All Transfers') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div class=" overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-4 sm:px-6 bg-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            New Transfer
                        </h3>
                    </div>
                    <div class="bg-white shadow-xl mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('transfer.update', $trxTo->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-3 gap-4">

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                            <input type="date" name="date" value="{{ $trxTo->date }}" id="date" required autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="account" class="block text-sm font-medium text-gray-700">From Account</label>
                                            <select id="account" name="from_account_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select Account</option>
                                                @foreach($accounts as $account)
                                                <option value="{{ $account->id }}" {{ $trxFrom->account_id == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="account" class="block text-sm font-medium text-gray-700">To Account</label>
                                            <select id="account" name="to_account_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select Account</option>
                                                @foreach($accounts as $account)
                                                <option value="{{ $account->id }}" {{ $trxTo->account_id == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Amount</label>
                                            <input type="text" name="amount" value="{{ $trxTo->credit }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="from" class="block text-sm font-medium text-gray-700">Note</label>
                                            <textarea name="details" id="" cols="30" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">{{ $trxTo->details }}</textarea>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category" class="block text-sm font-medium text-gray-700">Purpose</label>
                                            <select id="category" name="category_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select Purpose</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $trxTo->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-4 py-4 sm:px-6 bg-gray-200 border-b">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Recent Transfers
                        </h3>
                    </div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Date</th>
                                <!-- <th class="py-3 px-6 text-center">Category</th> -->
                                <th class="py-3 px-6 text-center">Account</th>
                                <!-- <th class="py-3 px-6 text-center">Details</th> -->
                                <th class="py-3 px-6 text-center">Debit (৳{{ $transactions->sum('debit') }})</th>
                                <th class="py-3 px-6 text-center">Credit (৳{{ $transactions->sum('credit') }})</th>
                                <th class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($transactions as $transaction)
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
                                <!-- <td class="py-3 px-6 text-left">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $transaction->details }}</span>
                                    </div>
                                </td> -->
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{ $transaction->debit }}</span>
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
                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <a href="/transfer/{{$transaction->id}}" onclick="deleteConfirmation('{{$transaction->id}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                            <form method="POST" id="delete-form-{{$transaction->id}}" action="{{route('transfer.destroy', [$transaction->id])}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left"></th>
                                    <!-- <th class="py-3 px-6 text-center"></th> -->
                                    <th class="py-3 px-6 text-center">Total Amount</th>
                                    <th class="py-3 px-6 text-center">৳ {{ $transactions->sum('debit') }}</th>
                                    <th class="py-3 px-6 text-center">৳ {{ $transactions->sum('credit') }}</th>
                                    <th class="py-3 px-6 text-center"></th>
                                </tr>
                            </thead>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteConfirmation(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you confirm to delete this?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();

                    Swal.fire(`Deleting...`, '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Delete denied!', '', 'warning')
                }
            })
        }
    </script>
</x-app-layout>