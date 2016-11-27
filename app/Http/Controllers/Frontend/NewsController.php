<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\News;

class NewsController extends Controller
{
    /**
     * 新闻资讯
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $news = (new News)->lists($query);

        return view('frontend.news.index')->with('news', $news);
    }

    /**
     * 资讯详情
     *
     * @return json
     **/
    public function show($id)
    {
        $news = News::find($id);
        if ($news) {

            return view('frontend.news.show')->with('news', $news);
        }

        return redirect('/news');
    }
}
