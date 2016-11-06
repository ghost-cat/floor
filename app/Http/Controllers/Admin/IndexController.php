<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cases;
use App\Classes\Uploader;

class IndexController extends Controller
{
    /**
     * 后台主页
     *
     * @return view
     **/
    public function index()
    {
        return view('admin.index');
    }
}
