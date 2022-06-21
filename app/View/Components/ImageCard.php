<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageCard extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $thumbnail;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $description;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $tags;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public function __construct($title, $thumbnail, $description, $tags, $url)
    {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->description = $description;
        $this->tags = $tags;
        $this->url = $url;
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
