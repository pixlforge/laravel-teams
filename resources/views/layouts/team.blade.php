@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    {{ $team->name }}
  </h1>

  @yield('teamcontent')
@endsection