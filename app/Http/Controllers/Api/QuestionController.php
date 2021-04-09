<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Models\User;
use App\Models\Like;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function login(Request $request) {

        $validData = User::where('email',$request->email)->first();
        $password_check = password_verify($request->password,@$validData->password);
        if($password_check == false && $validData == false) {
            return response([
                'errors' => "Email & Password Does Not Match"
            ]);
        }
        else{
            return response()->json($validData);
        }        
    }

    public function question()
    {
       return $data = question::withCount('like')->with('category')->orderBy('id', 'DESC')->get();       
    }

    public function questionSingle($id)
    {
        return question::with('category')->with('answer')->with('answer.user')->findorfail($id);         
    }

    public function likeStore(Request $request)
    {
       
        // return $request->userId;
        // $likes = Like::where('user_id', Auth()->id())->where('question_id', $request->id)->first();
        // if($likes == null){
        //     $like = new Like();
        //     $like->user_id = Auth()->id();
        //     $like->question_id = $request->id;
        //     $like->save();
        //     $like = Like::where('question_id', $request->id)
        //             ->groupBy('question_id')
        //             ->selectRaw('count(*) as total, question_id')
        //             ->first();
        //     $likeTotal = $like->total ?? 0;
        //     return response()->json($likeTotal);
        // }else{
        //     $likes->delete();
        //     $like = Like::where('question_id', $request->id)
        //         ->groupBy('question_id')
        //         ->selectRaw('count(*) as total, question_id')
        //         ->first();
        //     $likeTotal = $like->total ?? 0;
        //     return response()->json($likeTotal);
        // } 
    }
}
