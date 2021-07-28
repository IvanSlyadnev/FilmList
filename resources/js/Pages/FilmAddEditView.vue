<template>
  <layout>
    <div
      :class="{ isLoadingClass: isLoading }"
      class="m-3 w-3/6 ml-auto mr-auto"
    >
      <div v-if="film == undefined" class="text-2xl font-semibold mb-4">
        Добавление фильма
      </div>
      <div v-else class="text-2xl font-semibold mb-4">
        Редактирование фильма
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Название
        </label>
        <input
          class="
            focus:border-light-blue-500
            focus:ring-1 focus:ring-light-blue-500
            focus:outline-none
            w-4/5
            text-sm text-black
            placeholder-gray-500
            border border-gray-200
            rounded-md
            py-2
          "
          type="text"
          v-model="fields.name"
          @input="localErrors['name'] = null"
        />
      </div>
      <label
        v-if="localErrors['name'] != null"
        class="text-md font-medium text-red-300 m-2 ml-44 w-full"
        >{{ localErrors["name"] }}
      </label>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Описание
        </label>
        <textarea
          class="
            focus:border-light-blue-500
            focus:ring-1 focus:ring-light-blue-500
            focus:outline-none
            w-4/5
            text-sm text-black
            placeholder-gray-500
            border border-gray-200
            rounded-md
            py-2
          "
          type="text"
          v-model="fields.description"
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Обложка
        </label>
        <input
          class="
            focus:border-light-blue-500
            focus:ring-1 focus:ring-light-blue-500
            focus:outline-none
            w-4/5
            bg-white
            text-sm text-black
            placeholder-gray-500
            border border-gray-200
            rounded-md
            p-2
          "
          type="file"
          @input="fields.image = $event.target.files[0]"
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Бюджет
        </label>
        <input
          class="
            focus:border-light-blue-500
            focus:ring-1 focus:ring-light-blue-500
            focus:outline-none
            w-4/5
            text-sm text-black
            placeholder-gray-500
            border border-gray-200
            rounded-md
            py-2
          "
          type="number"
          v-model="fields.budget"
          @input="localErrors['budget'] = null"
        />
      </div>
      <label
        v-if="localErrors['budget'] != null"
        class="text-md font-medium text-red-300 m-2 ml-44 w-full"
        >{{ localErrors["budget"] }}
      </label>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Длительность
        </label>
        <input
          class="
            focus:border-light-blue-500
            focus:ring-1 focus:ring-light-blue-500
            focus:outline-none
            w-4/5
            text-sm text-black
            placeholder-gray-500
            border border-gray-200
            rounded-md
            py-2
          "
          type="number"
          v-model="fields.length"
          @input="localErrors['length'] = null"
        />
      </div>
      <label
        v-if="localErrors['length'] != null"
        class="text-md font-medium text-red-300 m-2 ml-44 w-full"
        >{{ localErrors["length"] }}
      </label>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Страна
        </label>

        <Multiselect
          id="custom-multiselect"
          class="w-4/5"
          v-model="fields.countries"
          :searchable="true"
          mode="tags"
          :options="countries"
          valueProp="id"
          label="name"
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">Жанр </label>

        <Multiselect
          id="custom-multiselect"
          class="w-4/5"
          v-model="fields.genres"
          :searchable="true"
          mode="tags"
          :options="genres"
          valueProp="id"
          label="name"
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5"
          >Год выпуска:
        </label>

        <div class="w-4/5">
          <datepicker
            id="custom-datepicker"
            style="
              padding-top: 7px;
              padding-bottom: 7px;
              border-radius: 0.375rem;
              border-color: rgba(229, 231, 235);
            "
            v-model="rowDate"
            inputFormat="yyyy"
            minimumView="year"
            @update:modelValue="localErrors['year'] = null"
          />
        </div>
      </div>
      <label
        v-if="localErrors['year'] != null"
        class="text-md font-medium text-red-300 m-2 ml-44 w-full"
        >{{ localErrors["year"] }}
      </label>
      <div class="font-semibold ml-4">
        Создатели
        <div class="ml-2 mr-2">
          <div
            v-for="(creator, key) in fields.creators"
            :key="key"
            class="flex"
          >
            <label
              class="
                text-md
                font-medium
                leading-10
                text-center text-gray-500
                m-2
                w-2/12
              "
              >{{ key + 1 }}
            </label>

            <Multiselect
              id="custom-multiselect"
              class="w-5/12"
              style="margin: 8px"
              v-model="creator.id"
              :searchable="true"
              :options="filtredCreators"
              valueProp="id"
              label="name"
            />
            <Multiselect
              id="custom-multiselect"
              class="w-5/12"
              style="margin: 8px 0 8px 8px"
              v-model="creator.roles"
              :searchable="true"
              mode="tags"
              :options="film_roles"
              valueProp="id"
              label="name"
            />
            <button style="margin: 8px" @click="deleteCreatorHandler(key)">
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
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div class="">
            <button
              @click="addCreatorHandler"
              class="
                hover:bg-gray-300
                w-full
                bg-white
                rounded-md
                text-sm
                font-medium
                px-4
                py-2
                mt-2
              "
            >
              <svg
                class="ml-auto mr-auto"
                width="12"
                height="20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="p-2 mt-4">
        <button
          @click="saveButtonHandler"
          class="bg-white w-full p-2 rounded-md text-sm font-medium"
        >
          Сохранить
        </button>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./Layout";
import Multiselect from "@vueform/multiselect";
import Datepicker from "vue3-datepicker";
import moment from "moment";
import _ from "lodash";
import Axios from "axios";
let defaultErrorsArray = {
  budget: null,
  length: null,
  name: null,
  year: null,
};

export default {
  props: ["countries", "creators", "film_roles", "genres", "film"],
  layout: Layout,
  components: {
    Multiselect,
    Datepicker,
  },
  data() {
    return {
      defaultCreator: {
        id: "",
        roles: [],
      },
      fields: {},
      rowDate: "",
      isLoading: false,
      localErrors: Object.assign({}, defaultErrorsArray),
    };
  },
  methods: {
    addCreatorHandler() {
      this.fields.creators.push(Object.assign({}, this.defaultCreator));
    },
    deleteCreatorHandler(key) {
      this.fields.creators.splice(key, 1);
    },
    saveButtonHandler() {
      this.isLoading = true;
      this.localErrors = Object.assign({}, defaultErrorsArray);
      Axios.post(route("films.store"), {
        film: this.fields,
      })
        .then((response) => {
          this.isLoading = false;
          window.location.replace(route("films.show", response.data.id));
        })
        .catch((error) => {
          Object.keys(error.response.data.errors).forEach((name) => {
            this.localErrors[name] = error.response.data.errors[name][0];
          });
          this.isLoading = false;
        });
    },
  },
  watch: {
    rowDate() {
      this.fields.year = moment(this.rowDate).format("YYYY");
    },
  },
  computed: {
    filtredCreators() {
      let computedCreators = _.cloneDeep(this.creators);
      computedCreators.map((item) => {
        if (
          this.fields.creators.filter((itemTwo) => {
            return itemTwo.id == item.id;
          }).length == 0
        ) {
          return item;
        } else {
          item["disabled"] = true;
          return item;
        }
      });
      return computedCreators;
    },
  },
  mounted() {
    if (this.film == undefined) {
      this.fields = Object.assign(
        {},
        {
          id: 0,
          name: "",
          image: "",
          year: "",
          budget: "",
          description: "",
          length: "",
          countries: [],
          creators: [],
          genres: [],
        }
      );
    } else {
      this.fields = Object.assign({}, this.film);
      this.rowDate = new Date(
        "Sat Jan 01 " +
          this.film.year +
          " 00:00:00 GMT+0300 (Москва, стандартное время)"
      );
    }
  },
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style lang="less">
#custom-multiselect {
  &.multiselect {
    border-color: rgba(229, 231, 235);
    width: 80%;
    border-radius: 0.375rem;
    .multiselect-tag {
      background: #d1d0d5;
    }
    &.is-open {
      box-shadow: 0 0 0 var(--ms-ring-width, 3px)
        var(--ms-ring-color, rgba(36, 100, 235, 0.5));
    }
  }
}
.isLoadingClass {
  opacity: 0.5;
  pointer-events: none;
}
#custom-datepicker {
  &input {
  }
}
</style>
