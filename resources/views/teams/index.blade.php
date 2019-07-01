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
      <li class="team__list-item">
        <a
          href=""
          class="team__link">
          Team one
        </a>
        <span class="badge__primary">
          Admin
        </span>
      </li>
    </ul>
  </section>

  <section class="section__default">
    <h2 class="heading__h2">
      Create a team
    </h2>

    <form
      method="POST"
      action="">
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
          class="form__input">
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