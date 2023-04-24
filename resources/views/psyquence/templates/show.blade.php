<x-app-layout>
    <x-slot name="header">
            {{ $psyquence->name }}
    </x-slot>

    <livewire:doctor.psyquence.templates.show :psyquence="$psyquence" />

    <div class="p-4 card bg-base-300 rounded-lg shadow-xs mt-4">
        <livewire:doctor.psyquence.templates.index :psyquence="$psyquence" />
    </div>
</x-app-layout>
