<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
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
            'code'   => 'required',
            'size'   => 'required',
            'image'   => 'required',
        ];

        $messages = [
            'title.required' => '请填写标题',
            'code.required' => '请填写编号',
            'size.required' => '规格尺寸',
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
        $query = Products::orderBy('created_at', 'desc');

        return $query->paginate(10);
    }

    /**
     * 保存
     *
     * @return bool|obj
     **/
    public function store($data)
    {
        return Products::create($data);
    }

    /**
     * 获取产品列表（产品中心）
     *
     * @return obj
     **/
    public function getProductList($input)
    {
        $query = Products::orderBy('created_at', 'desc');

        if (isset($input['cate_id']) && !empty($input['cate_id'])) {
            $cate = Cate::find($input['cate_id']);
            $productIds = explode(',', $cate->product_ids);

            $query = $query->whereIn('id', $productIds);
        }

        if (isset($input['parent_cate']) && !empty($input['parent_cate'])) {
            $cate = Cate::where('parent_cate', $input['parent_cate'])->get();
            $productIds = [];
            foreach ($cate as $item) {
                $productIds[] = $item->product_ids;
            }
            $productIds = implode(',', $productIds);
            $productIds = array_unique(explode(',', $productIds));

            $query = $query->whereIn('id', $productIds);
        }

        return $query->paginate(12);
    }
}
