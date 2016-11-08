<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Classes\Uploader;

class ProductsController extends Controller
{
    /**
     * 新闻列表
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $products = (new Products)->lists($query);

        return view('admin.products.index')
            ->with('products', $products);
    }

    /**
     * 添加新闻页
     *
     * @return view
     **/
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * 添加新闻
     *
     * @return json
     **/
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = (new Products)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $products = (new Products)->store($data);
        if ($products) {

            return response()->json(['status' => 1, 'message' => '添加成功', 'data' => $products]);
        }

        return response()->json(['status' => 0, 'message' => '添加失败']);
    }

    /**
     * 资讯详情
     *
     * @return json
     **/
    public function show($id)
    {
        $data = Products::find($id);

        if ($data) {

            return response()->json(['status' => 1, 'message' => '查询成功', 'data' => $data]);
        }

        return response()->json(['status' => 0, 'message' => '查询失败']);
    }

    /**
     * 资讯编辑页
     *
     * @return view
     **/
    public function edit($id)
    {
        $product = Products::find($id);

        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * 更新
     *
     * @return view
     **/
    public function update(Request $request,$id)
    {
        $data = $request->all();

        $validator = (new Products)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $products = (new Products)->find($id);
        if ($products->update($data)) {

            return response()->json(['status' => 1, 'message' => '更新成功', 'data' => $products]);
        }

        return response()->json(['status' => 0, 'message' => '更新失败']);
    }

    /**
     * 删除
     *
     * @return json
     **/
    public function destroy($id)
    {
        $products = Products::find($id);

        if ($products->delete()) {
            return response()->json(['status' => 1, 'message' => '删除成功']);
        }

        return response()->json(['status' => 0, 'message' => '删除失败']);
    }

    /**
     * 上传图片
     *
     * @return json
     **/
    public function imgUpload(Request $request)
    {
        $result = (new Uploader)->upload('products', $request);

        return response()->json($result);
    }
}
