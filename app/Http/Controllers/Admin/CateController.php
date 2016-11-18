<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use App\Model\Products;

class CateController extends Controller
{
    /**
     * 分类列表
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $cate = (new Cate)->lists($query);

        return view('admin.cate.index')
            ->with('cate', $cate);
    }

    /**
     * 添加分类页
     *
     * @return view
     **/
    public function create()
    {
        return view('admin.cate.create');
    }

    /**
     * 添加分类
     *
     * @return json
     **/
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = (new Cate)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $cate = (new Cate)->store($data);
        if ($cate) {

            return response()->json(['status' => 1, 'message' => '添加成功', 'data' => $cate]);
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
        $data = Cate::find($id);

        if ($data) {

            return response()->json(['status' => 1, 'message' => '查询成功', 'data' => $data]);
        }

        return response()->json(['status' => 0, 'message' => '查询失败']);
    }

    /**
     * 分类编辑页
     *
     * @return view
     **/
    public function edit($id)
    {
        $cate = Cate::find($id);
        $productIds = explode(',', $cate->product_ids);
        $cate->products = Products::whereIn('id', $productIds)->get();

        return view('admin.cate.edit')->with('cate', $cate);
    }

    /**
     * 更新
     *
     * @return view
     **/
    public function update(Request $request,$id)
    {
        $data = $request->all();

        $validator = (new Cate)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $cate = (new Cate)->find($id);
        $data['product_ids'] = implode(',', $data['product_ids']);
        if ($cate->update($data)) {

            return response()->json(['status' => 1, 'message' => '更新成功', 'data' => $cate]);
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
        $cate = Cate::find($id);

        if ($cate->delete()) {
            return response()->json(['status' => 1, 'message' => '删除成功']);
        }

        return response()->json(['status' => 0, 'message' => '删除失败']);
    }
}
