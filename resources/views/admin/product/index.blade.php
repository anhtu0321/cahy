@extends('layouts.admin')
@section('title')
    <title>Add Product</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Product', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ( $cates as $cate ) --}}
                                <tr>
                                    <td>1</td>
                                    <td>Iphone</td>
                                    <td>15.000.000 đ</td>
                                    <td>
                                        <img src="" alt=""/>
                                    </td>
                                    <td>Điện thoại</td>
                                    <td>
                                        <a href="" class="btn btn-default">Sửa</a>
                                        <a href="" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
