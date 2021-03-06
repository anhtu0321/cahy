@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Category', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('categories.update',['id'=>$category->id]) }}">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control" type="text" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label>Chọn Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $option !!}
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection