@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Category" />
        <!-- /.content-header -->

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
                                            <th>Category</th>
                                            <th>Posts</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $category->cat_name }}</td>
                                                <td>{{ $category->post_count }}</td>
                                                <td>true</td>
                                                <td>
                                                    <nav class="nav  ">
                                                        <a class="nav-link text-primary" href="#"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a class="nav-link text-danger" href="#"><i
                                                                class="fa fa-trash delete-category"
                                                                data-catid="{{ $category->cat_id }}"></i></a>
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
