@extends('layouts.app')

@section('conteudo')


         {{ $perfil->name }}
         <img class="foto" src="{{Voyager::image($perfil->avatar)}}" alt="">












         @endsection
