<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('employee.index') }}" :active="request()->routeIs('employee.index')">
            All Employee
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('salary.create') }}" :active="request()->routeIs('salary.create')">
            {{ __('New Salary') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('employee.create') }}" :active="request()->routeIs('employee.create')">
            {{ __('Add New Employee') }}
        </x-jet-nav-link>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">              
                <!-- Filter form -->            
                <div class="px-4 py-4 sm:px-6 bg-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        New Employee
                    </h3>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                    </p> -->
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('employee.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-3 gap-4">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>  
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>  
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input type="text" name="phone" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>  
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                                    <input type="text" name="designation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md">
                                </div>  
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="from" class="block text-sm font-medium text-gray-700">Note</label>
                                    <textarea name="note" id="" cols="30" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-300 rounded-md"></textarea> 
                                </div>
                                
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>