@extends('layouts.app')

@section('content')
  <h1 class="heading__h1">
    Login
  </h1>

  <section class="section__default">
    <form
      method="POST"
      action="{{ route('login') }}">
      @csrf

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
          required
          autofocus>
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
          autocomplete="current-password"
          required>
        @error('password')
          <span
            class="form__validation"
            role="alert">
            {{ $errors->first('password') }}
          </span>
        @enderror
      </div>

      {{-- Remember Me --}}
      <div class="form__group form__group--flex">
        <input
          id="remember"
          type="checkbox"
          name="remember"
          class="form__checkbox"
          {{ old('remember') ?? 'checked' }}>
        <label
          for="remember"
          class="form__label form__label--checkbox">
          {{ __('Remember Me') }}
        </label>
      </div>

      {{-- Submit --}}
      <div class="form__group">
        <button
          type="submit"
          class="button__primary button--pink">
          {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
          <a
            href="{{ route('password.request') }}"
            class="form__link">
            {{ __('Forgot Your Password?') }}
          </a>
        @endif
      </div>
    </form>
  </section>
@endsection
