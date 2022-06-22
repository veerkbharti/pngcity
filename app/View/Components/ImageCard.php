<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageCard extends Component
{
    public $title;
    public $url;
    public $thumbnail;
    public $description;
    public $tags;
    public $pngWidth;
    public $pngHeight;
    public $pngFileSize;




    public function __construct($title, $thumbnail, $description, $tags, $url, $pngWidth, $pngHeight, $pngFileSize)
    {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->description = $description;
        $this->tags = $tags;
        $this->url = $url;
        $this->pngWidth = $pngWidth;
        $this->pngHeight = $pngHeight;
        $this->pngFileSize = $pngFileSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image-card');
    }
}
