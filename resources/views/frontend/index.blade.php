<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="  free transparent background Clipart" />
    <meta name="keywords" content="  ,clip art,studio background,animal png,flower png,free download" />
    <meta name="author" content="Pintu Kumar - PTS">
    <link rel="canonical" href="">

    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="{{ url('/') }}" />
    <meta name="description"
        content="All Types PNG image free download | Stylish hindi font clipart PNG download, poster designing PNG, banner editing png, Free PNG images download" />
    <meta name="keywords"
        content="free PNG,transparent background,free clipart,clip art,studio background,animal png,flower png,free download" />
    <meta name="author" content="Pintu Kumar - PTS">
    <title>AllPNGFree - All Types PNG image free download</title>
    <!-- ---------------Favicon--------- -->
    <link rel="shortcut icon" type="image/jpg" href="{{ url('/frontend/assets/images/favicon.png') }}" />
    <!-- .............Custom CSS........ -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/css/style.css') }}" />
    <!-- ...............Font Awesome...... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- ...........Bootstrap.......... -->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script>
        window.onload = function() {
            document.getElementById('preloader').style.display = "none";
            document.getElementById('home').style.display = "block";
        }
    </script>

    <!-- Google Adesence verification code-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
        crossorigin="anonymous"></script>
</head>

<body>
    <div id="preloader">
        <img src="{{ url('/frontend/assets/images/preloader.gif') }}" alt="preloader">
    </div>
    <div id="home">
        <!-- Header section starts -->
        <header class="container-fluid home-page">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-7 m-auto">
                    <a href="{{ url('/') }}" class="logo d-inline-block"><img
                            src="{{ asset('/storage/images/logo.png') }}" alt="logo"></a>
                    <form class="search-bar d-flex" action="{{ url('/search?clipart=') }}  @php isset($_GET['clipart']) ? $_GET['clipart'] : ''; @endphp ">
                        <input class="px-3" type="search" required name="clipart"
                            placeholder="Search for free png clipart..." />
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="#F14A2D"
                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                </path>
                            </svg></button>
                    </form>
                    <h1 class="">All Types HD PNG Images, Clipart Free Download</h1>
                </div>
            </div>
        </header>
        <!-------------------- Header section ends ------------->
        <!-- -------------------------Category Bar------------- -->
        <section class="category-lg sticky-top">
            <ul class="cat-ul ">
                <li><a href="{{ url('/') }}">All</a></li>
                @foreach ($categories as $category)
                    @if ($category->status == 1 && $category->no_of_posts > 0)
                        <li><a
                                href="{{ url('/search') }}?clipart={{ $category->cat_name }}">{{ $category->cat_name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </section>
        <div class="category-sm sticky-top dropdown w-100">
            <button class="btn w-100 btn-lg btn-light dropdown-toggle" type="button"
                style="border-bottom: 2px solid #dd5500;" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                Category
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('/') }}">All</a></li>
                @foreach ($categories as $category)
                    @if ($category->status == 1 && $category->no_of_posts > 0)
                        <li><a class='dropdown-item' href="{{ url('/') }}?png={{ $category->cat_name }}">
                                {{ $category->cat_name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- -------------------------Category Bar------------- -->
        <!--Google ads horizontal-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
                crossorigin="anonymous"></script>
        <!-- Allpng horizontal -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1349261392519845"
            data-ad-slot="8328426866" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!------------------- Gallery Section Start---------------------------------------->
        <div class=" container-fluid gallery">
            @foreach ($posts as $post)
                <x-image-card  title="{{ $post->post_title }}" description="{{ $post->post_desc }}" url="{{ $post->slug_url }}"
                     tags="{{ $post->tags }}" thumbnail="{{ $post->thumbnail }}" />
            @endforeach
        </div>

        <div class="container ">
            <div class=" mt-5 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <!-- Google ads -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
                crossorigin="anonymous"></script>
        <!-- Allpng horizontal -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1349261392519845"
            data-ad-slot="8328426866" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        @include('frontend.layouts.footer')
    </div>

    <!-- Bottom to Top Button -->
    <a id="back-to-top" class="btn btn-light back-to-top " role="button"><i class="fas fa-chevron-up"></i></a>


    <!-- ...........Scripts Files........... -->
    <!-- .....JQuery file....... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin/assets/js/plugins.js" type="text/javascript"></script>
    <!-- ---------------Custom Scripts-------------- -->
    <script src="{{ url('/frontend/assets/js/script.js') }}"></script>
    <!-- .........Bootstrap............... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
