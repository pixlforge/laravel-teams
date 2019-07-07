@if ($team->hasSubscription())
  <p class="subscriptions__used-slots">
    <strong>{{ $team->users->count() }}</strong> out of <strong>{{ optional($team->plan)->teams_limit ?? '0' }}</strong> user slots used.
  </p>
@endif
