<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $data['question'] = question::withCount('like')->with('category')->orderBy('id', 'DESC')->paginate(5);
        return view('home', $data);
    }
}
