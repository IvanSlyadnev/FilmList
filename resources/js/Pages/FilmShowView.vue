<template>
  <layout>
    <div class="m-3 w-3/6 ml-auto mr-auto">
      <div class="flex justify-between">
        <div class="text-2xl font-semibold mb-4">Описание фильма</div>
        <div class="flex">
          <a
            v-if="can_edit"
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
            :href="'/films/' + film.id + '/edit/'"
            >Редактировать фильм</a
          >
          <button
            v-if="can_edit"
            style="min-width: 185px"
            class="
              ml-2
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
            @click="deleteHandler"
          >
            Удалить фильм
          </button>
        </div>
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Название
        </label>
        <label
          class="w-4/5 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ film.name }}</label
        >
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Описание
        </label>
        <label
          class="w-4/5 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ film.description }}</label
        >
      </div>
      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Бюджет
        </label>
        <label
          class="w-4/5 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ film.budget }}</label
        >
      </div>

      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Длительность
        </label>
        <label
          class="w-4/5 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ film.length }}</label
        >
      </div>

      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">
          Год выпуска
        </label>
        <label
          class="w-4/5 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ film.year }}</label
        >
      </div>

      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">
          Жанры:
        </label>
        <div v-for="(genre, genreKey) in genres" :key="genreKey" class="py-2">
          <label
            class="
              mr-2
              text-sm text-black
              border border-gray-200
              rounded-md
              p-2
            "
            >{{ genre.name }}</label
          >
        </div>
      </div>

      <div
        v-for="(creatorType, typeKey) in creators"
        :key="typeKey"
        class="m-2 flex rounded"
      >
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">
          {{ creatorType.name }}
        </label>
        <div
          v-for="(creatorName, nameKey) in creatorType.creators"
          :key="nameKey"
          class="py-2"
        >
          <label
            class="
              mr-2
              text-sm text-black
              border border-gray-200
              rounded-md
              p-2
            "
            >{{ creatorName }}</label
          >
        </div>
      </div>

      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-xl font-semibold m-2 w-1/5">
          Комментарии:
        </label>
      </div>

      <div
        v-for="(comment, commentKey) in comments"
        :key="commentKey"
        class="m-2 flex rounded"
      >
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">
          {{ comment.user }}
        </label>
        <label
          class="mr-2 text-sm text-black border border-gray-200 rounded-md p-2"
          >{{ comment.name }}</label
        >
      </div>

      <div class="m-2 flex rounded">
        <label class="text-md font-medium text-xl font-semibold m-2 w-full">
          Оставить комментарий
        </label>
      </div>
      <div class="m-2 flex flex-wrap">
        <textarea
          v-model="commentValue"
          type="text"
          class="
            w-full
            text-sm text-black
            border border-gray-200
            rounded-md
            py-2
          "
        />
        <button
          @click="addCommentButton"
          class="mr-0 ml-auto bg-white m-2 rounded py-2 px-4"
        >
          Отправить
        </button>
      </div>
    </div>
  </layout>
</template>



<script>
import Layout from "./Layout";
import Axios from "axios";

export default {
  props: ["film", "comments", "creators", "genres", "can_edit"],
  layout: Layout,
  data() {
    return {
      inputComments: [],
      commentValue: "",
    };
  },
  methods: {
    addCommentButton() {
      Axios.post(route("comment.store", this.film.id), {
        comment: { name: this.commentValue },
      })
        .then((response) => {
          console.log("успешно");
        })
        .catch((error) => {
          alert("Произошла ошибка, попробуйте позже");
        });
    },
    deleteHandler() {
      Axios.delete(route("films.destroy", this.film.id));
    },
  },
  mounted() {
    this.inputComments = [...this.comments];
  },
};
</script>

<style>
</style>