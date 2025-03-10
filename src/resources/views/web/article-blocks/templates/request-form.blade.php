@props(["block"])
@if ($block->description)
    <div class="mb-indent">
        @php
            $componentName = \GIS\RequestForm\Facades\FormActions::getComponentByKey($block->description);
            $prefix = $postfix = "block-{$block->id}";
        @endphp
        <div class="p-indent rounded-base border border-stroke bg-white">
            <livewire:dynamic-component :component="$componentName"
                                        :prefix="$prefix" :postfix="$postfix" />
        </div>
    </div>
@endif
