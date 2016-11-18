<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
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
            'parent_cate'   => 'required',
            'product_ids'   => 'required|array',
        ];

        $messages = [
            'title.required' => '请填写标题',
            'parent_cate.required' => '请填选择分类',
            'product_ids.required' => '请添加商品',
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
        $query = Cate::orderBy('created_at', 'desc');

        return $query->paginate(10);
    }

    /**
     * 保存
     *
     * @return bool|obj
     **/
    public function store($data)
    {
        $data['product_ids'] = implode(',', $data['product_ids']);
        
        return Cate::create($data);
    }

}
