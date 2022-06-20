@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Add-Post" />
        <!-- /.content-header -->
        @if (session('success'))
            <x-alert-message type="success" message="{{ session('success') }}" />
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Post details
                            </h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form action="{{ url('/') }}/superadmin/post/add" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                <div class="row mb-3 d-none">
                                    <div class="col-sm-12">
                                        <h4>User</h4>
                                        <input type="text" autocomplete="off" value="" placeholder="Enter post title"
                                            class="form-control form-control-lg" name="user" id="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <h4>Post Title</h4>
                                        <input autocomplete="off" type="text" placeholder="Enter post title"
                                            class="form-control form-control-lg" name="post_title" id=""
                                            value="{{ old('post_title') }}">
                                        <small class="form-text text-danger">
                                            @error('post_title')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input autocomplete="off" type="number" class="d-none" value=""
                                                name="cat_id" id="categoryId">
                                            <input type="text" autocomplete="off" class="form-control" name="category"
                                                id="category" data-catid="" placeholder="Enter category"
                                                value="{{ old('category') }}" onkeyup="categoryList(this.value)">
                                            <small class="form-text text-danger">
                                                @error('category')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                            <div id="CategoryList" class="form-group">
                                                <div class="CategoryItemBox">
                                                    <span class="CategoryItem" data-catid="">Veer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Tags</label>
                                            <input autocomplete="off" data-role="tagsinput" type="text"
                                                class="form-control" name="tags" id="" aria-describedby="helpId"
                                                placeholder="Enter keywords" value="{{ old('tags') }}">
                                            <small class="form-text text-danger">
                                                @error('tags')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Description *</label>
                                            <textarea class="form-control" name="meta_description" id="post_desc" name="post_desc" cols="30" rows="4"
                                                value="{{ old('meta_description') }}"></textarea>
                                            <small class="form-text text-danger">
                                                @error('meta_description')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"> Upload Image *</label>
                                            <input type="file" class="form-control " id="image" name="image"
                                                accept="image/png" value="{{ old('image') }}" />
                                            <small class="form-text text-danger">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                            {{-- <small class="form-text text-warning">Only .PNG file is allowed.</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="image-preview" style="max-width: 50%;"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
