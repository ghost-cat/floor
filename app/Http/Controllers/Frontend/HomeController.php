<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\News;

class HomeController extends Controller
{
    /**
     * 主页
     *
     * @return view
     **/
    public function index()
    {
        $news = (new News)->getHomePageNews();

        return view('frontend.index')->with('news', $news);
    }
}
