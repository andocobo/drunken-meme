<?php namespace Andocobo\QuillHomepage\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Theme;
use RainLab\Pages\Classes\Router;

class QuillHomeComponent extends ComponentBase
{

    public $featurePosts;
    public $featureRepeater;
    public $serviceOverviews;
    public $page;

    public function componentDetails()
    {
        return [
            'name'        => 'QuillHome Component',
            'description' => 'Display the special content areas on the Quill Studios homepage. Eg. Feature content at the top and the service overviews.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $router = new Router(Theme::getActiveTheme());
        $this->page = $this->page['page'] = $router->findByUrl('/');
        

        $this->featureRepeater[] = ['content' => $this->page->getViewBag()->property('feature_repeater[content]'), 'icon' => $this->page->getViewBag()->property('feature_repeater[icon]')];
        $this->featurePosts[] = ['content' => $this->page->getViewBag()->property('feature_content1'), 'icon' => $this->page->getViewBag()->property('feature_icon1')];
        $this->featurePosts[] = ['content' => $this->page->getViewBag()->property('feature_content2'), 'icon' => $this->page->getViewBag()->property('feature_icon2')];
        $this->featurePosts[] = ['content' => $this->page->getViewBag()->property('feature_content3'), 'icon' => $this->page->getViewBag()->property('feature_icon3')];

        $this->serviceOverviews['web'] = ['content' => $this->page->getViewBag()->property('web_content'), 'image' => $this->page->getViewBag()->property('web_image')];
        $this->serviceOverviews['writing'] = ['content' => $this->page->getViewBag()->property('writing_content'), 'image' => $this->page->getViewBag()->property('writing_image')];
        

        /*$settings = Settings::instance();

        if($settings->enable_og_tags)
        {
            $this->ogTitle = empty($this->page->meta_title) ? $this->page->title : $this->page->meta_title;
            $this->ogDescription = $this->page->meta_description;
            $this->ogUrl = empty($this->page->canonical_url) ? Request::url() : $this->page->canonical_url ;
            $this->ogSiteName = $settings->og_sitename;
            $this->ogFbAppId = $settings->og_fb_appid;
        }*/
    }
}

    