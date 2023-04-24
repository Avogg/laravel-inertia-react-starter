<div >
<div class="p-4 mb-4 card bg-base-300 rounded-lg shadow-xs">
    <div class="p-4 card bg-base-300 rounded-lg shadow-xs">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-3 mb-4">
                <div class="form-control">
                    <label class="label">Nome</label>
                    <input type="text" placeholder="Template" class="input" wire:model="name" />
                    @error('name')
                    <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <button class="btn btn-primary mt-5 flex justify-center items-center text-center space-x-5" type="submit">
                {{ __('Atualizar') }}
                <div wire:loading wire:target="submit">
                    <x-feathericon-loader class="text-white animate-spin ml-5" />
                </div>
            </button>
        </form>
    </div>

</div>

<div class="p-4 card bg-base-300 rounded-lg shadow-xs">
    <form wire:submit.prevent="addPhoto">
        <div class="flex items-end gap-8">
            <div class="form-control">
                <label class="label">Nome</label>
                <input type="file" wire:model="photo" class="file-input w-full max-w-xs" accept="image/*" />
                @error('photo')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary mt-5 flex justify-center items-center text-center space-x-5" type="submit">
                {{ __('Adicionar') }}
                <div wire:loading wire:target="addPhoto">
                    <x-feathericon-loader class="text-white animate-spin ml-5" />
                </div>
            </button>
        </div>


    </form>
</div>

</div>
