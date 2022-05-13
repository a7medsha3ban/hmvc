@extends('Suppliers::layouts.dashboard.app')

@section('content')
    @toastr_css
    <div class="content-wrapper">

        <Section class="content-header">
            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.cities')</li>
            </ol>
        </Section>

        <section class="content">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="margin-bottom: 20px">@lang('site.Cities')</h3>

                    <form action="{{route('product.search')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" title="Search" class="btn btn-primary"> <i class="fa fa-search"></i></button>
                                <a href="{{route('product.create')}}" title="Add" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </form>

                </div> {{--   end of box header --}}

                <div class="box-body">
                    @if ($products->count() == 0)
                        <h2>@lang('site.no_data_found')</h2>
                    @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.category_name')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.updated_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $index=> $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a
                                            href="{{route('product.edit',$product->id)}}"
                                            class="btn btn-sm btn-primary"
                                            title="Edit">
                                            <i class="fa fa-edit" style="color: #fff"></i></a>

                                        <form action="{{route('product.destroy',$product->id)}}" method="post"  style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash" style="color: #fff"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>{{-- end of table --}}
                    @endif
                </div> <!-- end of box body -->


            </div>{{--   end of box primary --}}
        </section>

    </div>
    @toastr_js
    @toastr_render
@endsection
