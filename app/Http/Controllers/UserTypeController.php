<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class UserTypeController extends Controller
{
    public function getListProduct(Request $request){
        $list_product = new Product();
        $TypeUser = ProductType::with('getParent')->whereNull('parent_id')->get();
        $loaisp = ProductType::all();

        $prices = [
            is_numeric($request->from) ? $request->from : 1000,
            is_numeric($request->to) ? $request->to : 1000000,
        ];

        $list_product = Product::whereBetween('product_price', $prices);

        if($request->has('productType_id') && $request->get('productType_id', null)){
            $list_product = $list_product->where('productType_id', $request->productType_id);
        }

        if($request->has('search') && $request->get('search', null)){
            $list_product = $list_product
                ->where('product_title', 'like', '%'.trim($request->search).'%')
                ->where('product_title', 'like', '%'.trim($request->search).'%');
        }
        
        $list_product = $list_product->orderBy('product_price', $request->order ?? 'asc')->paginate(12);

        return view('user.pages.list_product',[
            'list_product' => $list_product,
            'TypeUser' => $TypeUser,
            'loaisp' => $loaisp,
        ]);

    }

    public function getProductTypeUser1($type){
        $typeUser = ProductType::all();
        $product = Product::all();

        $loaisp = ProductType::find($type);
        $sp_theoloai = Product::where('productType_id', $type)->paginate(12);

        return view('user.pages.productBrand', compact(
            'typeUser'
        ));
    }
}
