<template>
  <div
    class="border-solid border-4 border-dark p-6 divide-y divide-gray-400 text-dark"
  >
    <div class="font-bold text-xl ">{{ date }}</div>

    <ul class="list-disc list-inside">
      <li
        v-for="ev in event[1]"
        :key="ev.id"
        @click="onClickEvent(ev.id)"
        class="p-2 underline cursor-pointer hover:bg-gray-300"
      >
        {{ ev.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'EventDay',

  props: {
    event: {
      type: Array,
      required: true
    }
  },

  computed: {
    date() {
      return new Date(this.event[1][0].event_date).toLocaleDateString()
    }
  },

  methods: {
    onClickEvent(event) {
      this.$router.push({ name: 'event', params: { id: event } })
    }
  }
}
</script>

<style></style>
