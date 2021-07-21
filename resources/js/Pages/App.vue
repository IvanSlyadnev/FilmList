<template>
  <div class="w-100 flex flex-col h-screen">
    <header-top class="w-full" />
    <div class="flex h-full">
      <navigation class="w-14" />
      <FilmListView class="w-full bg-gray-100 m-1 rounded" />
    </div>
  </div>
</template>

<script>
import HeaderTop from "./HeaderTop.vue";
import Navigation from "./Navigation.vue";
import FilmListView from "./FilmListView.vue";
export default {
  components: {
    HeaderTop,
    Navigation,
    FilmListView,
  },
};
</script>

<style>
</style>