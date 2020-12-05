<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Thread;
use App\ThreadFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
    public function index(Request $request)
    {
        if($request->has('tags')){
            $tags=Tag::find($request->tags);
            $threads=$tags->threads;
        }else{
            $threads=Thread::paginate(15);
        }

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
            'tags'=> 'required',
            'thread'=> 'required|min:20',
		//	'g-recaptcha-response' => 'required|captcha'

        ]);


        //store
       $thread= auth()->user()->threads()->create($request->all());

       $thread->tags()->attach($request->tags);
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
     //   if(auth()->user()->id !== $thread->user_id){
       //     abort(401,"unauthorized");
      //  } 
        // validation

        $this->authorize('update',$thread);
        
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
      //  if(auth()->user()->id !== $thread->user_id){
       //     abort(401,"unauthorized");
       // }

        $this->authorize('update',$thread);
        $thread->delete();
        return redirect()->route('thread.index')->withMessage('Thread deleted');
    }

    public function markAsSolution()
    {
       
        $solutionId = Input::get('solutionId');
        $threadId = Input::get('threadId');

        $thread = Thread::find($threadId);
        $thread->solution = $solutionId;
        if ($thread->save()) {

            if(request()->ajax()){

                return response()->json(['status'=>'success','message'=>'marked as solution']);
            }
            return back()->withMessage('Marked as solution');
            
        }


    }
}
