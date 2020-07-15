<?php

namespace App\Http\Controllers;
use Validator;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TypeController extends Controller
{
    public function getListProductType() {
        $productType = ProductType::all();
        return view('admin.productType.listProductType',['productType'=> $productType]);
    }

    public function getEditProductType($id) {
        $productType = ProductType::find($id);
        return view('admin.productType.editProductType',['productType'=> $productType]);
    }
    public function postEditProductType(Request $request, $id) {
        $productType = ProductType::find($id);
        $this->validate(
            $request,
            [
                'txtName' => 'required|min:3|max:100',
                //'txtEmail'=>'required',
                //'fImages'=>'required',
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên thể loại',
                //'txtName.unique' => 'Tên thể loại đã tồn tại',
                'txtName.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'txtName.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
               // 'txtEmail.required'=>'Email Không được trống',
               // 'fImages.required'=>'Logo không được trống',
            ]
        );

        $productType->productType_name = $request->txtName;
        $productType->productType_description = $request->txtIntro;
        $productType->productType_status = $request->rdoStatus;
        $productType->parent_id = $request->txtParent;
        $productType->save();
        return redirect('admin/productType/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getAddProductType() {
        $list_parent = ProductType::with('getParent')->where('parent_id',null)->get();
        return view('admin.productType.addproductType',[
            'list_parent' => $list_parent
        ]);  
    }

    public function postAddProductType(Request $request) {
        $messages = [
            'txtName.required' => 'Bạn chưa nhập tên thể loại',
            'txtName.unique' => 'Tên thể loại đã tồn tại',
            'txtName.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
            'txtName.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
           // 'fImages.required'=>'Hình ảnh không được trống',
            ];

            $validator = Validator::make($request->all(),[
                
                'txtName' => 'required|unique:product_types,productType_name|min:3|max:100',
                // 'fImages'=>'required',
            ], $messages);
            if($validator->fails()){
                return redirect()->back()->withInput()->withErrors($validator)  ;
            } 
            else{
                $productType = new ProductType();
                $productType->productType_name = $request->txtName;
                $productType->productType_description = $request->txtIntro;
                $productType ->productType_status = $request->rdoStatus;
               // $productType->productType_image = $request->fImages;
                $productType->parent_id = $request->txtParent;
        
                $productType->save();
                return redirect('admin/productType/add')->with('thongbao', 'Thêm thành công');
            }

       
    }

    public function getDelete($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();

        return redirect('admin/productType/list')->with('thongbao', 'Bạn đã xóa thành công');
    }

}