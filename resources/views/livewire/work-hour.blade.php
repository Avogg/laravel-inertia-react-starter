<form wire:submit.prevent="submit" class="mt-5" style="margin-bottom: 40px;">
    {{ $this->form }}

    <x-filament::button type="submit" class="mt-2">
        Submeter
    </x-filament::button>
</form>
