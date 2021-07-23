<template>
  <layout>
    <div class="mt-4 mx-6 grid grid-cols-12 gap-4">
      <div class="col-start-1 col-end-10 text-2xl font-semibold mb-4">
        Список фильмов
      </div>
      <a
        class="
          col-start-11 col-span-2
          p-2
          flex
          bg-white
          border border-white
          items-center
          justify-center
          text-gray-500
          rounded
          transition
          delay-50
          hover:border-gray-200
        "
        :href="route('films.create')"
        >Добавить фильм</a
      >
    </div>
    <div class="px-4 bg-gray-100">
      <vue-table-lite
        style="background-color: inherit"
        id="film-table"
        :is-static-mode="true"
        :has-checkbox="false"
        :columns="fields"
        :rows="films"
        :sortable="sort"
        :total="totalCount"
      />
    </div>
  </layout>
</template>

<script>
import Layout from "./Layout";
import VueTableLite from "vue3-table-lite";
export default {
  props: ["films"],
  components: {
    VueTableLite,
  },
  layout: Layout,
  data() {
    return {
      fields: [
        {
          isKey: true,
          label: "ID",
          field: "id",
          sortable: true,
        },
        {
          isKey: false,
          label: "Название",
          field: "name",
          sortable: true,
        },
        {
          isKey: false,
          label: "Рейтниг",
          field: "rate",
          sortable: true,
        },
        {
          isKey: false,
          label: "Просмотры",
          field: "views",
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
  computed: {
    totalCount() {
      return this.films.length;
    },
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
