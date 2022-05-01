
<div class="col-12">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="description">{{$title}}</label>
        </div>
        <div class="col-sm-9">
            {!! Form::file($name,['class'=>'custom-file-input','id'=>$name,'multiple'=>true]) !!}
            @error($name)
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
