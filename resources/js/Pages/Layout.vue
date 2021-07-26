<template>
  <div class="w-100 flex flex-col h-screen">
    <header-top :user='user' class="w-full" />
    <div class="flex min-h-full">
      <navigation class="w-14" />
      <div class="w-full bg-gray-100 shadow m-1 rounded">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import HeaderTop from "./HeaderTop.vue";
import Navigation from "./Navigation.vue";
export default {
  props: ['user'],
  components: {
    HeaderTop,
    Navigation,
  },
};
</script>

<style>
</style>
