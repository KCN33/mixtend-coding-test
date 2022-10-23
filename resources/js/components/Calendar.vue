<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th></th>
              <th v-for="day in args.data.meeting_days" :key="day">{{ day }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="hour in args.data.working_hours" :key="hour">
              <th>{{ hour }}</th>
              <td v-for="day in args.data.meeting_days" :key="day">
                <div v-for="meeting in args.data.meetings[day]" :key="meeting">
                  <p v-if="meetingIsBetween(hour, meeting.start, meeting.end)">{{ meeting.summary }}</p>
                </div>
              </td>
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
  },
  methods: {
    meetingIsBetween(hour, start, end) {
      const hours = hour.split(':');
      const startHours = start.split(':');
      const endHours = end.split(':');

      if (Number(hours[0]) == Number(startHours[0])) {
        if (Number(hours[1]) == Number(startHours[1])) {
          // start
          return true;
        } else if (Number(hours[1]) > Number(startHours[1])) {
          return true;
        }
      } else {
        if (Number(hours[0]) == Number(endHours[0])) {
          if (Number(hours[1]) == Number(endHours[1])) {
            return false;
          } else if (Number(hours[1]) < Number(endHours[1])) {
            return true;
          }
        }
      }
      return false;
    },
  }
}

</script>
