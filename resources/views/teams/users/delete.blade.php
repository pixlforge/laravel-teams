@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Remove {{ $user->name }} from {{ $team->name }}
      </h2>
    </header>

    <p>
      Are you sure you want to remove user <strong>{{ $user->name }}</strong> from team <em>{{ $team->name }}</em>? This action is permanent.
    </p>

    <form
      method="POST"
      action="{{ route('teams.users.destroy', [$team, $user]) }}">
      @csrf
      @method('DELETE')

      <div class="form__group">
        <button class="button__primary button--red">
          Remove
        </button>
      </div>
    </form>
  </section>
@endsection