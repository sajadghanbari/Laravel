<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\PostCategory;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = PostCategory::orderBy('created_at','desc')->simplePaginate(15);
        return view('admin.content.category.index' , compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request,ImageService $imageService)
    {
        $input = $request->all();
        // $input['slug'] = str_replace(' ','-',$input['name']).'-'.Str::random(5);
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('image'.DIRECTORY_SEPARATOR.'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if($result === false )
        {
            return  redirect()->route('admin.content.category.index')->with('toast-error','آپلود تصویر با خطا مواجه شد');

        }
        $input['image'] = $result;
        $postCategory = PostCategory::create($input);
        return  redirect()->route('admin.content.category.index')->with('alert-section-success','دسته بندی جدید شما  با موفقیت ثبت شد')->with('toast-success','دسته بندی جدید شما  با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $input = $request->all();
        $input['image'] = 'image';
        $postCategory ->update($input);
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی با موفقیت  ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $result = $postCategory->delete();
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی با موفقیت حذف شد');
    }


    public function status(PostCategory $postCategory) //for ajax
    {
        $postCategory->status = $postCategory->status == 0 ? 1:0;
        $result = $postCategory->save();
        if($result)
        {
            if($postCategory->status == 0)
            {
                return response()->json(['status'=>true , 'checked'=>false]);
            }
            else
            {
                return response()->json(['status'=>true , 'checked'=>true]);
            }
        }
        else
        {
            return response()->json(['status' => false]);
        }
    }
}
