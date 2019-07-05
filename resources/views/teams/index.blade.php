@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    Teams index
  </h1>

  <section class="section__default">
    <h2 class="heading__h2">
      Teams
    </h2>

    <ul class="team__list">
      @forelse ($teams as $team)
        <li class="team__list-item">
          <a
            href="{{ route('teams.show', $team) }}"
            class="team__link">
            {{ $team->name }}
          </a>

          @if ($team->ownedByCurrentUser())
            <span class="badge__pill badge__pill--pink">
              Admin
            </span>
          @endif
        </li>
      @empty
        <li class="team__list-item">
          You're not part of any team yet.
        </li>
      @endforelse
    </ul>
  </section>

  <section class="section__default">
    <h2 class="heading__h2">
      Create a team
    </h2>

    <form
      method="POST"
      action="{{ route('teams.store') }}">
      @csrf         

      <div class="form__group">
        <label
          for="name"
          class="form__label">
          Team name
        </label>
        <input
          id="name"
          name="name"
          type="text"
          class="form__input {{ $errors->has('name') ? 'form__input--invalid' : '' }}"
          value="{{ old('name') ?? old('name') }}">
        @if ($errors->has('name'))
          <span class="form__validation">
            {{ $errors->first('name') }}
          </span>
        @endif
      </div>

      <div class="form__group">
        <button
          type="submit"
          class="button__primary button--pink">
          Create team
        </button>
      </div>
    </form>
  </section>
@endsection