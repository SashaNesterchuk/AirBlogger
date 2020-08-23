<template>
  <div>
    <div
      class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3"
    >
      <event-blogger
        v-for="blogger in bloggers"
        :key="blogger.id"
        :blogger="blogger"
        :count-bloggers="bloggers.length"
        @onClickUp="onClickUp"
        @onClickDown="onClickDown"
      />
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import EventBlogger from '~/components/event/EventBlogger'
import { CLEAR_TYPE } from '~/store/mutation-types'

export default {
  name: 'EventBloggers',

  components: {
    EventBlogger
  },

  props: {
    bloggers: {
      type: Array,
      required: true
    }
  },

  computed: {
    eventId() {
      return parseInt(this.$route.params.id)
    }
  },

  beforeDestroy() {
    this.$store.commit(`events/${CLEAR_TYPE}`)
  },

  methods: {
    onClickDown(id) {
      this.$store.dispatch('events/changeOder', {
        eventId: this.eventId,
        increment_id: id,
        decrement_id: this.secondBlogger(id, 1).id
      })
    },

    onClickUp(id) {
      this.$store.dispatch('events/changeOder', {
        eventId: this.eventId,
        increment_id: this.secondBlogger(id, -1).id,
        decrement_id: id
      })
    },

    /**
     * Get second Blogger who must change order
     */
    secondBlogger(id, order) {
      let blogger = this.bloggers.find((item) => item.id === id)

      let newBlogger = this.bloggers.find(
        (item) =>
          item.pivot.blogger_order === blogger.pivot.blogger_order + order
      )

      return newBlogger
    }
  }
}
</script>

<style></style>
