<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content=" PNG image free download | Stylish hindi font clipart PNG download, poster designing PNG, banner editing png, Free PNG images download" />
    <meta name="keywords"
        content=",free PNG,transparent background,free clipart,clip art,free download,studio background,animal png,flower png,free download" />
    <meta name="author" content="Pintu Kumar - PTS">
    <!-- ---------Title------------------ -->
    <title> - transparent background PNG cliparts free download | AllPNGFree</title>
    <!-- ---------------Favicon--------- -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('/storage/images/logo/pngcity_logo.png') }}" />
    <!-- .............Custom CSS........ -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/css/style.css') }}" />
    <!-- ...............Font Awesome...... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- ...........Bootstrap.......... -->
    <link rel="stylesheet" href="{{ url('/admin/plugins/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- .........Title........ -->
    <script>
        window.onload = function() {
            document.getElementById('preloader').style.display = "none";
            document.getElementById('main-body').style.display = "block";
        }
    </script>
</head>

<body id="main-body">
    <div id="preloader">
        <img src="{{ url('/frontend/assets/images/preloader.gif') }}" alt="preloader">
    </div>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background-color: #b80479">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">PngCity</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                @if($category->cat_status == 1)
                                    <li><a class="dropdown-item"
                                            href="{{ url('/search?clipart=' . $category->cat_id) }}">{{ $category->cat_name }}</a>
                                    </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form action="{{ url('/search?clipart=') }}  @php isset($_GET['clipart']) ? $_GET['clipart'] : ''; @endphp " class="d-flex w-100" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
