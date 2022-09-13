@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

    @include('advertisement::property.partial.header')

    <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">ویرایش ویژگی</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('AdverProperty.update', $AdverProperty->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label for="category_id" class="form-label">دسته بندی</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value>انتخاب دسته بندی</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($AdverProperty->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">لطفا دسته بندی را انتخاب کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">نام ویژگی</label>
                                <input type="text" name="name" class="form-control" id="name" required value="{{ $AdverProperty->name }}">
                                <div class="invalid-feedback">لطفا نام ویژگی را وارد کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="type" class="form-label">نوع ویژگی</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="text" @if($AdverProperty->type == 'text') selected @endif>متن</option>
                                    <option value="boolean" @if($AdverProperty->type == 'boolean') selected @endif>چک باکس</option>
                                </select>
                                <div class="invalid-feedback">لطفا نوع ویژگی را انتخاب کنید</div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @csrf
                                @method('PATCH')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection
