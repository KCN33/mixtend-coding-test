<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p>{{ args }}</p>
        <p>aaaaaaaaaaaaa</p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
export default {
  name: 'calendars',
  props: {
    args: {},
  },
}

// import Vue from "vue/types/umd";

// export default class Calendar extends Vue {
//   @Prop({
//     required: true,
//   })args!: any;
// }
</script>
