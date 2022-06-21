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
    <link rel="shortcut icon" type="image/jpg" href="{{ url('/frontend/assets/images/favicon.png') }}" />
    <!-- .............Custom CSS........ -->
    <link rel="stylesheet" href="{{ url('/frontend/assets/css/style.css') }}" />
    <!-- ...............Font Awesome...... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- ...........Bootstrap.......... -->
    <link rel="stylesheet" href="{{ url('/admin/plugins/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- .........Title........ -->
</head>

<body>


    <header class="container-fluid bg-dark sticky-top py-2 main">
        <div class="row align-items-center">
            <div class="col-sm-3 col-4 justify-content-center ">
                <a href="{{ url('/') }}"><img src="{{ asset('/storage/images/header_logo.png') }}"
                        alt="logo"></a>
            </div>
            <div class=" col-sm-9 col-8">
                <form class="d-flex" action="{{ url('/search?clipart=') }} @php isset($_GET['clipart']) ? $_GET['clipart'] : ''; @endphp ">
                    @php

                        if (isset($_GET['clipart'])) {
                            $value = $_GET['clipart'];
                        } else {
                            $value = '';
                        }
                    @endphp
                    <input class="form-control me-2 py-lg-2" value="<?= $value ?>" type="search" name="clipart"
                        placeholder="Search for free png clipart..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </header>
