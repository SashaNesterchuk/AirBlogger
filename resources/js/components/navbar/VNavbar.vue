<template>
  <header class="bg-gray-300 border-b-2 border-dark">
    <nav class="container mx-auto flex justify-between flex-wrap">
      <div class="py-8 mr-12">
        <router-link
          :to="{ name: 'event.years' }"
          tag="img"
          src="/img/logo.png"
          class="h-8 cursor-pointer"
          alt="logo"
        >
        </router-link>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'VNavbar'
}
</script>

<style></style>
