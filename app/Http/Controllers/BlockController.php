<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Block;

class BlockController extends Controller
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
        $block=new Block;
        $topics=Topic::pluck('topicname','id');
        return view('block.create',['block'=>$block,'topics'=>$topics]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,['title'=>'required|max:128','topicid'=>'required']); 



        $block=new Block;
        $fname=$request->file('imagepath');
        if($fname!=null)
        {
           $oname=$request->file('imagepath')->getClientOriginalName(); 
           $request->file('imagepath')->move(public_path().'/images/',$oname);
           $block->imagepath='/images/'.$oname;
        }    
        else
        {
           $block->imagepath=''; 
        }
        $block->title=$request->title;
        $block->topicid=$request->topicid;
        $block->content=$request->content;
        $block->save();
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
        $block=Block::find($id);
       
        $topics=Topic::pluck('topicname','id');
        return view ('block.edit',['block'=>$block,'topics'=>$topics]);
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
         $block=Block::find($id);
         $block->title=$request->title;
         $block->content=$request->content;
          $block->topicid=$request->topicid;
          $fname=$request->file('imagepath');
          if($fname != null)
          {
           $oname=$request->file('imagepath')->getClientOriginalName(); 
           $request->file('imagepath')->move(public_path().'/images/',$oname);
           $block->imagepath='/images/'.$oname;
          }  
          $block->save();
          return redirect ('topic/'.$block->topicid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $block=Block::find($id);
       $block->delete;
       return redirect('topic');  
    }
}
