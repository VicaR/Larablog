@extends('layouts.app')
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
</div>
@endif    

{!!Form::model($block,['action'=>'Blockcontroller@store','files'=>true,'class'=>'form'])!!}
<div class="form-group">
{!!Form::label('topicid','Select Topic',['class'=>'col-md-4 col-lg-4 col-sm-6'])!!}
{!!Form::select('topicid',$topics, '',['class'=>'col-md-4 col-lg-4 col-sm-6'])!!}
</div>
<div class="form-group">
{!!Form::label('title','Block Title',['class'=>'col-md-2'])!!}
{!!Form::text('title','',['class'=>'col-md-10'])!!}
</div>
<div class="form-group">
{!!Form::label('content','Add content',['class'=>'col-md-2'])!!}
{!!Form::textarea('content','',['class'=>'col-md-10'])!!}
</div>
<div class="form-group">
{!!Form::label('imagepath','Add image',['class'=>'col-md-2'])!!}
{!!Form::file('imagepath','',['class'=>'col-md-10'])!!}
</div>
<button class="btn btn-success" type="submit">Add block</button>
{!!Form::close()!!}
@endsection