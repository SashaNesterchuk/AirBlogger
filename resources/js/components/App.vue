<template>
  <div id="app">
    <main-loading ref="loading" />
    <v-navbar />

    <transition name="page" mode="out-in">
      <div class="container  mx-auto mt-4">
        <router-view></router-view>
      </div>
    </transition>
  </div>
</template>

<script>
import VNavbar from '~/components/navbar/VNavbar'
import MainLoading from './loading/MainLoading'

export default {
  el: '#app',

  components: {
    MainLoading,
    VNavbar
  },

  props: {
    source: String
  },

  mounted() {
    this.$loading = this.$refs.loading
  }
}
</script>
