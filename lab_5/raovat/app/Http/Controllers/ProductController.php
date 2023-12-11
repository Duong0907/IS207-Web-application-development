<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function renderAllProducts(Request $request)
    {
        $products = DB::select('select * from products');
        return view('product.index', ['products' => $products]);
    }

    public function renderManagePosts(Request $request) {
        $products = DB::select('select * from products');
        return view('product.managepost', ['products' => $products]);
    }


    public function renderEditPost(Request $request) {
        if ($request->has('id')) {
            $id = $request->id;

            $products = DB::select('SELECT * FROM products WHERE Id = ?' , [$id]);

            return view('product.editpost', ['product' => $products[0]]); 
        }
    }

    public function renderCreatePost(Request $request) {
        return view('product.createpost');
    }
    
    public function searchProducts(Request $request)
    {
        // Empty keyword mean getting all products
        $incomingFields = $request->json()->all();

        $products = DB::select('select * from products where ProductName like "%' . $incomingFields['keyword'] . '%"');
        return json_encode($products);
    }

    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'ProductName' => ['required'],
            'SalePrice' => ['required'],
            'CategoryName' => ['required'],
            'ImageLink' => ['required'],
            'ProductLink' => ['required']
        ], [
            'ProductName.required' => "Vui lòng nhập tên sản phẩm",
            'txtPrice.required' => "Vui lòng nhập giá sản phẩm",
            'SalePrice.required' => "Vui lòng nhập loại sản phẩm",
            'ImageLink.required' => "Vui lòng nhập link hình ảnh",
            'ProductLink.required' => "Vui lòng nhập link sản phẩm"
        ]);

        DB::table('products')->insert($incomingFields);

        $products = DB::select('select * from products');
        return view('product.managepost', ['products' => $products])->with('message','Tạo thành công!');
    }

    public function deletePost(Request $request) {
        $id = $request->input('id');

        DB::delete('delete from products where Id = ?',[$id]);

        $products = DB::select('select * from products');
        return view('product.managepost', ['products' => $products])->with('message','Xóa thành công!');
    }
    public function editPost(Request $request) {

        $incomingFields = $request->validate([
            'Id' => ['required'],
            'ProductName' => ['required'],
            'SalePrice' => ['required'],
            'CategoryName' => ['required'],
            'ImageLink' => ['required'],
            'ProductLink' => ['required']
        ], [
            'Id.required' => "Chưa có Id sản phẩm",
            'ProductName.required' => "Vui lòng nhập tên sản phẩm",
            'txtPrice.required' => "Vui lòng nhập giá sản phẩm",
            'SalePrice.required' => "Vui lòng nhập loại sản phẩm",
            'ImageLink.required' => "Vui lòng nhập link hình ảnh",
            'ProductLink.required' => "Vui lòng nhập link sản phẩm"
        ]);

        $updateQuery = 'update products set ProductName=?, SalePrice=?, CategoryName=?, ImageLink=?, ProductLink=? where id = ?';
        DB::update($updateQuery, [
            $incomingFields['ProductName'],
            $incomingFields['SalePrice'],
            $incomingFields['CategoryName'],
            $incomingFields['ImageLink'],
            $incomingFields['ProductLink'],
            $incomingFields['Id']
        ]);

        $products = DB::select('select * from products');
        return view('product.managepost', ['products' => $products])->with('message','Cập nhật thành công!');

    }
}
