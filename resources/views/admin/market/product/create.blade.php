@extends('admin.layouts.master')

@section('name')
    <title> ایجاد کالا </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item font-size-12"><a href="#">   کالا ها   </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد  کالا  </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                     ایجاد  کالا
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.product.index')}}" class="btn btn-info btn-sm"> بازگشت </a>
            </section>
            <section>
                <form action="" method="">
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">  نام کالا</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">دسته کالا</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    <option value="">وسایل الکترونیکی</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">فرم کالا</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    <option value="">وسایل الکترونیکی</option>
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> تصویر </label>
                                <input type="file" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">  وزن</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">  قیمت</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 ">
                            <div class="form-group">
                                <label for="">  توضیحات</label>
                                <textarea name="body" id="body" cols="" rows="6" class="form-control form-control-sm"></textarea>
                            </div>
                        </section>
                        <section class="col-12 border-bottom border-top py-3 mb-4">

                            <div class="row">
                                <section class="col-6 col-md-3">
                                    <div class="form-group  border-bottom">
                                        <input type="text" class="form-control form-control-sm" placeholder=" ویژگی .....">
                                    </div>
                                </section>
                                <section class="col-6 col-md-3">
                                    <div class="form-group  border-bottom">
                                        <input type="text" class="form-control form-control-sm"  placeholder=" مقدار ....">
                                    </div>
                                </section>
                            </div>
                            <section>
                                <button type="button" class="btn btn-success btn-sm">افزودن</button>

                            </section>


                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
        </section>
    </section>
</section>


@endsection

@section('script')
<script src="{{ asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('body');
</script>
@endsection
