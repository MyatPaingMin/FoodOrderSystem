<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //Product Session


    public function productCreate(){
        $category = Category::get()->toArray();
        // dd($category);
        return view('admin.product.product_create',compact('category'));
    }

    public function product_create(Request $req){
        // dd($req->all());
        $this->validationCheck($req,'create');
        if($req->hasFile('productImage')){
            $photoName = uniqid().$req->file('productImage')->getClientOriginalName();
            $req->file('productImage')->storeAs('public/product',$photoName);
        }
        $datapack = $this->dataCollection($req,$photoName);
        Product::create($datapack);
        // return view('admin.product.product_create');
        return redirect()->route('productlist');
    }
    public function product_update(Request $req){

        $this->validationCheck($req,'update');
        $datapack = $this->dataCol($req);

        $oldImg = Product::where('id',$req->id)->first()->image;
        $datapack['image'] = $oldImg;

        if($req->hasFile('productImage')){
            Storage::delete('public/product/'.$oldImg);
            $newPhoto = uniqid().$req->file('productImage')->getClientOriginalName();
            $req->file('productImage')->storeAs('public/product/',$newPhoto);
            $datapack['image'] = $newPhoto;
        }

        Product::where('id',$req->id)->update($datapack);
        return redirect()->route('productlist')->with(['updateProduct'=>'Product is updated successfully.']);
    }

    private function dataCollection($data,$photoName){
        $datapack = [
            'name' => $data->productName,
            'category_id' => $data->categoryID,
            'description' => $data->productDescription,
            'image' => $photoName,
            'waiting_time'=> $data->productWait,
            'price' => $data->productPrice,
            'view_count' => 0
        ];
        return $datapack;
    }

    private function validationCheck($data,$action){
        $validationItem = [
            'categoryID' => 'required',
            'productDescription' => 'required|min:10',
            'productWait' => 'required|integer',
            'productPrice' => 'required|numeric',
        ];

        $validationItem['productName']  = $action == 'create' ? 'required|unique:products,name' : 'required|unique:products,name,'.$data->id;
        $validationItem['productImage'] = $action == 'create' ? 'required|mimes:jpg,jpeg,png' : 'mimes:jpg,jpeg,png';

        $validationMsg = [
            'productName.required' => 'Product Name must be filled.',
            'productName.unique' => 'Product Name must be unique.',
            'categoryID.required' => 'Please choose a category.',
            'productDescription.required' => 'Product Description Name must be filled.',
            'productDescription.min' => 'Product Descrpition must be longer than 10 words.',
            'productImage.required' => 'Product Image must be chosen.',
            'productImage.mimes' => 'Product image must be in a right format.',
            'productPrice.required' => 'Price must be written.'
        ];
        Validator::make($data->all(),$validationItem,$validationMsg)->validate();
    }

    private function dataCol($data){
        $datapack = [
            'name' => $data->productName,
            'category_id' => $data->categoryID,
            'description' => $data->productDescription,
            'image' => $data->image,
            'waiting_time'=> $data->productWait,
            'price' => $data->productPrice,
            'view_count' => 0
        ];
        return $datapack;
    }

    private function validData($data,$id){
        $validationItem = [
            'productName' => 'required|unique:products,name,'.$id,
            'categoryID' => 'required',
            'productDescription' => 'required|min:10',
            'productWait' => 'required|integer',
            'productImage' => 'mimes:jpg,png,jpeg',
            'productPrice' => 'required|numeric'
        ];
        $validationMsg = [
            'productName.required' => 'Product Name must be filled.',
            'productName.unique' => 'Product Name must be unique.',
            'categoryID.required' => 'Please choose a category.',
            'productDescription.required' => 'Product Description Name must be filled.',
            'productDescription.min' => 'Product Descrpition must be longer than 10 words.',
            'productImage.mimes' => 'Product image must be in a right format.',
            'productPrice.required' => 'Price must be written.'
        ];
        Validator::make($data->all(),$validationItem,$validationMsg)->validate();
    }


    public function product_view($id){
        $productDetail = Product::select('products.*','categories.name as category_name')
            ->where('products.id',$id)
            ->leftJoin('categories','categories.id','products.category_id')
            ->first();

        return view('admin.product.product_detail',compact('productDetail'));
        // $category = Category::where('id',$productDetail['category_id'])->first();
        // return view('admin.product.product_detail',compact(['productDetail','category']));
    }

    public function product_delete($id){
        Product::where('id',$id)->first()->delete();
        return redirect()->route('productlist')->with(['deleteProduct'=>'Product is deleted successfully.']);
    }

    public function product_edit($id){
        $productDetail = Product::where('id',$id)->first();
        $category = Category::get();
        return view('admin.product.product_edit',compact(['productDetail','category']));
    }



    // public function productPage(){
    //     $list = Product::paginate(3);
    //     //Category::where('id',$list['id'])->all()->['name'];
    //     return view('admin.product.product_list',compact('list'));
    // }

    public function productPage(){
        $list = Product::select('products.*','categories.name as category_name')
        ->when(request('search'),function($item){
            $item ->where('products.name','like','%'.request('search').'%');
        })//$_REQUEST['search']
        ->leftJoin('categories','categories.id','products.category_id')
        ->orderBy('products.created_at','desc')
        // ->get()->toArray();
        ->paginate(3);

        $list->appends(request()->all());
        // dd($list);
        return view('admin.product.product_list',compact('list'));
    }

    public function allProduct(){
        $product = Product::get();
        $category = Category::get();

        $data = [
            "product" => $product,
            "category" => $category
        ];
        return response()->json($data,200);
    }

//hi
}
