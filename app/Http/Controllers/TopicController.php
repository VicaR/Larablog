<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Block;
use App\User;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $topics=Topic::all();
      return view('topic.index',['topics'=>$topics,'id'=>0]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check())
        {    
        $topic=new Topic;
        return view ('topic.create',['topic'=>$topic]);
        }
        else
        {
         return redirect('login');   
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic=new Topic;
        $topic->topicname=$request->topicname;
        $uid=\Auth::user()->id;
        $u=User::find($uid);
        $topic->owner=$u->name;
        if(! $topic->save())   //if errors
            {
              $err=$topic->getErrors();
              return redirect()->action('TopicController@create')->with('errors',$err)->withInput();
            }
        return redirect()->action('TopicController@create')->with('success',"New topic has been added with id=".$topic->id);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $blocks=Block::where('topicid','=',$id)->get();
      $topics=Topic::all();

        $topic=Topic::find($id);
        $owner=$topic->owner;
        $flag=true;
        if(\Auth::user()->name !=$owner){
            $flag=false;
        };
      return view('topic.index',['blocks'=>$blocks,'topics'=>$topics, 'id'=>$id,'flag'=>$flag]);  
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
    public function update(Request $request, $id)
    {
        //
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
