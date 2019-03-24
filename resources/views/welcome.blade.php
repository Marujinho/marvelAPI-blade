@extends('layouts.main')

@section('css')

<style>
  /* .jumbotron{
    background-image: url("https://poltronanerd.com.br/wp-content/uploads/2018/09/Marvel-Character-Rights-770x405.jpg");
    background-size: cover;
    repeat:no-repeat;
  } */

</style>
@endsection

@section('content')
<div class="container">
  <div class="jumbotron" style="margin-top:15px">
    <h1 class="text-center">MARVELMASH</h1>
    <p>São apresentados dois personagens da marvel e você decide quem venceria num duelo. Nao vale pular!</p>
  </div>
  <div class="text-center">
    <a href="{{ route('characters.index') }}">
      <button class="btn btn-default btn-lg">Começar</button>
    </a>
  </div>
</div>
@endsection
