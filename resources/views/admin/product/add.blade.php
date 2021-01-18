@extends('layouts.admin')
@section('title')
    <title>Thêm Sản phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" type="text" name="price">
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input class="form-control-file" type="file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input class="form-control-file" type="file" multiple name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Chọn Danh mục</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $option !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhâp tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple" name="tags[]">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                                
                                
                            </div>
                            <button class="btn btn-primary" type="submit">Thêm</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/admins/product/add/add.js') }}"></script>
    <script>
        $(function(){
            $(".tags_select_choose").select2({
                tags:true,
                tokenSeparators: [',',' ']
            })
            $(".select2_init").select2({
                placeholder: "Chọn Danh mục",
                allowClear:true
            })
        })
    </script>
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/ckfinder/ckfinder.js')}}" type="text/javascript"></script>
    <script>
        CKEDITOR.replace("content");
    </script>
@endsection