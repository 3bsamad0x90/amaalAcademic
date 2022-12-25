@extends('AdminPanel.layouts.master')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- Bordered table start -->
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>{{ $errors->first()}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row" id="table-bordered">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$title}}</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-2">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('common.videos') }}</th>
                            <th class="text-center">{{ trans('common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($videos as $video)
                        <tr id="row_{{$video->id}}">
                            @if($video -> status === 1)
                            <td class="text-center">
                                <span class="mb-2">
                                    <video width="320" height="240" controls>
                                        <source src="{{$video->videoLink()}}" type="video/mp4">
                                    </video>
                                </span>
                            </td>
                            @else
                            <td class="text-center">
                                <span class="mb-2 text-danger">
                                    {{ trans('common.NoVideo') }}
                                </span>
                            </td>
                            @endif
                            <td class="text-center">
                                <a href="javascript:;" data-bs-target="#editvideo{{$video->id}}" data-bs-toggle="modal"
                                    class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="{{trans('common.edit')}}">
                                    @if($video -> status === 1)
                                        <i data-feather='edit'></i>
                                    @else
                                        <i data-feather='plus'></i>
                                    @endif
                                </a>
                                <?php $delete = route('admin.videos.delete',['id'=>$video->id]); ?>
                                <button type="button" class="btn btn-icon btn-danger"
                                    onclick="confirmDelete('{{$delete}}','{{$video->id}}')" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-original-title="{{trans('common.delete')}}">
                                    <i data-feather='trash-2'></i>
                                </button>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center ">
                                <h2>{{trans('common.nothingToView')}}</h2>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Edit Video Model --}}
            @foreach($videos as $video)
            <div class="modal fade text-md-start" id="editvideo{{$video->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">{{trans('common.edit')}}</h1>
                            </div>
                            {{Form::open(['files'=> true,'url'=>route('admin.videos.update',['id'=>$video->id]),
                            'id'=>'editvideoForm', 'class'=>'row gy-1 pt-75'])}}
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="video">{{trans('common.video')}}</label>
                                {{Form::file('video',['id'=>'video', 'class'=>'form-control','required'])}}
                                @if($errors->has('video'))
                                <span class="text-danger" role="alert">
                                    <b>{{ $errors->first('video') }}</b>
                                </span>
                                @endif
                            </div>

                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">{{trans('common.Save changes')}}</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    {{trans('common.Cancel')}}
                                </button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            {{ $videos->links('vendor.pagination.default') }}


        </div>
    </div>
</div>
<!-- Bordered table end -->



@stop

@section('page_buttons')
{{-- <a href="javascript:;" data-bs-target="#createvideo" data-bs-toggle="modal" class="btn btn-primary">
    {{trans('common.CreateNew')}}
</a> --}}
{{-- Create New video --}}
<div class="modal fade text-md-start" id="createvideo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                </div>
                {{Form::open(['files'=> true,'url'=>route('admin.videos.store'), 'id'=>'createvideoForm', 'class'=>'row
                gy-1 pt-75'])}}

                <div class="col-12 col-md-12">
                    <label class="form-label" for="video">{{trans('common.video')}}</label>
                    {{Form::file('video',['id'=>'video', 'class'=>'form-control','required'])}}
                    @if($errors->has('video'))
                    <span class="text-danger" role="alert">
                        <b>{{ $errors->first('video') }}</b>
                    </span>
                    @endif
                </div>

                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-primary me-1">{{trans('common.Save changes')}}</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        {{trans('common.Cancel')}}
                    </button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop
