<nav>
  <ul class="side-nav__list">

    {{-- Dashboard --}}
    <li class="side-nav__list-item">
      <a
        href="{{ route('teams.show', $team) }}"
        class="side-nav__link">
        Dashboard
      </a>
    </li>

    {{-- Users --}}
    <li class="side-nav__list-item">
      <a
        href="{{ route('teams.users.index', $team) }}"
        class="side-nav__link">
        Users
      </a>
    </li>

    {{-- Subscription --}}
    @permission('manage team subscription')
      <li class="side-nav__list-item">
        <a
          href="{{ route('teams.subscriptions.index', $team) }}"
          class="side-nav__link">
          Subscription
        </a>
      </li>
    @endpermission
  </ul>

  @permission('delete team')
    <ul class="side-nav__list">
      
      {{-- Delete the team --}}
      <li class="side-nav__list-item">
        <a
          href="{{ route('teams.delete.confirmation', $team) }}"
          class="side-nav__link side-nav__link--grey">
          Delete team
        </a>
      </li>
    </ul>
  @endpermission
</nav>