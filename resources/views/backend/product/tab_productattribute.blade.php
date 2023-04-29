<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="namesss">Tên thuộc tính</label>
            <input type="text" name="namess" value="{{old('name')}}" id="name" class="form-control" 
            placeholder="Nhập tên thuộc tính">
            @if ($errors->has('name'))
            <div class="text-danger">
                {{ $errors->first('name')}}
            </div>                   
            @endif
        </div>
        <div class="mb-3">
            <label for="metakesssssy">Mô tả</label>
            <textarea name="metakesssy" id="metsssakey"  class="form-control" 
            placeholder="Từ khóa tìm kiếm">{{old('metakey')}}</textarea>
            @if ($errors->has('metakey'))
            <div class="text-danger">
                {{ $errors->first('metakey')}}
            </div>                   
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="namesss">Giá trị</label>
            <input type="text" name="namsse" value="{{old('name')}}" id="nassme" class="form-control" 
            placeholder="Nhập tên thuộc tính">
            @if ($errors->has('name'))
            <div class="text-danger">
                {{ $errors->first('name')}}
            </div>                   
            @endif
        </div>
        <div class="mb-3">
            <label for="metakeysss">Thứ tự</label>
            <textarea name="metakssey" id="metssakey"  class="form-control" 
            placeholder="Từ khóa tìm kiếm">{{old('metakey')}}</textarea>
            @if ($errors->has('metakey'))
            <div class="text-danger">
                {{ $errors->first('metakey')}}
            </div>                   
            @endif
        </div>
    </div>
    </div>