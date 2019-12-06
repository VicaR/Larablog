@extends('layouts.app')

@section('content')
<div class="row-fluid">
@if(count(session('errors'))>0 )
<div class="alert alert-danger">
     @foreach(session('errors')->all() as $e )
         {{$e}}<br/>
     @endforeach
</div>         
@endif
@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif
<div>
<div class="row-fluid">
{!! Form::model($topic,array('action'=>'TopicController@store'),array('class'=>"form-control")) !!}
<div class="form-group">
{!!  Form::label('topicname','Topic name')  !!}
{!!  Form::text('topicname','',array('class'=>"form-control")) !!}
</div>
<button type="submit" class="btn btn-success">Add Topic</button>
{!! Form::close() !!}
@endsection