<template>
  <button
    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4"
    @click="emit"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: 'VButton',

  props: {
    emitFunc: {
      type: String,
      required: true
    }
  },

  methods: {
    emit() {
      this.$emit(this.emitFunc)
    }
  }
}
</script>

<style></style>
