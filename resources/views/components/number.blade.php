<div class="col-12">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="email">{{$title}}</label>
        </div>
        <div class="col-sm-9">
            {!! Form::number($name,$slot == ''?null: $slot,['placeholder'=>"$title",'class'=>'form-control ']) !!}

            @error($name)
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
