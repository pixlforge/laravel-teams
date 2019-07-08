@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Team members
      </h2>
    </header>

    @include('teams.subscriptions.partials._usage')

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
              <td class="table__cell">
                @permission('delete users')
                  @unless ($user->isOnlyAdminInTeam($team))
                    <a
                      href="{{ route('teams.users.remove', [$team, $user]) }}"
                      class="button__blank button__blank--red">
                      &times;
                    </a>
                  @endunless
                @endpermission
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>

  @permission('add users')
    <section class="section__row">
      @if ($team->hasReachedMemberLimit())
        <p>
          @if ($team->hasSubscription())
            You've reached the limit for the number of users for plan <strong>{{ optional($team->plan)->name }}</strong>.
          @endif
          <a
            href="{{ route('teams.subscriptions.index', $team) }}"
            class="link__primary">
            Upgrade
          </a>
          to add more members to <em>{{ $team->name }}</em>.
        </p>
      @else
        @include('teams.partials._add-user')
      @endif
    </section>
  @endpermission
@endsection