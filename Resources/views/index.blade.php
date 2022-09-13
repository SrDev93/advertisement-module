@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">


    @include('advertisement::header')

    <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">لیست آگهی ها</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">نام کاربر</th>
                                    <th class="wd-15p border-bottom-0">دسته بندی</th>
                                    <th class="wd-15p border-bottom-0">عنوان</th>
                                    <th class="wd-15p border-bottom-0">وضعیت</th>
                                    <th class="wd-20p border-bottom-0">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>@if($item->user) {{ $item->user->f_name .' '. $item->user->l_name }} @endif</td>
                                        <td>@if($item->category) {{ $item->category->name }} @endif</td>
                                        <td>{{ $item->title }}</td>
                                        <td>@if($item->status == 0) <span class="badge bg-warning">در انتظار تایید</span> @elseif($item->status == 1) <span class="badge bg-success">تایید شده</span> @elseif($item->status == -1) <span class="badge bg-danger">رد شده @if($item->reason_reject) ( {{ $item->reason_reject }} ) @endif</span> @endif</td>
                                        <td>
{{--                                            <a href="{{ route('AdverProperty.edit', $item->id) }}" class="btn btn-primary fs-14 text-white edit-icn" title="ویرایش">--}}
{{--                                                <i class="fe fe-edit"></i>--}}
{{--                                            </a>--}}
                                            @if($item->status != 1)
                                                <a href="{{ route('advertisement.confirm', $item->id) }}" class="btn btn-primary fs-14 text-white edit-icn" title="تایید">
                                                    <i class="fe fe-check"></i>
                                                </a>
                                            @endif
                                            @if($item->status != -1)
                                                <a class="btn btn-warning fs-14 text-white edit-icn reject-btn" data-id="{{ $item->id }}" data-bs-target="#modaldemo1" data-bs-toggle="modal" href="javascript:void(0)" title="رد کردن">
                                                    <i class="fe fe-x-square"></i>
                                                </a>
                                            @endif

                                            <button type="submit" onclick="return confirm('برای حذف اطمبنان دارید؟')" form="form-{{ $item->id }}" class="btn btn-danger fs-14 text-white edit-icn" title="حذف">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                            <form id="form-{{ $item->id }}" action="{{ route('advertisement.destroy', $item->id) }}" method="post">
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
{{--                    <div class="card-footer">--}}
{{--                        <a href="{{ route('AdverProperty.create') }}" class="btn btn-primary">افزودن ویژگی</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

    <!-- BASIC MODAL -->
    <div class="modal fade"  id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <form action="{{ route('advertisement.reject') }}" method="post">
                    <div class="modal-header">
                        <h6 class="modal-title">رد کردن آگهی</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="adver_id" class="adver_id" value="">
                        <input type="text" name="reason_reject" placeholder="دلیل رد شدن آگهی" value="{{ old('reason_reject') }}" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" >ثبت</button> <button class="btn btn-light" data-bs-dismiss="modal" >انصراف</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('.reject-btn').click(function (){
                let id = $(this).data('id');
                $('.adver_id').val(id);
            })
        </script>
    @endpush
@endsection
