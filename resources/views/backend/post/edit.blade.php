@extends('layouts.admin')
@section('title','Cập nhật bài viết')
@section('content')

<form action="{{route('post.update',['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>CẬP NHẬT BÀI VIẾT</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
                  <li class="breadcrumb-item active">Cập nhật bài viết</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
             <div class="row">
              <div class="col-md-6">
                
              </div>
              <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-sm btn-success">
               <i class="fas fa-save"></i>Lưu[Cập nhật]
                </button>
                <a href="{{route('post.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-undo"></i>Quay về danh sách
                   </a>
              </div>
            </div> 
            </div>
            <div class="card-body">
              @includeIf('backend.message_alert')
             <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="title">Tên bài viết</label>
                        <input type="text" value="{{old('title',$post->title)}}" name="title" id='title' class="form-control" placeholder="Nhập tên bài viết">
                        @if ($errors->has('title'))
                           <div class="text-danger">
                          {{$errors->first('title')}}  
                          </div> 
                        @endif
                        
                    </div>
                    <div class="mb-3">
                        <label for="metakey">Từ khóa</label>
                        <textarea name="metakey" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm" >
                            {{old('metakey',$post->metakey)}}</textarea>
                        @if ($errors->has('metakey'))
                           <div class="text-danger">
                            {{$errors->first('metakey')}}  
                           </div> 
                         @endif
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Mô tả</label>
                        <textarea name="metadesc" id="metadesc" class="form-control" placeholder=" Nhập mô tả" >{{old('metadesc',$post->metadesc)}}</textarea>
                        @if ($errors->has('metadesc'))
                           <div class="text-danger">
                            {{$errors->first('metadesc')}}  
                           </div> 
                         @endif
                    </div>
                </div>
                <div class="col-md-3">
                
                    <div class="mb-3">
                        <label for="top_id">Danh mục cha</label>
                        <select class="form-control" name="top_id" id="top_id">
                            <option value="0">--Danh mục cha--</option>
                            {!!$html_top_id!!}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Ảnh đại diện</label>
                        <input type="file" value="{{old('image')}}" name="image" id='image' class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Xuất bản </option>
                            <option value="2">Chưa xuất bản</option>
                            
                        </select>
                    </div>
                </div>
               
             </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
      </div>
</form>
@endsection