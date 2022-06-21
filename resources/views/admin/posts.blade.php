@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Posts" />
        <!-- /.content-header -->
        @if (session('post-delete-success'))
            <x-alert-message type="success" message="{{ session('post-delete-success') }}" />
        @endif
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total posts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thumb</th>
                                            <th>Post title</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td> <img src="{{ asset('storage/thumbnails/' . $post->thumbnail) }}"
                                                        alt="{{ $post->post_title }}" class="img-rounded"
                                                        style="width:60px;"></td>
                                                <td>{{ $post->post_title }}</td>
                                                <td>{{ $post->post_category }}</td>
                                                {{-- <td>
                                                    <a href="{{route('')}}">
                                                        <label class='switch cat-status-btn mt-2'
                                                            data-status={{ $post->post_status }}
                                                            data-id={{ $post->post_id }}>
                                                            <input type='checkbox'
                                                                {{ $post->post_status == 1 ? 'checked' : '' }}><span
                                                                class='slider round'></span>
                                                        </label>
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    <nav class="nav  ">
                                                        <a class="nav-link text-primary"
                                                            href="{{ route('post.edit', ['id' => $post->post_id]) }}"><i
                                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                                        {{-- <a class="nav-link text-danger" href="#"><i
                                                                class="fa fa-trash delete-post"
                                                                data-postid="{{ $post->post_id }}"></i></a> --}}
                                                        <a class="nav-link text-danger"
                                                            href="{{ route('post.delete', ['id' => $post->post_id]) }}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </nav>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
