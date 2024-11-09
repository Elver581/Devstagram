@extends('layouts.app')
@section('titulo')
Pagina principàl
@endsection
@section('contenido')
<x-listar-post :posts="$posts"/>
@endsection