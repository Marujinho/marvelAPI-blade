@extends('layouts.main')

<!-- <div class="container">
  <div class="page-header">
    <h1 class="text-center">MARVEL API</h1>
  </div>

  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="well">
        <h3 class="text-center">Quem é o mais forte?</h3>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="text-center">
        <div class="col-md-6 col-xs-6">
          <img class="img" src="http://i.annihil.us/u/prod/marvel/i/mg/3/40/4bb4680432f73.jpg">
        </div>

        <div class="col-md-6 col-xs-6">
          <img class="img" src="http://i.annihil.us/u/prod/marvel/i/mg/a/f0/5202887448860.jpg">
        </div>
      </div>
    </div>
  </div>
</div> -->

@foreach($characters as $character)

  <img class="img" src="{{ $character->thumbnail->path}}.{{ $character->thumbnail->extension }}">
  {{$character->name}}

@endforeach
<!-- <img src="http://i.annihil.us/u/prod/marvel/i/mg/3/40/4bb4680432f73/portrait_xlarge.jpg"> -->
