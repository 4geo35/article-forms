<?php

namespace GIS\ArticleForms;

use GIS\ArticleForms\Livewire\Admin\ArticleBlocks\ChooseFormWire;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ArticleFormsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "af");

        // Livewire
        $this->addLivewireComponents();

        // Расширить конфигурацию
        $this->expandConfiguration();
    }

    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/article-forms.php", "article-forms");
    }

    protected function addLivewireComponents(): void
    {
        $component = config("article-forms.customChooseFormComponent");
        Livewire::component(
            "af-choose-form",
            $component ?? ChooseFormWire::class
        );
    }

    protected function expandConfiguration(): void
    {
        $ap = app()->config["article-pages"];

        $list = $ap["blockTypesList"];
        $list["request_form"] = config("article-forms.buttonTitle");
        app()->config["article-pages.blockTypesList"] = $list;

        $templates = $ap["blockTypeTemplates"];
        $templates["request_form"] = config("article-forms.adminTemplate");
        app()->config["article-pages.blockTypeTemplates"] = $templates;

        $webTemplates = $ap["webBlockTypeTemplates"];
        $webTemplates["request_form"] = config("article-forms.webTemplate");
        app()->config["article-pages.webBlockTypeTemplates"] = $webTemplates;
    }
}
