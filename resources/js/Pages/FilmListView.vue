<template>
  <div class="">
    <!-- <vuetable
      ref="vuetable"
      :api-mode="false"
      :data="data"
      :fields="fields"
      :css="table"
    ></vuetable> -->
  </div>
</template>

<script>
// import Vuetable from "vuetable-2/src/components/Vuetable";

export default {
  components: {
    // Vuetable,
  },
  data() {
    return {
      fields: [
        {
          name: "name",
          title:
            '<span class="orange glyphicon glyphicon-user"></span> Full Name',
          sortField: "name",
        },
        {
          name: "email",
          title: "Email",
          sortField: "email",
        },
        {
          name: "birthdate",
          title: "birthdate",
          sortField: "birthdate",
        },
      ],
      data: [
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 50,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
      ],
      table: {
        tableWrapper: "",
        tableHeaderClass: "",
        tableBodyClass: "",
        tableClass: "bg-gray-200",
        loadingClass: "",
        ascendingIcon: "",
        descendingIcon: "",
        ascendingClass: "",
        descendingClass: "",
        sortableIcon: "",
        handleIcon: "",
      },
    };
  },
};
</script>

<style>
</style>