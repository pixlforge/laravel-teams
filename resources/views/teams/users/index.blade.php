@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Team members
      </h2>
    </header>

    <div class="table__wrapper">
      <table class="table__container">
        <thead class="table__head">
          <tr>
            <th class="table__header">User</th>
            <th class="table__header">Role</th>
            <th class="table__header">Joined</th>
            <th class="table__header"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($team->users as $user)
            <tr class="table__row">
              <td class="table__cell">{{ $user->name }}</td>
              <td class="table__cell">
                @if ($team->ownedBy($user))
                  <span class="badge__pill badge__pill--pink">Admin</span>
                @else
                  <span class="badge__pill badge__pill--blue">Member</span>
                @endif
              </td>
              <td class="table__cell">{{ $user->pivot->created_at->diffForHumans() }}</td>
              <td class="table__cell">Menu</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>

  @permission('add users')
    <section class="section__row">
      @include('teams.partials._add-user')
    </section>
  @endpermission
@endsection