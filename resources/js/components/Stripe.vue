<template>
  <div>

    <div class="form__group">
      <h3 class="heading__h4">
        Payment details
      </h3>
    </div>

    <!-- Stripe element input -->
    <div
      id="card-element"
      class="stripe__input"/>

    <!-- Validation errors -->
    <div
      id="card-errors"
      class="text-sm text-red-500 mt-2"/>
    
    <!-- Card token -->
    <input
      type="hidden"
      name="token"
      :value="token">

    <div
      v-if="token"
      class="form__group">
      <button
        type="submit"
        class="button__primary button--pink">
        Process payment
      </button>
    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      token: null
    };
  },
  mounted() {
    const stripe = Stripe('pk_test_uEe69exC8AHZfOSMYdSvJyc0');
    const elements = stripe.elements();

    const card = elements.create('card', {
      style: {
        base: {
          fontSize: '14px',
          color: '#32325d',
        }
      }
    });

    card.addEventListener('change', event => {
      let displayError = document.getElementById('card-errors');

      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        if (event.complete) {
          stripe.createToken(card).then(result => {
            if (result.error) {
              displayError = result.error.message;
            } else {
              this.token = result.token.id;
            }
          });
        }
      }
    });

    card.mount('#card-element');
  }
}
</script>
