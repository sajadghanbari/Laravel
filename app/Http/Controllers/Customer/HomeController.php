<?php

namespace App\Http\Controllers\Customer;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Market\ProductCategory;

class HomeController extends Controller
{
    public function home()
    {
        // Auth::loginUsingId(1);
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 3)->where('status', 1)->first();
        $brands = Brand::all();
        $mostVisitedProducts = Product::latest()->take(10)->get();
        $offerProducts = Product::latest()->take(10)->get();
        return view('customer.home', compact('slideShowImages', 'topBanners', 'middleBanners', 'bottomBanner', 'brands', 'mostVisitedProducts', 'offerProducts'));
    }

    public function products(Request $request , ProductCategory $category = null)
    {
        $categories = ProductCategory::whereNull('parent_id')->get();
        //get brands
        $brands = Brand::all();
        if($category)
        {
            $productModel = $category->products();
        }
        else $productModel = new Product();
        //switch for filtering
        switch ($request->sort) {
            case "1":
                $column = "created_at";
                $direction = "DESC";
                break;
            case "2":
                $column = "price";
                $direction = "DESC";
                break;
            case "3":
                $column = "price";
                $direction = "ASC";
                break;
            case "4":
                $column = "view";
                $direction = "DESC";
                break;
            case "5":
                $column = "sold_number";
                $direction = "DESC";
                break;
            default:
                $column = "created_at";
                $direction = "ASC";
        }
        if ($request->search) {
            $query = $productModel->where('name', 'LIKE', "%" . $request->search . "%")->orderBy($column, $direction);
        } else {
            $query = $productModel->orderBy($column, $direction);
        }
        $products = $request->max_price && $request->min_price ? $query->whereBetween('price', [$request->min_price, $request->max_price]) :
            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price)->get();
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query->get();
            });
            $products = $products->when($request->brands,function() use ($request, $products){
                $products->whereIn('brand_id',$request->brands);
            });
        $products = $products->paginate(2);
        $products->appends($request->query());
        //get selected brands
        $selectedBrandsArray = [];
        if($request->brands)
        {
            $selectedBrands = Brand::find($request->brands);
            foreach($selectedBrands as $selectedBrand)
            {
                array_push($selectedBrandsArray,$selectedBrand->original_name);
            }
        }
        return view('customer.market.product.products', compact('products','brands','selectedBrandsArray','categories'));
    }
}
