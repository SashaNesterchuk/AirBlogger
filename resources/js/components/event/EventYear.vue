<template>
  <div>
    <div class="flex items-center">
      <v-button :emitFunc="'onClickPrev'" @onClickPrev="onClickPrev">
        Prev
      </v-button>
      <div class="mx-2 font-bold text-xl">{{ year }}</div>
      <v-button :emitFunc="'onClickNext'" @onClickNext="onClickNext">
        Next
      </v-button>
    </div>
  </div>
</template>

<script>
import VButton from '~/components/button/VButton'

export default {
  name: 'EventYear',

  components: {
    VButton
  },

  data() {
    return {
      currentYear: new Date().getFullYear(),
      year: new Date().getFullYear()
    }
  },

  methods: {
    onClickNext() {
      if (this.year === this.currentYear) return

      this.year++

      this.$emit('changeYear', this.year)
    },

    onClickPrev() {
      this.year--

      this.$emit('changeYear', this.year)
    }
  }
}
</script>

<style></style>
