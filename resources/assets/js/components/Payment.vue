<template>
  <form method="post" v-if="loaded">
    <div id="dropin"></div>
    <hr>
    <button class="btn btn-primary" v-if="showSubmitButton">Complete</button>
    <input type="hidden" name="_token" :value="csrfToken">
  </form>
  <div v-else>
    Loading payment form...
  </div>
</template>

<script>
  import braintree from 'braintree-web';

  export default {
    data() {
      return {
        loaded: false,
        showSubmitButton: false,
        csrfToken: window.Laravel.csrfToken
      }
    },

    mounted() {
      axios.get('/braintree/token').then(response => {
        this.loaded = true;
        braintree.setup(response.data.data.token, 'dropin', {
          container: 'dropin',
          onReady: () => {
            this.showSubmitButton = true;
          }
        });
      });
    }
  }
</script>
