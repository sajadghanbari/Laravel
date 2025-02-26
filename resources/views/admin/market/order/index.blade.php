@extends('admin.layouts.master')

@section('name')
    <title> سفارشات  </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> سفارشات  </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                    سفارشات  
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.brand.create')}}" class="btn btn-info btn-sm">  ایجاد سفارش</a>
                <div class="max-width-16-rem">
                    <input type="text" placeholder="جست و جو" class="form-control form-control-sm form-text">
                </div>
            </section>
            <section class="table-resposnsive">
                <table class="table table-striped table-hover h-150px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>  کد سفارش</th>
                            <th>  مبلغ سفارش</th>
                            <th>  مبلغ تخفیف</th>
                            <th>مبلغ  نهایی</th>
                            <th>وضعیت  پرداخت</th>
                            <th>شیوه  پرداخت</th>
                            <th>  بانک</th>
                            <th>وضعیت  ارسال</th>
                            <th>شیوه  ارسال</th>
                            <th> وضعیت سفارش</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" class="max-height-2rem"></td>
                            <td class="width-16-rem text-left">
                                <div class="dropdown">
                                    <a href="" class="btn btn-success btn-block dropdown-toggle" role="button" id="dropdownMenuLink" aria-expanded="false" data-toggle="dropdown">
                                        <i class="fa fa-tools"></i>عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>  تغییر وضعیت ارسال</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>  تغییر وضعیت سفارش</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-window-close"></i>  باطل کردن سفارش</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>


@endsection