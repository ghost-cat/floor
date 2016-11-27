<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';
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
            'image'   => 'required',
        ];

        $messages = [
            'title.required' => '请填写标题',
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
        $query = Cases::orderBy('created_at', 'desc');

        return $query->paginate(9);
    }

    /**
     * 保存
     *
     * @return bool|obj
     **/
    public function store($data)
    {
        return Cases::create($data);
    }
}
