@extends('AdminPanel.layouts.master')
@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>{{ $errors->first()}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الدورات التدريبية</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">وصف الدورة</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                            <tr id="row_{{$course->id}}">
                                <td class="text-center">
                                    {{$course-> title_ar}}<br>
                                    {{$course-> title_en}}

                                </td>
                                <td class="text-center">
                                    {{$course-> des_ar}}<br>
                                    {{$course-> des_en}}

                                </td>
                                <td class="text-center">
                                    <span class="avatar mb-2">
                                        <img class="round" src="{{$course->photoLink()}}" alt="avatar" height="90" width="90">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editcourse{{$course->id}}" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>
                                    <?php $delete = route('admin.courses.delete',['id'=>$course->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$course->id}}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.delete')}}">
                                        <i data-feather='trash-2'></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 text-center ">
                                        <h2>لا يوجد أي بيانات لعرضها الآن</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Edit Model --}}
                @foreach($courses as $course)
                    <div class="modal fade text-md-start" id="editcourse{{$course->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">تعديل</h1>
                                    </div>
                                    {{Form::open(['files'=> true,'url'=>route('admin.courses.update',['id'=>$course->id]), 'id'=>'editcourseForm', 'class'=>'row gy-1 pt-75'])}}

                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="title_ar">العنوان بالعربية</label>
                                        {{Form::text('title_ar',$course->title_ar,['id'=>'title_ar', 'class'=>'form-control','required'])}}
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="title_en">العنوان بالإنجليزية</label>
                                        {{Form::text('title_en',$course->title_en,['id'=>'title_en', 'class'=>'form-control'])}}
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="des_ar">الوصف بالعربية</label>
                                        {{Form::textarea('des_ar',$course->des_ar,['id'=>'des_ar','class'=>'form-control editor_ar','rows'=>'3'])}}
                                        @if($errors->has('des_ar'))
                                            <span class="text-danger" role="alert">
                                                <b>{{ $errors->first('des_ar') }}</b>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="des_en">الوصف بالإنجليزية</label>
                                        {{Form::textarea('des_en',$course->des_en,['id'=>'des_en','class'=>'form-control editor_en','rows'=>'3'])}}
                                        @if($errors->has('des_en'))
                                            <span class="text-danger" role="alert">
                                                <b>{{ $errors->first('des_en') }}</b>
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

                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">حفظ البيانات</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            إلغاء
                                        </button>
                                    </div>

                                </div>

                                {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{ $courses->links('vendor.pagination.default') }}


            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@stop

@section('page_buttons')
    <a href="javascript:;" data-bs-target="#createcourse" data-bs-toggle="modal" class="btn btn-primary">
        إضافة جديد
    </a>
{{-- Create New Course  --}}
    <div class="modal fade text-md-start" id="createcourse" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">إضافة جديد</h1>
                    </div>
                    {{Form::open(['files'=> true,'url'=>route('admin.courses.store'), 'id'=>'createcourseForm', 'class'=>'row gy-1 pt-75'])}}
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="title_ar">العنوان بالعربية</label>
                            {{Form::text('title_ar','',['id'=>'title_ar', 'class'=>'form-control','required'])}}
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="title_en">العنوان بالإنجليزية</label>
                            {{Form::text('title_en','',['id'=>'title_en', 'class'=>'form-control'])}}
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="des_ar">الوصف بالعربية</label>
                            {{Form::textarea('des_ar','',['id'=>'des_ar','class'=>'form-control editor_ar','rows'=>'3'])}}
                            @if($errors->has('des_ar'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('des_ar') }}</b>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="des_en">الوصف بالإنجليزية</label>
                            {{Form::textarea('des_en','',['id'=>'des_en','class'=>'form-control editor_en','rows'=>'3'])}}
                            @if($errors->has('des_en'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('des_en') }}</b>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="photo">الصورة</label>
                            {{Form::file('photo',['id'=>'photo', 'class'=>'form-control','required'])}}
                            @if($errors->has('photo'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('photo') }}</b>
                                </span>
                            @endif
                        </div>

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">حفظ البيانات</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                إلغاء
                            </button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
