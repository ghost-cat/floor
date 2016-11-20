<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = ['id'];

    /**
     * 验证提交参数
     *
     * @param $data array 提交数据
     *
     * @return obj
     **/
    public function validate($data)
    {
        $rules = [
            'title' => 'required',
            'overview' => 'required|max:255',
            'content'   => 'required',
            'image'   => 'required',
        ];

        $messages = [
            'title.required' => '请填写标题',
            'overview.required' => '请填写简介',
            'content.required' => '内容不能为空',
            'image.required' => '请上传图片',
        ];

        return \Validator::make($data, $rules, $messages);
    }

    /**
     * 获取列表数据
     *
     * @return void
     **/
    public function lists($data)
    {
        $query = News::orderBy('created_at', 'desc');

        return $query->paginate(10);
    }

    /**
     * 保存
     *
     * @return bool|obj
     **/
    public function store($data)
    {
        $data['status'] = 'publish';
        
        return News::create($data);
    }

    /**
     * 获取首页资讯
     *
     * @return obj
     **/
    public function getHomePageNews()
    {
        return News::orderBy('created_at', 'desc')->take(3)->get();
    }
}
