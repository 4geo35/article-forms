@props(["block"])
@if ($block->description)
    <div class="mb-indent">
        @php
            $componentName = \GIS\RequestForm\Facades\FormActions::getComponentByKey($block->description);
            $prefix = $postfix = "block-{$block->id}";
        @endphp
        <div class="p-indent md:py-indent-double rounded-base bg-primary/20">
            <div class="md:w-10/12 mx-auto">
                @include("ap::web.article-blocks.templates.title")
                <livewire:dynamic-component :component="$componentName"
                                            :prefix="$prefix" :postfix="$postfix" />
            </div>
        </div>
    </div>
@endif
