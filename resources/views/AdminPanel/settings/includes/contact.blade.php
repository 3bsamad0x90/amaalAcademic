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
        <label class="form-label" for="photo">الصورة</label>
        {{Form::file('photo',['id'=>'photo', 'class'=>'form-control'])}}
        @if($errors->has('photo'))
            <span class="text-danger" role="alert">
                <b>{{ $errors->first('photo') }}</b>
            </span>
        @endif
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="name_ar">الإسم بالعربية</label>
        {{Form::text('name_ar',getSettingValue('name_ar'),['id'=>'name_ar','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="name_en">الإسم بالإنجليزية</label>
        {{Form::text('name_en',getSettingValue('name_en'),['id'=>'name_en','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="email">البريد الإلكتروني</label>
        {{Form::text('email',getSettingValue('email'),['id'=>'email','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="phone">الهاتف</label>
        {{Form::text('phone',getSettingValue('phone'),['id'=>'phone','class'=>'form-control'])}}
    </div>

    <div class="col-12 col-md-12">
        <label class="form-label" for="message_ar">الرسالة بالعربية</label>
        {{Form::textarea('message_ar',getSettingValue('message_ar'),['id'=>'message_ar','class'=>'form-control','rows'=>'3'])}}
    </div>
    <div class="col-12 col-md-12">
        <label class="form-label" for="message_en">الرسالة بالإنجليزية</label>
        {{Form::textarea('message_en',getSettingValue('message_en'),['id'=>'message_en','class'=>'form-control','rows'=>'3'])}}
    </div>

</div>
<!--/ form -->
