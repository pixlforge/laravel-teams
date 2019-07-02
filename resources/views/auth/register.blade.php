@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    Register an account
  </h1>

  <section class="section__default">
      <form
      method="POST"
      action="{{ route('register') }}">
      @csrf

      {{-- Name --}}
      <div class="form__group">
        <label
          for="name"
          class="form__label">
          {{ __('Name') }}
        </label>
        <input
          id="name"
          name="name"
          type="text"
          class="form__input {{ $errors->has('name') ? 'form__input--invalid' : '' }}"
          value="{{ old('name') }}"
          autocomplete="name"
          required
          autofocus>
        @error('name')
          <span
            class="form__validation"
            role="alert">
            {{ $errors->first('name') }}
          </span>
        @enderror
      </div>

      {{-- Email --}}
      <div class="form__group">
        <label
          for="email"
          class="form__label">
          {{ __('E-Mail Address') }}
        </label>
        <input
          id="email"
          name="email"
          type="email"
          class="form__input {{ $errors->has('email') ? 'form__input--invalid' : '' }}"
          value="{{ old('email') }}"
          autocomplete="email"
          required>
        @error('email')
          <span
            class="form__validation"
            role="alert">
            {{ $errors->first('email') }}
          </span>
        @enderror
      </div>

      {{-- Password --}}
      <div class="form__group">
        <label
          for="password"
          class="form__label">
          {{ __('Password') }}
        </label>
        <input
          id="password"
          name="password"
          type="password"
          class="form__input {{ $errors->has('password') ? 'form__input--invalid' : '' }}"
          autocomplete="new-password"
          required>
        @error('password')
          <span
            class="form__validation"
            role="alert">
            {{ $errors->first('password') }}
          </span>
        @enderror
      </div>

      {{-- Password confirmation --}}
      <div class="form__group">
        <label
          for="password"
          class="form__label">
          {{ __('Confirm Password') }}
        </label>
        <input
          id="password_confirmation"
          name="password_confirmation"
          type="password"
          class="form__input {{ $errors->has('password_confirmation') ? 'form__input--invalid' : '' }}"
          autocomplete="new-password"
          required>
      </div>

      {{-- Submit --}}
      <div class="form__group">
        <button
          type="submit"
          class="button__primary button--pink">
          {{ __('Register') }}
        </button>
      </div>
    </form>
  </section>
@endsection
