<form wire:submit.prevent="submit">
    <div class="grid grid-cols-3 mb-4">
        <div class="form-control">
            <label class="label">Nome</label>
            <input type="text" placeholder="Sessão com o..." class="input" wire:model="name" />
            @error('name')
            <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="grid grid-cols-3 mb-4">
        <div class="form-control">
            <label class="label">Template</label>
            <select class="select w-full" wire:model="template_id">
                <option value="0">Escolha uma template</option>
                @foreach ($templates as $template)
                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
            </select>
            @error('template_id')
            <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>

    </div>


    <button class="btn btn-primary mt-5 flex justify-center items-center text-center space-x-5" type="submit">
        {{ __('Criar') }}
        <div wire:loading wire:target="submit">
            <x-feathericon-loader class="text-white animate-spin ml-5" />
        </div>
    </button>
</form>
