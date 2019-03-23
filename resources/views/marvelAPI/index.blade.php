@extends('layouts.main')

<div class="container">
  <!-- <div class="page-header">
    <h1 class="text-center">MARVEL API</h1>
  </div> -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="well" style="margin-top:15px">
        <h3 class="text-center">Quem venceria?</h3>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="text-center">
        <div class="col-md-6 col-xs-6">
          <img class="img" src="{{$firstCharacter->thumbnail->path}}.{{$firstCharacter->thumbnail->extension}}">
          <div class="text-center">
            <h3>{{$firstCharacter->name}}</h3>
          </div>
        </div>

        <div class="col-md-6 col-xs-6">
          <img class="img" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
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
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
        <img style="width:70px; height:70px" src="{{$secondCharacter->thumbnail->path}}.{{$secondCharacter->thumbnail->extension}}">
      </div>
    </div>
  </div>
</div>
