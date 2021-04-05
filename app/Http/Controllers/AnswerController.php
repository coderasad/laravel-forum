<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $save = answer::create($data);
        if($save){
            return Redirect::back()->withToastSuccess('Answer Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(answer $answer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, answer $answer)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(answer $answer)
    {
        //
    }
}
