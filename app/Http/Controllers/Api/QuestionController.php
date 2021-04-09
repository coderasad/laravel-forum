<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function question()
    {
        return question::withCount('like')->orderBy('id', 'DESC')->get();
    }
    public function questionSingle($id)
    {
        return question::findorfail($id);
        // $data['answer'] = answer::where('question_id', $question->id)->get();
        // return view('question.show', $data);
         
    }
}
