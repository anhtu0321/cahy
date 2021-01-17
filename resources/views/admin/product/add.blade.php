@extends('layouts.admin')
@section('title')
    <title>Thêm Sản phẩm</title>
@endsection
@section('css')
    <title>Thêm Sản phẩm</title>
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
                                <input class="form-control" type="file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input class="form-control" type="file" multiple name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Chọn Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $option !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control" name="content" rows="3"></textarea>
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
    <title>Thêm Sản phẩm</title>
@endsection