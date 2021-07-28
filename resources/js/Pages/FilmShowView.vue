<template>
  <layout>
    <div
      :class="{ isLoadingClass: isLoading }"
      class="m-3 w-3/6 ml-auto mr-auto"
    >
      <div class="flex justify-between mb-4">
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
            :href="route('films.edit', film.id)"
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
      <div class="flex flex-wrap">
        <div class="w-2/6">
          <img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/488px-No-Image-Placeholder.svg.png"
            alt=""
          />
          <star-rating
            @update:rating="setRatingHandler"
            v-model:rating="rate"
            class="mt-2"
            :star-size="40"
            :increment="0.5"
          ></star-rating>
        </div>

        <div class="pl-2 w-4/6">
          <div class="m-2 flex">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5"
              >Название
            </label>
            <label
              class="
                w-4/5
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
              "
              >{{ film.name }}</label
            >
          </div>
          <div class="m-2 flex">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5"
              >Описание
            </label>
            <label
              class="
                w-4/5
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
              "
              >{{ film.description }}</label
            >
          </div>
          <div class="m-2 flex rounded">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5"
              >Бюджет
            </label>
            <label
              class="
                w-4/5
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
              "
              >{{ film.budget }}</label
            >
          </div>

          <div class="m-2 flex rounded">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5"
              >Время
            </label>
            <label
              class="
                w-4/5
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
              "
              >{{ film.length }}</label
            >
          </div>

          <div class="m-2 flex rounded">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5">
              Год выпуска
            </label>
            <label
              class="
                w-4/5
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
              "
              >{{ film.year }}</label
            >
          </div>

          <div class="m-2 flex rounded">
            <label class="text-md font-medium text-gray-500 m-2 w-1/5">
              Жанры:
            </label>
            <div
              v-for="(genre, genreKey) in genres"
              :key="genreKey"
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
        </div>
        <div class="w-full">
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
            <label class="text-md font-medium text-gray-500 m-2 w-3/12">
              {{ comment.user }}
            </label>
            <label
              class="
                mr-2
                text-sm text-black
                border border-gray-200
                rounded-md
                p-2
                w-8/12
              "
              :class="{ 'w-8/12': is_admin, 'w-9/12': !is_admin }"
              >{{ comment.name }}</label
            >
            <button
              class="text-md font-medium text-gray-500 flex items-center"
              @click="deleteCommentHandler(comment.id)"
              v-if="is_admin"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </button>
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
              :placeholder="
                user != null ? '' : 'авторизуйтесь, чтобы оставлять комментарии'
              "
              :class="{ isLoadingClass: user == null }"
              class="
                w-full
                text-sm text-black
                border border-gray-200
                rounded-md
                py-2
              "
            />
            <button
              :class="{ isLoadingClass: commentValue.length == 0 }"
              @click="addCommentButton"
              class="mr-0 ml-auto bg-white m-2 rounded py-2 px-4"
            >
              Отправить
            </button>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>



<script>
import Layout from "./Layout";
import Axios from "axios";
import StarRating from "vue-star-rating";

export default {
  props: [
    "film",
    "comments",
    "creators",
    "genres",
    "can_edit",
    "is_admin",
    "mark",
    "user",
  ],
  layout: Layout,
  components: {
    StarRating,
  },
  data() {
    return {
      inputComments: [],
      commentValue: "",
      isLoading: false,
      rate: 0,
    };
  },
  methods: {
    addCommentButton() {
      this.isLoading = true;

      Axios.post(route("comment.store", this.film.id), {
        comment: { name: this.commentValue },
      })
        .then((response) => {
          this.isLoading = false;
          window.location.reload();
        })
        .catch((error) => {
          this.isLoading = false;
          alert("Произошла ошибка, попробуйте позже");
        });
    },
    deleteHandler() {
      this.isLoading = true;
      if (confirm("Вы уверены?")) {
        Axios.delete(route("films.destroy", this.film.id))
          .then(() => {
            this.isLoading = false;
            window.location.replace("/");
          })
          .catch(() => {
            this.isLoading = false;
            alert("Удаление не удалось");
          });
      }
    },
    deleteCommentHandler(commentID) {
      this.isLoading = true;
      Axios.delete(
        route("comment.destroy", { film: this.film.id, comment: commentID })
      )
        .then(() => {
          this.isLoading = false;
          window.location.reload();
        })
        .catch(() => {
          alert("Произошла ошибка, либо вы не авторизованы");
        });
    },
    setRatingHandler(rating) {
      if (this.user != null) {
        Axios.post(route("film.mark", this.film.id), {
          mark: rating,
        });
      } else {
        alert("Авторизируйтесь, чтобы оставлять оценки");
        setTimeout(() => {
          this.rate = 0;
        }, 100);
      }
    },
  },
  mounted() {
    this.inputComments = [...this.comments];
    this.rate = this.mark;
  },
};
</script>

<style>
.isLoadingClass {
  opacity: 0.5;
  pointer-events: none;
}
</style>