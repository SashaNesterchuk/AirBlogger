<template>
  <div
    class="flex flex-col items-center py-6 cursor-pointer bg-dark text-white"
    @click="onClickMonth"
  >
    <div class="font-bold text-xl mb-2">{{ monthName }}</div>
    <p class="text-base text-gray-700">Events: {{ monthCount }}</p>
  </div>
</template>

<script>
import Months from '~/utils/Months'

export default {
  name: 'MonthEvent',

  props: {
    month: {
      type: Number,
      required: true
    },

    count: {
      type: Number,
      default: 0
    },

    year: {
      type: Number,
      required: true
    }
  },

  computed: {
    monthCount() {
      return this.$store.getters['events/countEvent'](this.month) || 0
    },

    monthName() {
      return Months[this.month - 1]
    }
  },

  methods: {
    onClickMonth() {
      this.$router.push({
        name: 'events.month',
        params: { year: this.year, month: this.month }
      })
    }
  }
}
</script>

<style></style>
