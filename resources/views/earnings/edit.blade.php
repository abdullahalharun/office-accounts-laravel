<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('earning.index') }}" :active="request()->routeIs('earning.index')">
            All Earning
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('earning.create') }}" :active="request()->routeIs('earning.create')">
            {{ __('Add New') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('earning-category.create') }}" :active="request()->routeIs('earning-category.create')">
            {{ __('Manage Category') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="#" :active="request()->routeIs('earning.edit')">
            {{ __('Edit Earning') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Filter form -->
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit Earning
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('earning.update', $earning->id) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input type="date" name="date" value="{{ $earning->date ? $earning->date : old('date') }}" id="date" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category" name="category_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $earning->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="account" class="block text-sm font-medium text-gray-700">From Account</label>
                                        <select id="account" name="account_id" autocomplete="country" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select Account</option>
                                            @foreach($accounts as $account)
                                            <option value="{{ $account->id }}" {{ $earning->account_id == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Amount</label>
                                        <input type="text" name="amount" value="{{ $earning->amount }}" required placeholder="earning amount..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Charge</label>
                                        <input type="text" name="charge" value="{{ $earning->charge }}" required placeholder="Transaction charge..." class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="from" class="block text-sm font-medium text-gray-700">Details</label>
                                        <textarea name="details" value="{{ $earning->details }}" id="" cols="30" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">{{ $earning->details }}</textarea>
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
        </div>
    </div>

</x-app-layout>