<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cases;
use App\Classes\Uploader;

class CasesController extends Controller
{
    /**
     * 案例展示列表页
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $cases = (new Cases)->lists($query);

        return view('admin.cases.index')
            ->with('cases', $cases);
    }

    /**
     * 新增
     *
     * @return json
     **/
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = (new Cases)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $cases = (new Cases)->store($data);
        if ($cases) {

            return response()->json(['status' => 1, 'message' => '添加成功', 'data' => $cases]);
        }

        return response()->json(['status' => 0, 'message' => '添加失败']);
    }

    /**
     * 详情
     *
     * @return json
     **/
    public function show($id)
    {
        $data = Cases::find($id);

        if ($data) {

            return response()->json(['status' => 1, 'message' => '查询成功', 'data' => $data]);
        }

        return response()->json(['status' => 0, 'message' => '查询失败']);
    }

    /**
     * 删除
     *
     * @return json
     **/
    public function destroy($id)
    {
        $cases = Cases::find($id);

        if ($cases->delete()) {
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
        $result = (new Uploader)->upload('cases', $request);

        return response()->json($result);
    }
}
