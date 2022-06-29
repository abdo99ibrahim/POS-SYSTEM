@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.categories')
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
            </li>
            <li><a href="{{ route('dashboard.categories.index') }}">@lang('site.categories')</a></li>
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
                <form action="{{ route('dashboard.categories.update',$category->id) }}" method="post" >
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    @foreach (config('translatable.locales') as $locale)
                    <div class="form-group">
                        {{-- site.ar.name --}}
                        <label>@lang('site.'.$locale.'.name')</label>
                        {{-- ar[name] --}}
                        <input type="text" name="{{$locale}}[name]" class="form-control" value="{{ $category->translate($locale)->name }}">
                    </div>
                    @endforeach

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
