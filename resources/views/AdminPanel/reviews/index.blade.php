@extends('AdminPanel.layouts.master')
@section('content')


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong> {{ $errors->first() }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$title}}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reviews as $review)
                            <tr id="row_{{$review->id}}">
                                <td class="text-center">
                                    {{$review-> title_ar}}<br>
                                    {{$review-> title_en}}

                                </td>
                                <td class="text-center">
                                    <span class="avatar mb-2">
                                        <img class="round" src="{{$review->photoLink()}}" alt="avatar" height="90" width="90">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editreview{{$review->id}}" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>
                                    <?php $delete = route('admin.reviews.delete',['id'=>$review->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$review->id}}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.delete')}}">
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
                @foreach($reviews as $review)
                    <div class="modal fade text-md-start" id="editreview{{$review->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">تعديل</h1>
                                    </div>
                                    {{Form::open(['files'=> true,'url'=>route('admin.reviews.update',['id'=>$review->id]), 'id'=>'editreviewForm', 'class'=>'row gy-1 pt-75'])}}

                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="title_ar">العنوان بالعربية</label>
                                        {{Form::text('title_ar',$review->title_ar,['id'=>'title_ar', 'class'=>'form-control','required'])}}
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="title_en">العنوان بالإنجليزية</label>
                                        {{Form::text('title_en',$review->title_en,['id'=>'title_en', 'class'=>'form-control'])}}
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
                                        <button type="submit" class="btn btn-primary me-1"> حفظ البيانات</button>
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

                {{ $reviews->links('vendor.pagination.default') }}


            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@stop

@section('page_buttons')
    <a href="javascript:;" data-bs-target="#createreview" data-bs-toggle="modal" class="btn btn-primary">
        إضافة جديد
    </a>
{{-- Create New review  --}}
    <div class="modal fade text-md-start" id="createreview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">إضافة جديد</h1>
                    </div>
                    {{Form::open(['files'=> true,'url'=>route('admin.reviews.store'), 'id'=>'createreviewForm', 'class'=>'row gy-1 pt-75'])}}
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="title_ar">العنوان بالعربية</label>
                            {{Form::text('title_ar','',['id'=>'title_ar', 'class'=>'form-control','required'])}}
                            @if($errors->has('title_ar'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('title_ar') }}</b>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="title_en">العنوان بالإنجليزية</label>
                            {{Form::text('title_en','',['id'=>'title_en', 'class'=>'form-control'])}}
                            @if($errors->has('title_en'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('title_en') }}</b>
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
                            <button type="submit" class="btn btn-primary me-1"> حفظ البيانات</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                إالغاء
                            </button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
