@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Delete team {{ $team->name }}
      </h2>
    </header>

    <p>
      Are you sure you want to delete the team {{ $team->name }}? This action is permanent.
    </p>

    <form
      method="POST"
      action="{{ route('teams.destroy', $team) }}">
      @csrf
      @method('DELETE')

      <div class="form__group">
        <button class="button__primary button--red">
          Confirm delete
        </button>
      </div>
    </form>
  </section>
@endsection