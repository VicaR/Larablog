@extends('layouts.app')
@section('content')
<div class="row-fluid">
  <div class="col-sm-6 col-md-3 col-lg-3">
  <ul style="list-style-type:none">
    @foreach($topics as $t)
        <li>
        <a href="{{url('topic/'.$t->id)}}"> 
        {{$t->topicname}}
        </a>
        <li>
    @endforeach
  </ul>
  </div>
  <div class="col-sm-6 col-md-9 col-lg-9">
    @if ($id !=null)
    @foreach($blocks as $b)
     <div>
          <div>
            <h1>{{$b->title}}</h1>
          </div>
          <div>    
	     		@if($b->imagepath !="")  
	     				<a href="{{ asset($b->imagepath) }}" target="_blank">
	        				<img src="{{asset($b->imagepath)}}" height="150px">
	     				</a>  
	     		@endif
	     		</div> 
          <div>
          <p>{{$b->content}}</p>
          </div>
  
    @if($flag)       
    {!!Form::open(['route'=>['block.destroy',$b->id]])!!}
    
    {{Form::hidden('_method','DELETE')}}
    <button class="btn btn-xs btn-danger glyphicon glyphicon-remove" type="submit"></button>
    {!!Form::close()!!}
  	
    </div>
    {!!Form::model($b,['route'=>['block.update',$b->id]])!!}
    {{Form::hidden('_method','PUT')}}
    <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" href="{{url('block/'.$b->id.'/edit')}}"></a>
    {!!Form::close()!!}
    @endif
    @endforeach

@endif
</div>
</div>
@endsection

