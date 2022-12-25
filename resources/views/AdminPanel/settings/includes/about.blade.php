<!-- form -->
<div class="row">
    <div class="col-12 col-md-6">
        <label class="form-label" for="title_ar">العنوان بالعربية</label>
        {{Form::text('title_ar',getSettingValue('title_ar'),['id'=>'title_ar','class'=>'form-control'])}}
        @if($errors->has('title_ar'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('title_ar') }}</b>
            </span>
        @endif
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="title_en">العنوان بالإنجليزية</label>
        {{Form::text('title_en',getSettingValue('title_en'),['id'=>'title_en','class'=>'form-control'])}}
        @if($errors->has('title_en'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('title_en') }}</b>
            </span>
        @endif
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="des_ar">الوصف بالعربية</label>
        {{Form::textarea('des_ar',getSettingValue('des_ar'),['id'=>'des_ar','class'=>'form-control editor_ar','rows'=>'3'])}}
        @if($errors->has('des_ar'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('des_ar') }}</b>
            </span>
        @endif
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="des_en">الوصف بالإنجليزية</label>
        {{Form::textarea('des_en',getSettingValue('des_en'),['id'=>'des_en','class'=>'form-control editor_ar','rows'=>'3'])}}
        @if($errors->has('des_en'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('des_en') }}</b>
            </span>
        @endif
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="photo">الصورة</label>
        {{Form::file('aboutusPhoto',['id'=>'photo', 'class'=>'form-control'])}}
        @if($errors->has('photo'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('photo') }}</b>
            </span>
        @endif
    </div>
</div>
<!--/ form -->
