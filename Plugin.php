<?php namespace Andocobo\QuillHomepage;

use Cms\Classes\Page;
use Cms\Classes\Theme;
use System\Classes\PluginManager;
use System\Classes\SettingsManager;
use System\Classes\PluginBase;
use RainLab\Pages\Controllers\Index as PagesController;
use RainLab\Pages\Classes\Page as PageModel;
/**
 * QuillHomepage Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Quill Homepage',
            'description' => 'Extends Static pages plugin to include the fields for the Quill Studios homepage',
            'author'      => 'andocobo',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'andocobo\QuillHomepage\Components\QuillHomeComponent' => 'quillHome'
        ];
    }

    public function registerPageSnippets()
    {
        return [
            'andocobo\QuillHomepage\Components\QuillHomeComponent' => 'quillHome'
        ];
    }

    public function registerWidgets()
    {
        return [
            'andocobo\QuillHomepage\Components\QuillHomeComponent' => 'quillHome'
        ];
    }

    public function boot()
    {
        
        \Event::listen('backend.form.extendFields', function($widget)
        {
            if(PluginManager::instance()->hasPlugin('RainLab.Pages') && $widget->model instanceof PageModel)
            {
                $icons = [
                    'flaticon-aim5'             => 'Aim',
                    'flaticon-bag41'            => 'Bag',
                    'flaticon-book227'          => 'Book 1',
                    'flaticon-book228'          => 'Book 2',
                    'flaticon-book229'          => 'Book 3',
                    'flaticon-briefcase64'      => 'Briefcase',
                    'flaticon-businessman266'   => 'Businessman 1',
                    'flaticon-businessman267'   => 'Businessman 2',
                    'flaticon-businessman268'   => 'Businessman 3',
                    'flaticon-businessman269'   => 'Businessman 4',
                    'flaticon-businessman270'   => 'Businessman 5',
                    'flaticon-call53'           => 'Call',
                    'flaticon-checkered12'      => 'Checkered',
                    'flaticon-checking1'        => 'Checking',
                    'flaticon-clock118'         => 'Clock 1',
                    'flaticon-clock119'         => 'Clock 2',
                    'flaticon-complete3'        => 'Complete',
                    'flaticon-contacts13'       => 'Contracts',
                    'flaticon-cross mark'       => 'Cross Mark',
                    'flaticon-cup47'            => 'Cup',
                    'flaticon-date9'            => 'Date',
                    'flaticon-document186'      => 'Document 1',
                    'flaticon-document187'      => 'Document 2',
                    'flaticon-documents22'      => 'Documents',
                    'flaticon-finish3'          => 'Finish',
                    'flaticon-football161'      => 'Football',
                    'flaticon-game61'           => 'Game', 
                    'flaticon-justice4'         => 'Justice',
                    'flaticon-leaf64'           => 'Leaf',
                    'flaticon-letter96'         => 'Letter',    
                    'flaticon-mind'             => 'Mind',
                    'flaticon-notebook'         => 'Notebook',
                    'flaticon-office38'         => 'Office 1',
                    'flaticon-office41'         => 'Office 2',
                    'flaticon-productivity'     => 'Productivity',
                    'flaticon-reload9'          => 'Reload',
                    'flaticon-sale22'           => 'Sale',
                    'flaticon-speed12'          => 'Speed',
                    'flaticon-suitcase45'       => 'Suitcase',
                    'flaticon-target50'         => 'Target 1',
                    'flaticon-target51'         => 'Target 2',
                    'flaticon-tea24'            => 'Tea',
                    'flaticon-think3'           => 'Think',
                    'flaticon-time25'           => 'Time 1',
                    'flaticon-time30'           => 'Time 2',
                    'flaticon-time31'           => 'Time 3',
                    'flaticon-time32'           => 'Time 4',
                    'flaticon-wine66'           => 'Wine',
                    'flaticon-winner13'         => 'Winner',
                    'flaticon-woman139'         => 'Woman'
                ];

                $files = \Storage::allFiles('/media');
                $fileArray = [];
                
                if(!empty($files))
                {
                    // Array of file type we want to show
                    $imageTypes = ['png', 'jpg', 'jpeg', 'gif', 'tiff', 'doc'];

                    foreach($files as $file)
                    {
                        // Get extentiosn for each file
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        
                        // If the file's extension is in the list we want, then add the file to the
                        // array of options to be added to the dropdown list
                        if(in_array($ext, $imageTypes))
                        {
                            $filename = basename($file);
                            $fileArray[$file] = $filename;
                        }
                    }
                }


                $widget->addFields(
                [
                    'viewBag[feature_repeater]' => [
                        'label' => 'Feature Content',
                        'type'  => 'repeater',
                        'form'  => [
                            'fields' => [
                                    'content' => [
                                        'label' =>  'Content',
                                        'type'  =>  'text'
                                    ],
                                          
                                    'icon'  => [
                                        'label' =>  'Icon',
                                        'type'  =>  'text'
                                    ]
                            ]
                        ],
                        'prompt' => 'Add new feature content',
                        'tab'   =>  'Feature Content'
                    ],

                    'viewBag[feature_content1]' => [
                        'label'   => 'Feature content 1',
                        'type'    => 'richeditor',
                        'tab'     => 'Feature Content'
                    
                    ],
                    'viewBag[feature_icon1]' => [
                        'label'     => 'Feature Icon 1',
                        'type'      =>  'dropdown',
                        'options'   =>  $icons,
                        'tab'       => 'Feature Content'
                    ],
                    'viewBag[feature_content2]' => [
                        'label'   => 'Feature content 2',
                        'type'    => 'richeditor',
                        'tab'     => 'Feature Content'
                    
                    ],
                    'viewBag[feature_icon2]' => [
                        'label'   => 'Feature Icon 2',
                        'type'      =>  'dropdown',
                        'options'   =>  $icons,
                        'tab'     => 'Feature Content'
                    ],
                    'viewBag[feature_content3]' => [
                        'label'   => 'Feature content 3',
                        'type'    => 'richeditor',
                        'tab'     => 'Feature Content'
                    
                    ],
                    'viewBag[feature_icon3]' => [
                        'label'   => 'Feature Icon 3',
                        'type'      =>  'dropdown',
                        'options'   =>  $icons,
                        'tab'     => 'Feature Content'
                    ],

                    'viewBag[web_content]' => [
                        'label'   => 'Web Content',
                        'type'    => 'richeditor',
                        'tab'     => 'Service Overviews'
                    
                    ],
                    'viewBag[web_image]' => [
                        'label'   => 'Web Image',
                        'type'    => 'dropdown',
                        'options' => $fileArray,
                        'tab'     => 'Service Overviews'
                    ],
                    'viewBag[writing_content]' => [
                        'label'   => 'Writing Content',
                        'type'    => 'richeditor',
                        'tab'     => 'Service Overviews'
                    
                    ],
                    'viewBag[writing_image]' => [
                        'label'   => 'Writing Image',
                        'type'    => 'dropdown',
                        'options' => $fileArray,
                        'tab'     => 'Service Overviews'
                    ],

                ],
                'primary');
            }
        });
    }

    /*public function boot()
    {
       public function __construct()
{
    parent::__construct();

    $myWidget = new MyWidgetClass($this);
    $myWidget->alias = 'myWidget';
    $myWidget->bindToController();
}

       \Event::listen('pages.menuitem.listTypes', function() {
            return [
                'feature-content'=>'Feature Content',
                
            ];
        });

        \Event::listen('pages.menuitem.getTypeInfo', function($type) {
            if ($type == 'feature-content')
                return Category::getMenuTypeInfo($type);
        });

        \Event::listen('pages.menuitem.resolveItem', function($type, $item, $url, $theme) {
            if ($type == 'blog-category' || $type == 'all-blog-categories')
                return Category::resolveMenuItem($item, $url, $theme);
        });
    }*/

}
