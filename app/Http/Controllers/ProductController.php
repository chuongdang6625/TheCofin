<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Comment;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
     //User
     public function getDetail($id){
        $comments = Comment::where([
            ['product_id',$id],
            ['cment_status',1]
        ])->get();
        $product = Product::where('id',$id)->first();
        $productType = ProductType::where('id',$product->productType_id)->first();
        $productSames = Product::where('id',$product->productType_id)->get();

        return view('user.pages.detail',compact('comments','product','productType','productSames'));
    }

    //Admin
    public function getListProduct(){
        $products = Product::where('product_status',1)->get();
        $productTypes = ProductType::all();
        return view('admin.product.listProduct',compact('products','productTypes'));
    }

    public function getDetailProduct($id){
        $product = Product::where('id',$id)->first();
        $productType = ProductType::where('id',$product->productType_id)->first();
        return view('admin.product.detailProduct',compact('product','productType'));
    }

    public function getProductDeleted(){
        $products = Product::where('product_status', 0)->get();
        $productTypes = ProductType::all();
        return view('admin.product.productDeleted', compact('products','productTypes'));
    }

    public function deleteProduct($id){
        Product::where('id',$id)
            ->update([
                'product_status'=>0
            ]);
        return back()->with('delete_success', 'Đã xóa sản phẩm!!!');
    }

    public function undoProduct($id){
        Product::where('id',$id)
            ->update([
                'product_status'=>1
            ]);
        return back()->with('undo_success', 'Đã hoàn tác sản phẩm');
    }

    //Admin 
    public function getAddProduct(){
        return view('admin.product.addProduct');
    }

    public function postAddProduct(Request $request){
        $messages = [
            'txtTieuDe.required' => 'Bạn chưa nhập tên cho Tiêu Đề',
            'txtTieuDe.unique' => 'Tiêu Đề đã tồn tại',
            'txtTieuDe.min' => 'Tên Tiêu Đề phải có độ dài từ 3 đến 100 ký tự',
            'txtTieuDe.max' => 'Tên Tiêu Đề phải có độ dài từ 3 đến 100 ký tự',
            'txtTheLoai.required' => 'Bạn chưa nhập Thể Loại',
            'txtGia.required' => 'Bạn chưa nhập giá',
            'txtIntro.required' => 'Bạn chưa nhập mô tả',
            'fImages.required' => 'Ảnh không được để trống',
            ];

            $validator = Validator::make($request->all(),[
                
                'txtTieuDe' => 'required|unique:products,product_title|min:3|max:200',
                'txtTheLoai' => 'required',
                'txtGia' => 'required',
                'txtIntro' => 'required',
                'fImages' => 'required',
            ], $messages);
                
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator)  ;
        } 
        else{
            $product = new Product();
            $product->product_title = $request->txtTieuDe;
            $product->product_price = $request->txtGia;
            $product->product_description = $request->txtIntro;
            $product->productType_id = $request->txtTheLoai;
            $product->product_status = $request->rdoStatus;

            if($request->hasfile('fImages')){
                $file = $request->file('fImages');
                //kiem tra duoi anh
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect('admin/product/add')->with('loi', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg và jpeg');
                }
                $name = $file->getClientOriginalName();
                $file->move("images/", $name);
                $product->product_image = $name;
            } else{
                $product->product_image = "";
            }
            $product->save();

            return redirect('admin/product/add')->with('thongbao', 'Thêm sản phẩm thành công');
        }

           
    }

    public function getEditProduct($id){
        $product = Product::find($id);
        
        return view('admin.product.editProduct', ['product'=>$product]);
    }

    public function postEditProduct(Request $request, $product_id){
        $product = Product::find($product_id);
        $this->validate(
            $request,
            [
                'txtTieuDe'=>'required|min:3|max:100',
                'txtTheLoai' => 'required',
                'txtGia' => 'required',
                'txtIntro' => 'required',

            ],
            [
                'txtTieuDe.required' => 'Bạn chưa nhập tên thể loại',
                'txtTieuDe.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'txtTieuDe.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'txtTheLoai.required' => 'Bạn chưa nhập thể loại sản phẩm',
                'txtGia.required' => 'Bạn chưa nhập giá sản phẩm',
                'txtIntro.required' => 'Bạn chưa nhập giới thiệu sản phẩm',
            ]
            );

            $product->product_title = $request->txtTieuDe;
            $product->product_price = $request->txtGia;
            $product->product_description = $request->txtIntro;
            $product->productType_id = $request->txtTheLoai;
            $product->product_status = $request->rdoStatus;

            if($request->hasfile('fImages')){
                $file = $request->file('fImages');
                //kiem tra duoi anh
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect('admin/product/edit')->with('loi', 'Bạn chỉ được chọn file ảnh có đuôi png, jpg và jpeg');
                }
                $name = $file->getClientOriginalName();
                $file->move("images/", $name);
                $product->product_image = $name;
            }
            $product->save();
            return redirect('admin/product/edit/'.$product_id)->with('thongbao', 'Sửa thành công');

    }

}
