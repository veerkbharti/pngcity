@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Category" />
        <!-- /.content-header -->
        @if (session('success'))
            <x-alert-message type="success" message="{{ session('success') }}" />
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>No of Posts</th>
                                            <th>Add to Home</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($count = 0)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $category->cat_name }}</td>
                                                <td>{{ $category->no_of_posts }}</td>
                                                <td>
                                                    <a href="{{ route('category.update', ['id' => $category->cat_id, 'status' => $category->status]) }}"
                                                        class="btn btn-sm {{ $category->status == 1 ? 'btn-success' : 'btn-primary' }} ">

                                                        {{ $category->status == 1 ? 'Added' : 'Add' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <nav class="nav  ">
                                                        {{-- <a class="nav-link text-primary" href="#"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></a> --}}
                                                        <a class="nav-link btn btn-sm btn-danger "
                                                            href="{{ route('category.delete', ['id' => $category->cat_id]) }}"><i
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
