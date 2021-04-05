<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data['question'] = question::orderBy('id', 'DESC')->paginate(5);
        return view('home', $data);
    }
}
