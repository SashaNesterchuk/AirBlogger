<template>
  <div>
    <div class="mb-8">
      <event-year @changeYear="changeYear" />
    </div>
    <div
      class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
    >
      <event-month
        v-for="month in 12"
        :key="month"
        :month="month"
        :year="year"
      />
    </div>
  </div>
</template>

<script>
import EventMonth from '~/components/event/EventMonth'
import EventYear from '~/components/event/EventYear'

export default {
  name: 'EventYearsPage',

  components: {
    EventMonth,
    EventYear
  },

  data() {
    return {
      year: new Date().getFullYear()
    }
  },

  created() {
    this.ferchEvent()
  },

  methods: {
    changeYear(year) {
      this.year = year

      this.ferchEvent(year)
    },

    ferchEvent(year = this.year) {
      this.$store.dispatch('events/fetch', { year: year })
    }
  }
}
</script>

<style></style>
