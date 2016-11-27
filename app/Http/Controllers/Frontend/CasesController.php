<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cases;

class CasesController extends Controller
{
    /**
     * 案例展示
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $cases = (new Cases)->lists($query);

        return view('frontend.cases')->with('cases', $cases);
    }
}
