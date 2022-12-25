<!-- form -->
<div class="row">
    <div class="col-12 col-md-6">
        <label class="form-label" for="facebook">فيس بوك</label>
        {{Form::text('facebook',getSettingValue('facebook'),['id'=>'facebook','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="twitter">تويتر</label>
        {{Form::text('twitter',getSettingValue('twitter'),['id'=>'twitter','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="instagram">إنستجرام</label>
        {{Form::text('instagram',getSettingValue('instagram'),['id'=>'instagram','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="youtube">يوتيوب</label>
        {{Form::text('youtube',getSettingValue('youtube'),['id'=>'youtube','class'=>'form-control'])}}
    </div>
</div>
