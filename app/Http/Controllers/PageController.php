<?php

namespace App\Http\Controllers;

use App\Models\question;

class PageController extends Controller
{
    public function index()
    {
        $data['question'] = question::withCount('like')->with('category')->orderBy('id', 'DESC')->paginate(5);
        return view('home', $data);

    }

}
