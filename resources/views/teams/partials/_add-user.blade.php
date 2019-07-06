<header class="content__header">
  <h2 class="heading__h3">
    Add a user
  </h2>
</header>

<form
  method="POST"
  action="{{ route('teams.users.store', $team) }}">
  @csrf         

  <div class="form__group">
    <label
      for="email"
      class="form__label">
      E-mail address
    </label>
    <input
      id="email"
      name="email"
      type="email"
      class="form__input {{ $errors->has('email') ? 'form__input--invalid' : '' }}"
      value="{{ old('email') ?? old('email') }}">
    @if ($errors->has('email'))
      <span class="form__validation">
        {{ $errors->first('email') }}
      </span>
    @endif
  </div>

  <div class="form__group">
    <button
      type="submit"
      class="button__primary button--pink">
      Add user
    </button>
  </div>
</form>