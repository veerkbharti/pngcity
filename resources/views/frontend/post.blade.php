@extends('frontend.layouts.main')

@section('main-container')
    <section class="post">
        <div class="container-fluid shadow page-title">
            <h6 class="text-center ">{{ $post->post_title }}</h6>
        </div>
        <div class="container">
            <div class="row px-lg-3 px-xl-5  gx-4 ">
                <div class=" col-xl-9">
                    <div class="shadow">
                        <figure class=" bg-white">
                            <img itemprop="contentUrl" alt="{{ $post->post_title }}" title="{{ $post->post_title }}"
                                src="{{ asset('/storage/thumbnails/' . $post->thumbnail) }}" oncontextmenu="return false;" />
                            <figcaption itemprop="caption description">
                                {{ $post->post_content }}
                            </figcaption>
                        </figure>
                        <div class="social-share shadow">
                            <ul class="info_list p-0 m-0">
                                <li><a target="_blank"
                                        href="https://twitter.com/share?text={{ $post->post_title }}&url={{ url('post/' . $post->post_slug) }}"><i
                                            class="fab fa-twitter-square" style="color: #03A9F4;"></i></a></li>

                                <li><a target="_blank"
                                        href="https://facebook.com/share.php?u={{ url('post/' . $post->post_slug) }}&p[title]={{ $post->post_title }}"><i
                                            class="fab fa-facebook-square" style="color: #3F51B5;"></i></a></li>

                                <li><a target="_blank"
                                        href="https://pinterest.com/pin/create/button/?url={{ url('post/' . $post->post_slug) }}&media={{ url('thumbnail/' . $post->thumbnail) }}&description={{ $post->post_title }}"><i
                                            class="fab fa-pinterest-square" style="color: #E60023;"></i></a></li>

                                <li><a target="_blank"
                                        href="https://api.whatsapp.com/send?text=<?php echo urlencode($post->post_title); ?> {{ url('post/' . $post->post_slug) }}"><i
                                            class="fab fa-whatsapp-square" style="color: #40C351;"></i></a></li>

                                <li><a target="_blank"
                                        href="https://www.tumblr.com/share/link?url={{ url('post/' . $post->post_slug) }}&amp;name={{ $post->post_title }}"><i
                                            class="fab fa-tumblr-square" style="color: #304D6A;"></i></a></li>
                            </ul>
                        </div>
                        <div class=" bg-white pb-2">
                            <h2 class="left_h2">Tags</h2>
                            <ul class="tag_ul cat-ul p-0">
                                @php
                                    $string = $post->post_tags;
                                    $tags = explode(',', $string);
                                @endphp
                                @foreach ($tags as $tag)
                                    <li><a href=" {{ url('/search?clipart=') . $tag }}"><span
                                                rel="tag"><?= $tag ?></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 ">
                    <div class="shadow bg-white pb-1">
                        <h2 class="left_h2">Image Information </h2>
                        <ul class="info_list ps-2 mb-1">
                            <li>
                                <span class="info_title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#333333"
                                            d="M20,19.2928932 L20,16.5 C20,16.2238576 20.2238576,16 20.5,16 C20.7761424,16 21,16.2238576 21,16.5 L21,20.5 C21,20.7761424 20.7761424,21 20.5,21 L16.5,21 C16.2238576,21 16,20.7761424 16,20.5 C16,20.2238576 16.2238576,20 16.5,20 L19.2928932,20 L16.1464466,16.8535534 C15.9511845,16.6582912 15.9511845,16.3417088 16.1464466,16.1464466 C16.3417088,15.9511845 16.6582912,15.9511845 16.8535534,16.1464466 L20,19.2928932 Z M4,4.70710678 L4,7.5 C4,7.77614237 3.77614237,8 3.5,8 C3.22385763,8 3,7.77614237 3,7.5 L3,3.5 C3,3.22385763 3.22385763,3 3.5,3 L7.5,3 C7.77614237,3 8,3.22385763 8,3.5 C8,3.77614237 7.77614237,4 7.5,4 L4.70710678,4 L7.85355339,7.14644661 C8.04881554,7.34170876 8.04881554,7.65829124 7.85355339,7.85355339 C7.65829124,8.04881554 7.34170876,8.04881554 7.14644661,7.85355339 L4,4.70710678 Z M4.70710678,20 L7.5,20 C7.77614237,20 8,20.2238576 8,20.5 C8,20.7761424 7.77614237,21 7.5,21 L3.5,21 C3.22385763,21 3,20.7761424 3,20.5 L3,16.5 C3,16.2238576 3.22385763,16 3.5,16 C3.77614237,16 4,16.2238576 4,16.5 L4,19.2928932 L7.14644661,16.1464466 C7.34170876,15.9511845 7.65829124,15.9511845 7.85355339,16.1464466 C8.04881554,16.3417088 8.04881554,16.6582912 7.85355339,16.8535534 L4.70710678,20 Z M19.2928932,4 L16.5,4 C16.2238576,4 16,3.77614237 16,3.5 C16,3.22385763 16.2238576,3 16.5,3 L20.5,3 C20.7761424,3 21,3.22385763 21,3.5 L21,7.53112887 C21,7.80727125 20.7761424,8.03112887 20.5,8.03112887 C20.2238576,8.03112887 20,7.80727125 20,7.53112887 L20,4.70710678 L16.8535534,7.85355339 C16.6582912,8.04881554 16.3417088,8.04881554 16.1464466,7.85355339 C15.9511845,7.65829124 15.9511845,7.34170876 16.1464466,7.14644661 L19.2928932,4 Z M8,10.4949109 C8,9.11668583 9.11540994,7.99843045 10.4936306,7.99491906 L13.4936306,7.98727573 C14.8807119,7.98726762 16,9.10655574 16,10.4872676 L16,13.5 C16,14.8807119 14.8807119,16 13.5,16 L10.5,16 C9.11928813,16 8,14.8807119 8,13.5 L8,10.4949109 Z M9,10.4949109 L9,13.5 C9,14.3284271 9.67157288,15 10.5,15 L13.5,15 C14.3284271,15 15,14.3284271 15,13.5 L15,10.4872676 C15,9.65884049 14.3284271,8.98726762 13.5,8.98726762 L10.4961784,8.99491581 C9.66924596,8.99702265 9,9.66797587 9,10.4949109 Z">
                                        </path>
                                    </svg>
                                    <span>PNG Dimensions: </span>
                                </span>
                                <span class="info_detail">{{ $post->png_width . 'x' . $post->png_height }} px</span>
                            </li>
                            <li>
                                <span class="info_title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#333333"
                                            d="M20,6.52897986 L20,19.5010024 C20,20.8817143 18.8807119,22.0010024 17.5,22.0010024 L6.5,22.0010024 C5.11928813,22.0010024 4,20.8817143 4,19.5010024 L4,4.50100238 C4,3.1202905 5.11928813,2.00100238 6.5,2.00100238 L15.4720225,2.00100238 C15.6047688,1.99258291 15.7429463,2.03684187 15.8535534,2.14744899 L19.8535534,6.14744899 C19.9641605,6.25805611 20.0084195,6.39623363 20,6.52897986 Z M15,3.00100238 L6.5,3.00100238 C5.67157288,3.00100238 5,3.67257525 5,4.50100238 L5,19.5010024 C5,20.3294295 5.67157288,21.0010024 6.5,21.0010024 L17.5,21.0010024 C18.3284271,21.0010024 19,20.3294295 19,19.5010024 L19,7.00100238 L15.5,7.00100238 C15.2238576,7.00100238 15,6.77714475 15,6.50100238 L15,3.00100238 Z M16,3.70810916 L16,6.00100238 L18.2928932,6.00100238 L16,3.70810916 Z M8.5,10 C8.22385763,10 8,9.77614237 8,9.5 C8,9.22385763 8.22385763,9 8.5,9 L15.5,9 C15.7761424,9 16,9.22385763 16,9.5 C16,9.77614237 15.7761424,10 15.5,10 L8.5,10 Z M8.5,13 C8.22385763,13 8,12.7761424 8,12.5 C8,12.2238576 8.22385763,12 8.5,12 L15.5,12 C15.7761424,12 16,12.2238576 16,12.5 C16,12.7761424 15.7761424,13 15.5,13 L8.5,13 Z M8.5,16 C8.22385763,16 8,15.7761424 8,15.5 C8,15.2238576 8.22385763,15 8.5,15 L13.5,15 C13.7761424,15 14,15.2238576 14,15.5 C14,15.7761424 13.7761424,16 13.5,16 L8.5,16 Z">
                                        </path>
                                    </svg>
                                    <span>PNG File size: </span>
                                </span>
                                <span class="info_detail">{{ toConvert($post->png_file_size) }}</span>
                            </li>
                            <li>
                                <span class="info_title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="#333333"
                                            d="M20,15.2928932 L20,5.5 C20,4.67157288 19.3284271,4 18.5,4 L5.5,4 C4.67157288,4 4,4.67157288 4,5.5 L4,12.2928932 L7.14644661,9.14644661 C7.34170876,8.95118446 7.65829124,8.95118446 7.85355339,9.14644661 L13.5,14.7928932 L16.1464466,12.1464466 C16.3417088,11.9511845 16.6582912,11.9511845 16.8535534,12.1464466 L20,15.2928932 Z M20,16.7071068 L16.5,13.2071068 L13.8535534,15.8535534 C13.6582912,16.0488155 13.3417088,16.0488155 13.1464466,15.8535534 L7.5,10.2071068 L4,13.7071068 L4,18.5 C4,19.3284271 4.67157288,20 5.5,20 L18.5,20 C19.3284271,20 20,19.3284271 20,18.5 L20,16.7071068 Z M3,5.5 C3,4.11928813 4.11928813,3 5.5,3 L18.5,3 C19.8807119,3 21,4.11928813 21,5.5 L21,18.5 C21,19.8807119 19.8807119,21 18.5,21 L5.5,21 C4.11928813,21 3,19.8807119 3,18.5 L3,5.5 Z M15,6 L17,6 C17.5522847,6 18,6.44771525 18,7 L18,9 C18,9.55228475 17.5522847,10 17,10 L15,10 C14.4477153,10 14,9.55228475 14,9 L14,7 C14,6.44771525 14.4477153,6 15,6 Z M15,7 L15,9 L17,9 L17,7 L15,7 Z">
                                        </path>
                                    </svg>
                                    <span>MIME type: </span>
                                </span>
                                <span class="info_detail">{{ $post->png_mime_type }}</span>
                            </li>
                            <span class="clear"></span>
                        </ul>
                        <h2 class="left_h2">License</h2>
                        <p class="left_p mb-1">
                            AllPNGFree is an open community only for personal use
                            <a href="mailto:allpngfree@gmail.com">Contact Us</a> to share png.
                        </p>
                    </div>
                    <button id="btn-at" class=" shadow btn-success mt-3 btn w-100 " data-bs-toggle="modal"
                        data-bs-target="#Download-Pop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#FFFFFF"
                                d="M14.7928932,11.5 L11.6464466,8.35355339 C11.4511845,8.15829124 11.4511845,7.84170876 11.6464466,7.64644661 C11.8417088,7.45118446 12.1582912,7.45118446 12.3535534,7.64644661 L16.3535534,11.6464466 C16.5488155,11.8417088 16.5488155,12.1582912 16.3535534,12.3535534 L12.3535534,16.3535534 C12.1582912,16.5488155 11.8417088,16.5488155 11.6464466,16.3535534 C11.4511845,16.1582912 11.4511845,15.8417088 11.6464466,15.6464466 L14.7928932,12.5 L4,12.5 C3.72385763,12.5 3.5,12.2761424 3.5,12 C3.5,11.7238576 3.72385763,11.5 4,11.5 L14.7928932,11.5 Z M16,4.5 C15.7238576,4.5 15.5,4.27614237 15.5,4 C15.5,3.72385763 15.7238576,3.5 16,3.5 L19,3.5 C20.3807119,3.5 21.5,4.61928813 21.5,6 L21.5,18 C21.5,19.3807119 20.3807119,20.5 19,20.5 L16,20.5 C15.7238576,20.5 15.5,20.2761424 15.5,20 C15.5,19.7238576 15.7238576,19.5 16,19.5 L19,19.5 C19.8284271,19.5 20.5,18.8284271 20.5,18 L20.5,6 C20.5,5.17157288 19.8284271,4.5 19,4.5 L16,4.5 Z"
                                transform="rotate(90 12.5 12)"></path>
                        </svg>
                        DOWNLOAD FREE PNG
                    </button>
                    <!-- Button trigger modal -->
                    <!--Google ads vertical responsive-->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
                                        crossorigin="anonymous"></script>
                    <!-- allpng v -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1349261392519845"
                        data-ad-slot="2318588721" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!-------------------Popup Download box------------->
                    <!-- Modal -->
                    <div class="modal fade" id="Download-Pop" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Download Your Clipart</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <!--<img src="images/logo/logo.png" alt="" style="width: 200px; height: 200px">-->

                                    <!--Google square ads-->
                                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1349261392519845"
                                                                        crossorigin="anonymous"></script>
                                    <!-- all png cos dowlod but -->
                                    <ins class="adsbygoogle" style="display:inline-block;width:200px;height:200px"
                                        data-ad-client="ca-pub-1349261392519845" data-ad-slot="6773156286"></ins>
                                    <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <a type="button" id="at-downloadx"
                                        href="{{ asset('/storage/png/' . $post->png_file_path) }}" download class="btn btn-primary text-white">Download</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ------------------------------------------------- -->

                </div>
            </div>
        </div>
        <span class="clear"></span>
    </section>
    <!------------------------- Related PNG.. -------------------------------------->
    <section>
        <div class="text-center container-fluid ">
            <h2 class="mt-4">Related PNG</h2>
        </div>
        <div class=" container-fluid gallery">
            @foreach ($posts as $rpost)
                @if ($post->post_id == $rpost->post_id)
                    @continue;
                @endif
                <x-image-card title="{{ $rpost->post_title }}" description="{{ $rpost->rpost_content }}"
                    url="{{ $rpost->post_slug }}" tags="{{ $rpost->post_tags }}" thumbnail="{{ $rpost->thumbnail }}" pngWidth="{{$rpost->png_width}}" pngHeight="{{$rpost->png_height}}" pngFileSize="{{$rpost->png_file_size}}" />
            @endforeach
        </div>
    </section>
@endsection
