<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->q;

        if ($name != '') {
            return News::where('name', 'LIKE', '%' . $name . '%')->get();;
        } else {
            return 'errorrr';
        }
    }
}

