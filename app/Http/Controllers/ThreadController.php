<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads=Thread::paginate(10);

        return view('thread.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $this -> validate($request,[

            'subject'=>'required|min:10',
            'type'=> 'required',
            'thread'=> 'required|min:20',
			'g-recaptcha-response' => 'required|captcha'

        ]);


        //store
        auth()->user()->threads()->create($request->all());

        //redirect
            return back()->withMessage('thread created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //shows single thread

        return view('thread.single',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //Allowing only the authorised user
        if(auth()->user()->id !== $thread->user_id){
            abort(401,"unauthorized");
        }
        
        // validation
        $this -> validate($request,[

            'subject'=>'required|min:10',
            'type'=> 'required',
            'thread'=> 'required|min:20',

        ]);
        
        //update

        $thread->update($request->all());
        

        return redirect()-> route('thread.show',$thread->id)->withMessage('Thread updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if(auth()->user()->id !== $thread->user_id){
            abort(401,"unauthorized");
        }
        $thread->delete();
        return redirect()->route('thread.index')->withMessage('Thread deleted');
    }
}
