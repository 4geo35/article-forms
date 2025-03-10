<?php

namespace GIS\ArticleForms;

use Illuminate\Support\ServiceProvider;

class ArticleFormsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "af");

        // Расширить конфигурацию
        $this->expandConfiguration();
    }

    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/article-forms.php", "article-forms");
    }

    protected function expandConfiguration(): void
    {
        $ap = app()->config["article-pages"];
        $af = app()->config["article-forms"];

        $list = $ap["blockTypesList"];
        $list["request_form"] = $af["buttonTitle"];
        app()->config["article-pages.blockTypesList"] = $list;

        $templates = $ap["blockTypeTemplates"];
        $templates["request_form"] = $af["adminTemplate"];
        app()->config["article-pages.blockTypeTemplates"] = $templates;

        $webTemplates = $ap["webBlockTypeTemplates"];
        $webTemplates["request_form"] = $af["webTemplate"];
        app()->config["article-pages.webBlockTypeTemplates"] = $webTemplates;
    }
}
