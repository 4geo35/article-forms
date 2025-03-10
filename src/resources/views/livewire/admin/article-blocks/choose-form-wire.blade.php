<div>
     <div class="flex flex-wrap">
         @foreach($formList as $item)
             <button type="button" wire:click="setFormType('{{ $item->key }}')" wire:loading.attr="disabled"
                     class="mr-2 mb-indent-half btn {{ $currentForm === $item->key ? 'btn-dark' : 'btn-outline-dark' }}">
                 {{ $item->title }}
             </button>
         @endforeach
     </div>
    <div class="text-info font-medium mt-indent-half text-xs">
        Выберите какая форма будет выведена в блоке. Название выбранной формы будет закрашено. Если форма не выбрана, блок не будет отображен на сайте.
    </div>
</div>
