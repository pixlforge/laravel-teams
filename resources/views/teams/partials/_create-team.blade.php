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