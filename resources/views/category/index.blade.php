@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Category', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $cates as $cate )
                                <tr>
                                    <td>{{ $cate -> id }}</td>
                                    <td>{{ $cate -> name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', ['id'=> $cate->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('categories.delete', ['id'=> $cate->id]) }}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $cates->links() }}
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
