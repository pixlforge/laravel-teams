<nav class="navbar__container container">
  <div>
    <a
      href="{{ route('home') }}"
      class="menu__link">
      {{ config('app.name') }}
    </a>
  </div>
  <ul class="menu__container">
    @auth

      {{-- Teams --}}
      <li class="menu__list-item">
        <a
          href="{{ route('teams.index') }}"
          class="menu__link">
          Teams
        </a>
      </li>

      {{-- Username --}}
      <li class="menu__list-item">
        <a
          href="{{ route('logout') }}"
          class="menu__link">
          {{ Auth::user()->name }}
        </a>
      </li>

      {{-- Logout --}}
      <li class="menu__list-item">
        <a
          href="{{ route('logout') }}"
          class="menu__link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    @endauth
    @guest
      <li class="menu__list-item">
        <a
          href="{{ route('login') }}"
          class="menu__link">
          {{ __('Login') }}
        </a>
      </li>
      @if (Route::has('register'))
        <li class="menu__list-item">
          <a
            href="{{ route('register') }}"
            class="menu__link">
            {{ __('Register') }}
          </a>
        </li>
      @endif
    @endguest
  </ul>
</nav>