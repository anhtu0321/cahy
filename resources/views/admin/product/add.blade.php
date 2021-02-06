@extends('layouts.admin')
@section('title')
    <title>Thêm Sản phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/admins/product/add/add.css') }}" rel="stylesheet" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
                                <select class="form-control select2_init" name="category_id">
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
                                <textarea name="content" class="form-control my-editor"></textarea> 
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
    <script src="{{ asset('vendors/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/admins/product/add/add.js') }}"></script>
    {{-- Tuy chon cho select2 --}}
    <script>
        $(function(){
            $(".tags_select_choose").select2({
                tags:true,
                tokenSeparators: [',']
            })
            $(".select2_init").select2({
                placeholder: "Chọn Danh mục",
                allowClear:true
            })
        })
    </script>
    {{-- Tuy chon cho tinymce --}}
    <script>
      var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        // them nut chon anh trong plugin anh bang function file_picker_callback
        file_picker_callback: function (callback, value, meta) {
          let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          let type = 'image' === meta.filetype ? 'Images' : 'Files',
              url  = '/shopping/public/laravel-filemanager?editor=tinymce5&type=' + type;

          tinymce.activeEditor.windowManager.openUrl({
              url : url,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              onMessage: (api, message) => {
                  callback(message.content);
              }
          });
        }
      };
    
      tinymce.init(editor_config);
    </script>
@endsection