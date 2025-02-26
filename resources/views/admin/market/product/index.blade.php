@extends('admin.layouts.master')

@section('name')
    <title> کالا ها  </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> کالا ها  </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                    کالا ها  
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.product.create')}}" class="btn btn-info btn-sm">  ایجاد کالا</a>
                <div class="max-width-16-rem">
                    <input type="text" placeholder="جست و جو" class="form-control form-control-sm form-text">
                </div>
            </section>
            <section class="table-resposnsive">
                <table class="table table-striped table-hover h-150px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>  نام کالا </th>
                            <th>   تصویر کالا</th>
                            <th>   قیمت</th>
                            <th> وزن</th>
                            <th>  پرداخت</th>
                            <th>  دسته</th>
                            <th>  فرم</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>apple</td>
                            <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" class="max-height-2rem"></td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>apple</td>
                            <td>ششش</td>
                            <td class="width-16-rem text-left">
                                <div class="dropdown">
                                    <a href="" class="btn btn-success btn-block dropdown-toggle" role="button" id="dropdownMenuLink" aria-expanded="false" data-toggle="dropdown">
                                        <i class="fa fa-tools"></i>عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i>  گالری</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>  فرم کالا</a>
                                        <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>  ویرایش</a>
                                        <form action="" method="POST">
                                            <button type="submit" class="dropdown-item text-right">
                                                <i class="fa fa-window-close"></i>  حذف
                                            </button>
                                        </form>
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