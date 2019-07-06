@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    Teams index
  </h1>

  <div class="content__container content__container--narrow">
    <section class="section__row">
      <header class="content__header">
        <h2 class="heading__h2">
          Teams
        </h2>
      </header>
  
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
  
    <section class="section__row">
      @include('teams.partials._create-team')
    </section>
  </div>

@endsection