@extends('admin.layouts.master')

@section('head-tag')
<title> منو</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> محتوا</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> منو</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد منو</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد  منو
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.content.menu.store') }}" method="post" id="form">

                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">عنوان منو</label>
                                <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">منو والد</label>
                                <select name="parnet_id" id="" class="form-control form-control-sm">
                                    <option value=""> منو اصلی</option>
                                    @foreach ($menus as $menu)
                                    <option value="{{$menu->id}}" @if(old('parnet_id')==$menu->id) selected @endif>
                                        {{$menu->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for=""> آدرس url</label>
                                <input type="text" name="url" value="{{old('url')}}" class="form-control form-control-sm">
                            </div>
                            @error('url')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror

                    </section>
                    <section class="col-12">
                        <button class="btn btn-primary btn-sm">ثبت</button>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection

