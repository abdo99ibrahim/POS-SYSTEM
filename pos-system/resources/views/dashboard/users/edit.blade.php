@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.users')
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
            </li>
            <li><a href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
            <li class="ative">@lang('site.edit')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">
                    @lang('site.edit')
                </div>
            </div>
            <div class="box-body">
                @include('partials._errors')
                <form action="{{ route('dashboard.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label>@lang('site.first_name')</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.last_name')</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.image')</label>
                        <input type="file" name="image" id="imgInp" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="{{$user->image_path}}" style="width: 100px" class="img-thumbnail img_preview" id="blah" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">@lang('site.permissions')</label>
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                @php
                                   $models=['users','categories','products'];
                                   $maps = ['create','read','update','delete'];
                                @endphp
                                <ul class="nav nav-pills ml-auto p-2">
                                    @foreach ($models as $index=>$model)
                                    <li class="nav-item {{$index==0 ? 'active': ''}}"><a class="nav-link " href="#{{$model}}"
                                            data-toggle="tab">@lang('site.'.$model)</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @foreach ($models as $index=>$model)
                                    <div class="tab-pane {{$index==0 ? 'active': ''}}" id="{{$model}}">
                                        @foreach ($maps as $map)
                                        <input type="checkbox" name="permissions[]" {{$user->hasPermission($map.'_'.$model) ? "checked" : ""}} value="{{$map.'_'.$model}}"
                                            class="form-check-input" id="{{$map}}">
                                        <label class="form-check-label" for="{{$map}}">@lang('site.' .$map)</label>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
        </div>
        </form>
</div>
</div>

</section><!-- end of content -->

</div><!-- end of content wrapper -->
@endsection
