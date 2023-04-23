<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Application $application)
    {

        return view('answers.create',compact('application'));
    }


    public function store(Request $request,Application $application)
    {

        $request->validate(['body'=>'required']);
        $application->answer()->create([
            'body'=>$request->body,
        ]);
        return redirect()->route('dashboard');
    }
}
