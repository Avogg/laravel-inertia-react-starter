<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            {{ __('Sessões Psyquence') }}

            <a href="{{ route('doctors.psyquence.create')}}">
                <x-primary-button class="flex gap-4 items-center justify-center"><x-feathericon-plus />Novo</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="p-4 card bg-base-300 rounded-lg shadow-xs">
        <livewire:doctor.psyquence.games.index />
    </div>
</x-app-layout>
