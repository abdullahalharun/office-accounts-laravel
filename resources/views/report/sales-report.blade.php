<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="/report" :active="request()->is('report')">
            Office Bookkeeping
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/monthly" :active="request()->is('report/monthly')">
            Monthly Report
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/full-report" :active="request()->is('report/full-report')">
            Full Report
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/sales" :active="request()->is('report/sales')">
            Sales Report
        </x-jet-nav-link>
    </x-slot>

    @livewire('sales-report')

</x-app-layout>