<div class="box shadow" itemscope itemprop="associateMedia" itemtype="http://schema.org/ImageObject">
    <figure>
        <a itemprop="url" href="{{ route('post.slug', ['slug' => $url]) }}" target="_blank"
            style="text-decoration:none; display: inline-block; background: url(images/loading.gif); background-repeat: no-repeat; background-size:15%; background-position: center center; ">
            <img itemprop="thumbnail" class="lazy" alt="{{ $title }}" title="{{ $title }}"
                src="{{ asset('/storage/thumbnails/' . $thumbnail) }}" data-src="{{ $thumbnail }}" />
        </a>
        <figcaption itemprop="caption description" class="px-1 px-sm-3 mb-0 description">
            {{ $title }}
        </figcaption>
    </figure>
    <footer class="d-flex justify-content-between px-1 px-sm-3 ">
        <div class=" "> <span class="d-none d-sm-inline">size: </span>
            <span>{{ $pngWidth . 'x' . $pngHeight }} px</span>
        </div>
        <div class=" text-align-end"><span class=" d-none d-sm-inline">filesize: </span> <span>{{toConvert($pngFileSize)}}</span>
        </div>
    </footer>
    <meta name="description" itemprop="keywords" content="{{ $description }}">
    <meta name="keywords" itemprop="keywords" content="{{ $tags }}">
</div>
