<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likeStore(Request $request)
    {
        $likes = Like::where('user_id', Auth()->id())->where('question_id', $request->id)->first();
        if($likes == null){
            $like = new Like();
            $like->user_id = Auth()->id();
            $like->question_id = $request->id;
            $like->save();
            $like = Like::where('question_id', $request->id)
                    ->groupBy('question_id')
                    ->selectRaw('count(*) as total, question_id')
                    ->first();
            $likeTotal = $like->total ?? 0;
            return response()->json($likeTotal);
        }else{
            $likes->delete();
            $like = Like::where('question_id', $request->id)
                ->groupBy('question_id')
                ->selectRaw('count(*) as total, question_id')
                ->first();
            $likeTotal = $like->total ?? 0;
            return response()->json($likeTotal);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
