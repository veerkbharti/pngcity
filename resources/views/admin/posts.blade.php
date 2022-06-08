@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Posts"/>
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
                                            <th>Thumb</th>
                                            <th>Post title</th>
                                            <th>Category</th>
                                            <th>Sub-Category</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Blog</td>
                                            <td>Blog</td>
                                            <td>Festival</td>
                                            <td>Eid</td>
                                            <td>true</td>
                                            <td>
                                                <nav class="nav  ">
                                                    <a class="nav-link text-primary" href="#"><i class="fa fa-edit"
                                                            aria-hidden="true"></i></a>
                                                    <a class="nav-link text-danger" href="#"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
                                                </nav>
                                            </td>
                                        </tr>
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
