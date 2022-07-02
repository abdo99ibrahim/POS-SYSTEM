@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.clients')
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
            </li>
            <li><a href="{{ route('dashboard.clients.index') }}">@lang('site.clients')</a></li>
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
                <form action="{{ route('dashboard.clients.update',$client->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group">
                        <label>@lang('site.name')</label>
                        <input type="text" name="name" class="form-control" value="{{$client->name}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.phone')</label>
                        <input type="text" name="phone" class="form-control" value="{{$client->phone}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.address')</label>
                        <textarea name="address" class="form-control">{{$client->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            @lang('site.add')</button>
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
