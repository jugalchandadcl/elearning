<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Learn;
use App\Question;
use App\Answer;
use App\User;
use Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function submitView(Question $question)
    {
      $attempts = $question->answers()->where('user_id',Auth::user()->id)->count();
      if($attempts == $question->practice_limit){
        return "You cross your practice limit this question";
      }
      return view('question.answer_submit',[
        'question' => $question
      ]);
    }

    public function retrive(Answer $answer)
    {
      return response()->json($answer,200);
    }

    public function review_answers(Learn $learn)
    {
     $question = $learn->question;
     $answers = $question->answers;
     return view('question.reviewAnswers',['answers'=>$answers]);
    }

    public function answer_scripts(Answer $answer)
    {
      return view('question.answerScripts',['answer'=>$answer]);
    }
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
    public function store(Request $request,Question $question,User $user)
    {
      $answer = new Answer;
      $answer->user_id = $user->id;
      $answer->question_id = $question->id;
      $answer->answer = json_encode($request->all());
      $answer->answered = true;
      $answer->score = 0;
      $answer->total = count($request->all());
      $answer->checked = false;
      $answer->save();
      return response()->json("ok",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
      $data = $request->all();

      $score = $data['totalScore'];
      unset($data['totalScore']);
      $checked = $data['checked'];
      unset($data['checked']);
      $total = $data['total'];
      unset($data['total']);

      $answer->answer = json_encode($data);
      $answer->score = $score;
      $answer->checked = true;
      $answer->total = $total;
      $answer->save();
      return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
