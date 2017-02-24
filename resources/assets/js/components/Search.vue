<template>
  <form action="" class="form">
    <div class="form-group">
      <input type="text" class="form-control" id="listing-search" 
        placeholder="Search listings by title, body, location, etc..." autocomplete="off">
    </div> <!-- /.form-group -->
  </form>
</template>

<script>
  import { listingsautocomplete } from '../helpers/autocomplete';

  export default {
    mounted() {
      listingsautocomplete('#listing-search');
    }
  }
</script>
