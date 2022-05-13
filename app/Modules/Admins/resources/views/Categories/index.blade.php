@extends('Admins::layouts.dashboard.app')

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

                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" title="Search" class="btn btn-primary"> <i class="fa fa-search"></i></button>
                                <a href="{{route('category.create')}}" title="Add" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </form>

                </div> {{--   end of box header --}}

                <div class="box-body">
                    @if(isset($details))
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.updated_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($details as $index=> $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->created_at }}</td>
                                    <td>{{ $detail->updated_at }}</td>
                                    <td>

                                        <a
                                            href="{{route('category.edit',$detail->id)}}"
                                            class="btn btn-sm btn-primary"
                                            title="Edit">
                                            <i class="fa fa-edit" style="color: #fff"></i></a>

                                        <form action="{{route('category.destroy',$detail->id)}}" method="post"  style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash" style="color: #fff"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>{{-- end of table --}}
                    @elseif ($categories->count() > 0)
                        @if (isset($message))
                            <h2>@lang($message)</h2>
                        @else
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.created_at')</th>
                                    <th>@lang('site.updated_at')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $index=> $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a
                                                href="{{route('category.edit',$category->id)}}"
                                                class="btn btn-sm btn-primary"
                                                title="Edit">
                                                <i class="fa fa-edit" style="color: #fff"></i></a>

                                            <form action="{{route('category.destroy',$category->id)}}" method="post"  style="display: inline-block">
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
                    @else
                        <h2>@lang('site.no_data_found')</h2>
                    @endif
                </div> <!-- end of box body -->


            </div>{{--   end of box primary --}}
        </section>

    </div>
    @toastr_js
    @toastr_render
@endsection
