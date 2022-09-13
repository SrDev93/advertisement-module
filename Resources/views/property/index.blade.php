@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">


    @include('advertisement::property.partial.header')

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">لیست ویژگی ها</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">دسته بندی</th>
                                    <th class="wd-15p border-bottom-0">نام ویژگی</th>
                                    <th class="wd-15p border-bottom-0">نوع ویژگی</th>
                                    <th class="wd-20p border-bottom-0">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>@if($item->category) {{ $item->category->name }} @endif</td>
                                        <td>{{ $item->name }}</td>
                                        <td>@if($item->type == 'text') متن @else چک باکس @endif</td>
                                        <td>
                                            <a href="{{ route('AdverProperty.edit', $item->id) }}" class="btn btn-primary fs-14 text-white edit-icn" title="ویرایش">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('برای حذف اطمبنان دارید؟')" form="form-{{ $item->id }}" class="btn btn-danger fs-14 text-white edit-icn" title="حذف">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                            <form id="form-{{ $item->id }}" action="{{ route('AdverProperty.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('AdverProperty.create') }}" class="btn btn-primary">افزودن ویژگی</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection