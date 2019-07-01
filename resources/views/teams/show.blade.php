@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <aside class="side-nav__container">
      @include('teams.partials._nav')
    </aside>
    <div class="content__container">
      <header class="content__header">
        <h2 class="heading__h3">
          Dashboard
        </h2>
      </header>

      <p>
        This is your team dashboard
      </p>
    </div>
  </section>
@endsection