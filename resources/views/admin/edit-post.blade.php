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
                            <form action="{{ route('post.update',['id'=>$post->post_id]) }}" enctype="multipart/form-data"
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
                                            value="{{ $post->post_title }}" class="form-control form-control-lg"
                                            name="post_title" id="">
                                        <span class="text-danger">
                                            @error('post_title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input class="form-control" autocomplete="off" type="text"
                                                value="{{ $post->post_category }}" name="post_category"
                                                id="post_category">
                                            <span class="text-danger">
                                                @error('post_category')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <input type="text" autocomplete="off" class="form-control" name="category"
                                                    id="category" data-catid="" placeholder="Enter category"
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
                                                class="form-control" name="post_tags" id="post_tags"
                                                value="{{ $post->post_tags }}" aria-describedby="helpId"
                                                placeholder="Enter keywords">
                                            <span class="text-danger">
                                                @error('post_tags')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Post Content *</label>
                                            <textarea class="form-control" name="post_content" id="post_content" name="post_content" cols="30" rows="4">{{ $post->post_content }}</textarea>
                                            <span class="text-danger">
                                                @error('post_content')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $post->meta_title }}">
                                            <span class="text-danger">
                                                @error('meta_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Meta Keywords</label>
                                            <input type="text" class="form-control" name="meta_keywords" value="{{ $post->meta_keywords }}"
                                                id="meta_keywords">
                                            <span class="text-danger">
                                                @error('meta_keywords')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Meta Description</label>
                                            <textarea rows="3"  class="form-control" name="meta_description"
                                                id="meta_description">{{ $post->meta_description }}</textarea>
                                            <span class="text-danger">
                                                @error('meta_description')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"> Upload Image *</label>
                                            <input type="file" class="form-control " id="image" name="image"
                                                {{-- accept="image/png" --}} />
                                            <span class="text-danger">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
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
