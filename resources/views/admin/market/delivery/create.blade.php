@extends('admin.layouts.master')

@section('name')
    <title>روش ارسال </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item font-size-12"><a href="#">  روش ارسال   </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد روش ارسال  </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                     ایجاد  روش ارسال
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.delivery.index')}}" class="btn btn-info btn-sm"> بازگشت </a>
            </section>
            <section>
                <form action="" method="">
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">نوع روش ارسال</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> هزینه ارسال </label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> زمان ارسال </label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
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