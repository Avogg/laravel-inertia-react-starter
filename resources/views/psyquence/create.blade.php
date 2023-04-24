<x-app-layout>
    <x-slot name="header">

            {{ __('Nova Sessão') }}
    </x-slot>

    <div class="p-4 card bg-base-300 rounded-lg shadow-xs">
        <livewire:doctor.psyquence.games.create />
    </div>
</x-app-layout>
