@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Subscription
      </h2>
    </header>

    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum quo quos dicta recusandae, expedita laudantium dolores, iusto, ea earum itaque totam. Accusantium corporis qui eos autem, expedita provident doloribus eveniet.
    </p>
  </section>

  <section class="section__row">
    @unless ($team->hasSubscription())
      @include('teams.subscriptions.partials._create-subscription')
    @else
      <p>
        You're currently on the <strong>{{ $team->plan->name }}</strong> plan.<br>
        This plan supports up to <strong>{{ $team->plan->teams_limit }}</strong> users.
      </p>      
    @endunless
  </section>

@endsection