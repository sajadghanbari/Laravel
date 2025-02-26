@extends('admin.layouts.master')

@section('name')
    <title> پرداخت ها  </title>
@endsection


@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"><a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش </a></li>
      <li class="breadcrumb-item active font-size-12" aria-current="page"> پرداخت ها </li>
    </ol>
  </nav>

  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h4>
                     پرداخت ها 
                </h4>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 borderd-bottom pb-2" >
                <a href="{{ route('admin.market.brand.create')}}" class="btn btn-info btn-sm disable">  ایجاد برند</a>
                <div class="max-width-16-rem">
                    <input type="text" placeholder="جست و جو" class="form-control form-control-sm form-text">
                </div>
            </section>
            <section class="table-resposnsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>  کد تراکنش </th>
                            <th>  بانک </th>
                            <th>  پرداخت کننده </th>
                            <th>  وضعیت پرداخت کننده </th>
                            <th> نوع پرداخت </th>
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
                            <td>all</td>
                            <td class="width-22-rem text-left">
                                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> مشاهده</button>
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-window-close"></i> باطل کردن</button>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>


@endsection