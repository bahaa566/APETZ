<div class="col-12">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="name">{{$title}} بالعربية</label>
        </div>
        <div class="col-sm-9">
            {!! Form::textarea($name."[ar]",isset($item)? $item->getTranslation('description','ar'):null,['class'=>'form-control','placeholder'=>$title.' بالعربية'])!!}
            @error($name.".ar")
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="col-12">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="name">{{$title}} بالانجليزية</label>
        </div>
        <div class="col-sm-9">
            {!! Form::textarea($name."[en]",isset($item)? $item->getTranslation('description','en'):null,['class'=>'form-control','placeholder'=>$title.' بالإنجليزية'])!!}
            @error($name.".en")
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
