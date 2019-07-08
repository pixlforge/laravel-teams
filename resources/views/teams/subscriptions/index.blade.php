@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    @unless ($team->hasSubscription())
      @include('teams.subscriptions.partials._create-subscription')
    @else
      <header class="content__header">
        <h2 class="heading__h3">
          Current subscription
        </h2>
      </header>

      <p>
        You're currently on the <strong>{{ $team->plan->name }}</strong> plan. This plan supports up to <strong>{{ $team->plan->teams_limit }}</strong> users.
      </p>

      @include('teams.subscriptions.partials._usage')
    @endunless
  </section>

  <section class="section__row">
    @include('teams.subscriptions.partials._swap-subscription')
  </section>

@endsection