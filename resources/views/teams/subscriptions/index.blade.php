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

  @unless ($team->hasSubscription())
    <section class="section__row">
      <header class="content__header">
        <h2 class="heading__h3">
          Choose a plan
        </h2>
      </header>

      <form
        method="POST"
        action="{{ route('teams.subscriptions.store', $team) }}">
        @csrf

        @foreach ($plans as $plan)
          <div class="form__group form__group--radio">
            <input
              id="{{ $plan->provider_id }}"
              name="plan"
              type="radio"
              class="form__radio"
              value="{{ $plan->provider_id }}"
              {{ $loop->first ? 'checked' : '' }}>
            <label
              for="{{ $plan->provider_id }}"
              class="form__label form__label--radio">
              {{ $plan->name }}
              <span class="form__label--info">({{ $plan->teams_limit }} users)</span>
            </label>
          </div>
        @endforeach

        <Stripe/>

      </form>
    </section>
  @endunless

@endsection