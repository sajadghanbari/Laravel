@extends('admin.layouts.master')

@section('name')
    <title>برند </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> برند ها   </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> ایجاد برند  </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                     ایجاد  برند
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.brand.index')}}" class="btn btn-info btn-sm"> بازگشت </a>
            </section>
            <section>
                <form action="" method="">
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">نام برند</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> لوگو </label>
                                <input type="file" class="form-control form-control-sm">
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