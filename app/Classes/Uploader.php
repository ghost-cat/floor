<?php

namespace App\Classes;

class Uploader
{
    /**
     * 上传图片
     *
     * @return array
     */
    public function upload($type, $request)
    {
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');

            $hash  = md5(microtime(true));
            $hashs = str_split($hash);

            $dir = '/uploads/' . $type . sprintf('/%s/%s', $hashs[0], $hashs[1]);
            $directory = public_path() . $dir;

            $info = pathinfo($file->getClientOriginalName());
            $name = sprintf('%s.%s', $hash, $info['extension']);

            if ($file->move($directory, $name)) {

                return ['status' => 1, 'path' => $dir . '/' . $name];
            }
        }

        return ['status' => 0, 'message' => '文件上传失败,请重试'];
    }
}