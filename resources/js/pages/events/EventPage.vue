<template>
  <div v-if="Object.keys(event).length">
    <div class="font-bold text-xl mb-8">Event: {{ event.name }} {{ date }}</div>

    <event-bloggers :bloggers="event.bloggers" />
  </div>
</template>

<script>
import { mapState } from 'vuex'
import EventBloggers from '~/components/event/EventBloggers'

export default {
  name: 'EventPage',

  components: {
    EventBloggers
  },

  computed: {
    ...mapState('events', ['event']),

    date() {
      return new Date(this.event.event_date).toLocaleDateString()
    },

    eventId() {
      return parseInt(this.$route.params.id)
    }
  },

  created() {
    this.$store.dispatch('events/load', { id: this.eventId })
  }
}
</script>

<style></style>
