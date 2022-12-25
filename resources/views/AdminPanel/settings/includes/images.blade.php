<!-- form -->
<div class="row">
    <div class="col-md-3 text-center">
        {!! getSettingImageValue('logo') !!}
        <div class="file-loading">
            <input class="files" name="logo" type="file">
        </div>
    </div>
    <div class="divider">
        <div class="divider-text">عارض الصور بالرئيسية</div>
    </div>
    @for($i=1;$i<=5;$i++)
        <div class="row pt-2 pb-4">
            <h3>الصورة #{{$i}}</h3>
            <div class="col-md-4 text-center">
                {!! getSettingImageValue('home_slide'.$i.'img') !!}
                <div class="file-loading">
                    <input class="files" name="home_slide{{$i}}img" type="file">
                </div>
            </div>
        </div>
    @endfor
</div>
<!--/ form -->
