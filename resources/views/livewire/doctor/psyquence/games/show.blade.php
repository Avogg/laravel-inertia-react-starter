<div>
    <a href="#" wire:click="shuffle" class="btn btn-primary m-4">Baralhar</a>
    <div class="grid grid-cols-3 gap-8" wire:sortable="updateOrder">

        @foreach ($psyquenceGameImages as $image)
                <div wire:sortable.item="{{ $image['id'] }}" wire:key="task-{{ $image['id'] }}"
                    class="card bg-base-100 shadow-xl flex justify-between items-center">
                    <img wire:sortable.handle src="{{ asset($image['image'])}}" width="250" />
                    <textarea class="textarea w-full" wire:model="answers.{{$image["id"]}}" placeholder="Escreve aqui"></textarea>
                </div>
        @endforeach

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal" wire:model="modal" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Parabéns!</h3>
    <p class="py-4">Acertaste na ordem!</p>
    <div class="modal-action">
      <label for="my-modal" class="btn">Yay!</label>
    </div>
  </div>
</div>
</div>
