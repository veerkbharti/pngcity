@extends('frontend.layouts.main')

@section('main-container')
    <div class="container-fluid shadow page-title mb-2">
        <h6 class="text-center ">{{ $clipart }} Transparent Background PNG Clipart</h6>
    </div>
    <!--Google horizontal ads-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
        crossorigin="anonymous"></script>
    <!-- hori allpng -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1349261392519845" data-ad-slot="2893621029"
        data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <div class=" container-fluid gallery">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <x-image-card title="{{ $post->post_title }}" description="{{ $post->post_content }}"
                    url="{{ $post->post_slug }}" tags="{{ $post->post_tags }}" thumbnail="{{ $post->thumbnail }}" pngWidth="{{$post->png_width}}" pngHeight="{{$post->png_height}}" pngFileSize="{{$post->png_file_size}}" />
            @endforeach
            <!-- Bottom to Top Button -->
            <a id="back-to-top" class="btn btn-light back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
        @else
            <div class='text-align-center'>
                <h4>Result not Found</h4>
            </div>
        @endif
    </div>
    <div class="container ">
        <div class=" mt-5 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
