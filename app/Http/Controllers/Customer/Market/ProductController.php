<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Http\Request;
use App\Models\Market\Compare;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        return view('customer.market.product.product',compact('product','relatedProducts'));
    }
    public function addComment(Product $product,Request $request )
    {
        $request->validate([
            'body' => 'required|max:5000'
        ]);
        $inputs['body'] = str_replace(PHP_EOL,'<br/>',$request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create($inputs);
        return back();
    }

    public function addToFavorite(Product $product)
    {
        if(Auth::check())
        {
            $product->user()->toggle([Auth::user()->id]);
            if($product->user->contains(Auth::user()->id))
            {
                return response()->json(['status' => 1]);
            }
            else
            {
                return response()->json(['status' => 2]);
            }
        }
        else
        {
            return response()->json(['status' => 3]);
        }
    }
    public function addRate(Product $product,Request $request)
    {
        $productIds = auth()->user()->isUserPurchasedProduct($product->id);

        if(Auth::check() && $productIds->count() > 0)
        {
            $user = Auth::user();
            $user->rate($product,$request->rating);
            return back()->with('alert-section-success', 'امتیاز شما با موفقیت ثبت شد');
        }
        else
        {
            return back()->with('alert-section-error', 'ابتدا محصول را خریداری کنید');
        }

    }

    public function addToCompare(Product $product)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->compare()->count() > 0) {
                $userCompareList = $user->compare;
            } else {
                $userCompareList = Compare::create(['user_id' => $user->id]);
            }
            $product->compares()->toggle([$userCompareList->id]);
            if ($product->compares->contains($userCompareList->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
}
