@extends('admin.layouts.master')

@section('head-tag')
<title> محتوا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> محتوا</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">  دسته بندی</li>
    </ol>
  </nav>
  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  محتوا 
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.category.create') }}" class="btn btn-info btn-sm">ایجاد  محتوا</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th> توضیحات</th>
                            <th> اسلاگ</th>
                            <th> عکس</th>
                            <th> تگ</th>
                            <th> وضعیت</th>

                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postCategories as $postCategory)
                            
                        
                        <tr>
                            <th>1</th>
                            <td>{{$postCategory->name}}</td>
                            <td> {{$postCategory->description}}</td>
                            <td> {{$postCategory->slug}}</td>
                            <td> 
                                <img src="{{asset($postCategory->image)}}" alt="" width="50" height="50">
                            </td>
                            <td> {{$postCategory->tags}}</td>
                            <td>
                                <label for="">
                                    <input type="checkbox" @if( $postCategory->status ===1) checked>
                                </label>
                                @endif
                            </td>

                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.content.category.edit',$postCategory->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.content.category.destroy',$postCategory->id)}}" method="POST">
                                    @csrf
                                    {{method_field('delete')}}
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
