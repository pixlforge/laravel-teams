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
        id="plan-{{ $plan->id }}"
        name="plan"
        type="radio"
        class="form__radio"
        value="{{ $plan->id }}"
        {{ $loop->first ? 'checked' : '' }}>
      <label
        for="plan-{{ $plan->id }}"
        class="form__label form__label--radio">
        {{ $plan->name }}
        <span class="form__label--info">({{ $plan->teams_limit }} users)</span>
      </label>
    </div>
  @endforeach

  <Stripe/>

</form>