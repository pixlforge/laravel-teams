@extends('layouts.team')

@section('teamcontent')
  <section class="section__row">
    <header class="content__header">
      <h2 class="heading__h3">
        Change {{ $user->name }}'s role
      </h2>
    </header>

    <p>
      Update this user's role.
    </p>
    
    <form
      method="POST"
      action="{{ route('teams.users.roles.update', [$team, $user]) }}">
      @csrf
      @method('PATCH')

      <div class="form__group">
        <label
          for="role"
          class="form__label">
          Role
        </label>
        <select
          name="role"
          id="role"
          class="form__select">
          @foreach ($roles as $role => $data)
            <option
              value="{{ $role }}"
              {{ $user->hasRole($role) ? 'selected' : '' }}>
              {{ $data['name'] }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form__group">
        <button
          type="submit"
          class="button__primary button--pink">
          Update
        </button>
      </div>
    </form>

  </section>
@endsection