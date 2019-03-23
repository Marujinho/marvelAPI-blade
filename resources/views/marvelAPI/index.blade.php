@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="well" style="margin-top:15px">
        <h1 class="text-center">Quem venceria?</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="text-center">
        <div class="col-md-6 col-xs-6">

          {!! Form::open(['route' => ['rank.updateRank', $firstCharacter->id, $secondCharacter->id], 'method'=>'PUT']) !!}
            <button type="submit">
              <img class="img" src="{{$firstCharacter->thumbnail->path}}.{{$firstCharacter->thumbnail->extension}}">
            </button>
          {!! Form::close() !!}
          <div class="text-center">
            <h3>{{$firstCharacter->name}}</h3>
          </div>
        </div>

        <div class="col-md-6 col-xs-6">
          {!! Form::open(['route' => ['rank.updateRank', $secondCharacter->id ,$firstCharacter->id], 'method'=>'PUT']) !!}
            <button type="submit">
              <img class="img" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
            </button>
          {!! Form::close() !!}
          <div class="text-center">
            <h3>{{$secondCharacter->name}}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:15px">
    <div class="col-md-12 col-xs-12">
      <div class="row">
        <div class="text-center">
          <span>Rank</span>
        </div>
      </div>
      <div class="well" style="display: flex; justify-content: space-between;">
        <img style="width:100px; height:100px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:100px; height:100px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:100px; height:100px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:100px; height:100px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:100px; height:100px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
      </div>
    </div>
  </div>
</div>

@endsection
