@extends('admin.layouts.master')

@section('name')
    <title> نظرات</title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> نظرات</li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                      نظرات
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                {{-- <a href="{{ route('admin.market.category.create')}}" class="btn btn-info btn-sm">ایجاد دسته بندی</a> --}}
                <div class="max-width-16-rem">
                    <input type="text" placeholder="جست و جو" class="form-control form-control-sm form-text">
                </div>
            </section>
            <section class="table-resposnsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>  نویسنده نظر</th>
                            <th>  کد کاربر</th>
                            <th>  کد کالا</th>
                            <th> کالا</th>
                            <th>  وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>امیر سجاد</td>
                            <td>121212</td>
                            <td>121212</td>
                            <td>لپتاپ</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.market.comment.show')}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> تایید</button>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>امیر سجاد</td>
                            <td>121212</td>
                            <td>121212</td>
                            <td>لپتاپ</td>
                            <td>در انتظار تایید</td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.market.comment.show')}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-clock"></i> عدم تایید</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>


@endsection