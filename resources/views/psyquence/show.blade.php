<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            {{ $psyquenceGame->name }}
        </div>
    </x-slot>

    <div class="p-4 card bg-base-300 rounded-lg shadow-xs">
        <livewire:doctor.psyquence.games.show :psyquenceGame="$psyquenceGame"/>
    </div>

    </div>
</x-app-layout>
