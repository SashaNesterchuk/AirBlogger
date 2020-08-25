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
        this.changeOrder(id, 'down')
    },

    onClickUp(id) {
        this.changeOrder(id, 'up')
    },

    changeOrder(id, url) {
      let blogger = this.bloggers.find((item) => item.id === id)

      this.$store.dispatch('events/changeOder', {
        blogger_id: id,
        id: this.eventId,
        url: url
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
