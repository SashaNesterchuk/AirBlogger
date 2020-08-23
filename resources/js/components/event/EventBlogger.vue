<template>
  <div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" :src="blogger.avatar" alt="Sunset in the mountains" />
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2 text-dark flex items-center">
        <div class="py-1 px-2 mr-2 bg-gray-300">
          {{ blogger.pivot.blogger_order }}
        </div>
        {{ blogger.name }}
      </div>
      <p class="text-gray-700 text-base">
        {{ blogger.description }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <v-button
        v-if="blogger.pivot.blogger_order !== 1"
        data-test="btn-up"
        :emitFunc="'onClickUp'"
        @onClickUp="onClickUp"
      >
        Up
      </v-button>
      <v-button
        v-if="blogger.pivot.blogger_order !== countBloggers"
        data-test="btn-up"
        :emitFunc="'onClickDown'"
        @onClickDown="onClickDown"
      >
        Down
      </v-button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import VButton from '../button/VButton'

export default {
  name: 'EventBlogger',

  components: {
    VButton
  },

  props: {
    blogger: {
      type: Object,
      required: true
    },

    countBloggers: {
      type: Number,
      required: true
    }
  },

  computed: {
    eventId() {
      return parseInt(this.$route.params.id)
    }
  },

  methods: {
    onClickDown() {
      this.$emit('onClickDown', this.blogger.id)
    },

    onClickUp() {
      this.$emit('onClickUp', this.blogger.id)
    }
  }
}
</script>

<style></style>
