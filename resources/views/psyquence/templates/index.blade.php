<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            {{ __('Psyquence Templates') }}

            @if(auth()->user()->onTrial())
            <a href="{{ route('doctors.psyquence.templates.create')}}">
                <x-primary-button class="flex gap-4 items-center justify-center"><x-feathericon-plus />Novo</x-primary-button>
            </a>
            @else
            <a href="{{ route('checkout')}}">
                <x-primary-button class="flex gap-4 items-center justify-center">Comprar Premium</x-primary-button>
            </a>
            @endif
        </div>
    </x-slot>


    <div class="p-4 card bg-base-300 rounded-lg shadow-xs">
        <livewire:doctor.psyquence.templates.index-templates />
    </div>
</x-app-layout>
