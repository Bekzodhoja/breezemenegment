<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{

    public function __construct(){
        $this->middleware('role:1');
    }
    public function create(Application $application)
    {
        if (! Gate::allows('update-post', auth()->user())) {
            abort(403);
        }
        return view('answers.create',compact('application'));
    }


    public function store(Request $request,Application $application)
    {

        $request->validate(['body'=>'required']);
        $application->answer()->create([
            'body'=>$request->body,
        ]);


        if (! Gate::allows('update-post', auth()->user())) {
            abort(403);
        }
        return redirect()->route('dashboard');
    }
}
