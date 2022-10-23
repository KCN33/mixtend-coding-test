<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th v-for="day in args.data.meeting_days" :key="day">{{ day }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="hour in args.data.working_hours" :key="hour">
              <th>{{ hour }}</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

export default {
  name: 'calendars',
  props: {
    args: {},
  }
}

</script>
