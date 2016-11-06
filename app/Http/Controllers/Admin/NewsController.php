<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Classes\Uploader;

class NewsController extends Controller
{
    /**
     * 新闻列表
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $news = (new News)->lists($query);

        return view('admin.news.index')
            ->with('news', $news);
    }

    /**
     * 添加新闻页
     *
     * @return view
     **/
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * 添加新闻
     *
     * @return json
     **/
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = (new News)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $news = (new News)->store($data);
        if ($news) {

            return response()->json(['status' => 1, 'message' => '添加成功', 'data' => $news]);
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
        $data = News::find($id);

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
        $news = News::find($id);

        return view('admin.news.edit')->with('news', $news);
    }

    /**
     * 更新
     *
     * @return view
     **/
    public function update(Request $request,$id)
    {
        $data = $request->all();

        $validator = (new News)->validate($data);
        if ($validator->fails()) {
            
            return response()->json(['status' => 0, 'message' => $validator->messages()->first()]);
        }
        
        $news = (new News)->find($id);
        if ($news->update($data)) {

            return response()->json(['status' => 1, 'message' => '更新成功', 'data' => $news]);
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
        $news = News::find($id);

        if ($news->delete()) {
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
        $result = (new Uploader)->upload('news', $request);

        return response()->json($result);
    }
}
