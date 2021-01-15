@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Menu', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Add</a>
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
                            @foreach ( $menus as $menu )
                                <tr>
                                    <td>{{ $menu -> id }}</td>
                                    <td>{{ $menu -> name }}</td>
                                    <td>
                                        <a href="{{ route('menus.edit', ['id'=> $menu->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('menus.delete', ['id'=> $menu->id]) }}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
