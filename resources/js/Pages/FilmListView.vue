<template>
  <layout>
    <vue-table-lite
      id="film-table"
      :is-static-mode="true"
      :has-checkbox="false"
      :columns="fields"
      :rows="data"
      :sortable="sort"
      :total="24"
    />
  </layout>
</template>

<script>
import Layout from "./Layout";
import VueTableLite from "vue3-table-lite";
export default {
  components: {
    VueTableLite,
  },
  layout: Layout,
  data() {
    return {
      fields: [
        {
          isKey: true,
          label: "name",
          field: "name",
          sortable: true,
        },
        {
          isKey: false,
          label: "email",
          field: "email",
          sortable: true,
        },
        {
          isKey: false,
          label: "birthdate",
          field: "birthdate",
          sortable: true,
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
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 1,
          name: "name1",
          email: "111@xxx.xxx",
          birthdate: "2000-xx-xx",
        },
        {
          id: 2,
          name: "name2",
          email: "222@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
        {
          id: 3,
          name: "name3",
          email: "333@xxx.xxx",
          birthdate: "1900-xx-xx",
        },
      ],
      sort: {
        order: "name",
        sort: "asc",
      },
      messages: {
        pagingInfo: "",
        pageSizeChangeLabel: "",
        gotoPageLabel: "",
        noDataAvailable: "",
      },
    };
  },
};
</script>

<style>
#film-table th {
  /* background-color: rgba(243, 244, 246); */
  /* border-radius: 5px; */
  /* margin: 5px; */
}
#film-table .card-body {
  border-radius: 10px;
}
</style>
