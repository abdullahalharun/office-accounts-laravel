<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="/report" :active="request()->is('report')">
            Full Report
        </x-jet-nav-link>
        <x-jet-nav-link href="/report/monthly" :active="request()->is('report/monthly')">
            Monthly Report
        </x-jet-nav-link>
    </x-slot>

    @livewire('monthly-report')

</x-app-layout>