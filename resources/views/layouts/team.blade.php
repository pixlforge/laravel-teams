@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    {{ $team->name }}
  </h1>

  <div class="content__container content__container--flex">
    <aside class="side-nav__container">
      @include('teams.partials._nav')
    </aside>
  
    <div class="content__main">
      @yield('teamcontent')
    </div>
  </div>
@endsection