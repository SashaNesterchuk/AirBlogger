<template>
  <div>
    <div class="font-bold text-xl mb-8">Events: {{ monthName }} {{ year }}</div>

    <div
      v-if="eventsDay.size"
      class="grid grid-cols-1 gap-3 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3"
    >
      <event-day v-for="event in eventsDay" :key="event.id" :event="event" />
    </div>
    <div v-else class="font-bold text-xl">Empty</div>
  </div>
</template>

<script>
import Months from '~/utils/Months'
import { mapState } from 'vuex'
import EventDay from '~/components/event/EventDay'

export default {
  name: 'EventMonthPage',

  components: {
    EventDay
  },

  computed: {
    ...mapState('events', ['events']),

    eventsDay() {
      return this.$store.getters['events/eventById'](this.month)
    },

    month() {
      return parseInt(this.$route.params.month)
    },

    monthName() {
      return Months[this.month - 1]
    },

    year() {
      return parseInt(this.$route.params.year)
    }
  },

  created() {
    if (!Object.keys(this.events).length) {
      this.$store.dispatch('events/month', {
        year: this.year,
        month: this.month
      })
    }
  }
}
</script>

<style></style>
