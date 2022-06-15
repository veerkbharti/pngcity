@extends('admin.layouts.main')


@section('main-container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-content-header title="Add-Post" />
        <!-- /.content-header -->

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
                                            class="form-control form-control-lg" name="post_title" id="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input class="form-control" autocomplete="off" type="text" disabled  value=""  name="post_category" id="post_category">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <input type="text" autocomplete="off" class="form-control" name="category"
                                                    id="category" data-catid=""  placeholder="Enter category"
                                                    onkeyup="categoryList(this.value)">
                                                <div id="CategoryList" class="form-group">
                                                    <div class="CategoryItemBox">
                                                        <span class="CategoryItem" data-catid="">Veer</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 mt-2 mt-sm-0">
                                                <button type="button" class="btn btn-primary" id="addCategoryBtn" disabled
                                                    onclick="addCategory()">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Tags</label>
                                            <input autocomplete="off" data-role="tagsinput" type="text"
                                                class="form-control" name="tags" id="" aria-describedby="helpId"
                                                placeholder="Enter keywords">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Post Content *</label>
                                            <textarea class="form-control" name="post_content" id="post_content" name="post_content" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"> Upload Image *</label>
                                            <input type="file" class="form-control " id="image" name="image"
                                                accept="image/png" />
                                            <small class="form-text text-warning">Only .PNG file is allowed.</small>
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
