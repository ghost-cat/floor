<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * 联系我们
     *
     * @return view
     **/
    public function index(Request $request)
    {
        return view('frontend.contact');
    }
}
