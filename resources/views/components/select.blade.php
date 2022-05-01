
<div class="col-12">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="name">{{$title}}</label>
        </div>
        <div class="col-sm-9">
            {!! Form::select($name,$items,null,['class'=>'form-control select2']) !!}
            <p class="help-block"></p>
            @error($name)
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
