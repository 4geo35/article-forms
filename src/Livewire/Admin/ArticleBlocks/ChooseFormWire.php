<?php

namespace GIS\ArticleForms\Livewire\Admin\ArticleBlocks;

use GIS\ArticlePages\Interfaces\ArticleBlockModelInterface;
use GIS\RequestForm\Facades\FormActions;
use Illuminate\View\View;
use Livewire\Component;

class ChooseFormWire extends Component
{
    public ArticleBlockModelInterface $block;
    public string $currentForm = "";

    public function mount(): void
    {
        if (! empty($this->block->description)) {
            $this->currentForm = $this->block->description;
        }
    }

    public function render(): View
    {
        $formList = FormActions::getFormList();
        return view('af::livewire.admin.article-blocks.choose-form-wire', compact('formList'));
    }

    public function setFormType(string $type): void
    {
        if ($this->currentForm === $type) {
            $this->reset("currentForm");
        } else {
            $this->currentForm = $type;
        }
        $this->block->update([
            "description" => $this->currentForm
        ]);
        $this->block->refresh();
    }
}
