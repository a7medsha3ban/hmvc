@extends('Suppliers::layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <Section class="content-header">
            <h1>@lang('site.add')</h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li ><a href="">@lang('site.cities') </a></li>
                <li class="active"><a href=""></i>@lang('site.add') </a></li>
            </ol>
        </Section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>

                </div> {{--   end of box header --}}
                <div class="box-body">
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label  >@lang('site.category_name')</label>
                                    <select class="form-control" id="category_selected" name="category_selected" required focus>
                                        <option value="" disabled selected>Please select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_selected')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label  >@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"></i>@lang('site.add')</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
