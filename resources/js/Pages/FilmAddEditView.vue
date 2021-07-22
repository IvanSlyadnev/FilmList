<template>
  <layout>
    <div class="m-3 w-3/6 ml-auto mr-auto">
      <div class="text-2xl font-semibold mb-4">Добавление фильма</div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">name </label>
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
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">name </label>
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
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">name </label>

        <Multiselect
          id="custom-multiselect"
          class="w-4/5"
          v-model="value"
          :searchable="true"
          mode="tags"
          :options="options"
        />
      </div>
      <div class="m-2 flex">
        <label class="text-md font-medium text-gray-500 m-2 w-1/5">name </label>

        <datepicker v-model="fields.year" :locale="date - fns / locale / ru" />
      </div>
      <div class="font-semibold ml-4">
        Создатели

        <div class="ml-2 mr-2">
          <div class="flex">
            <label
              class="
                text-md
                font-medium
                leading-10
                text-center text-gray-500
                m-2
                w-2/12
              "
              >1
            </label>

            <Multiselect
              id="custom-multiselect"
              class="w-5/12"
              style="margin: 8px"
              v-model="value"
              :searchable="true"
              mode="tags"
              :options="options"
            />
            <Multiselect
              id="custom-multiselect"
              class="w-5/12"
              style="margin: 8px 0 8px 8px"
              v-model="value"
              :searchable="true"
              mode="tags"
              :options="options"
            />
          </div>
          <div class="">
            <button
              class="
                hover:bg-gray-300
                hover:text-light-blue-800
                flex
                w-full
                items-center
                bg-white
                rounded-md
                text-sm
                font-medium
                px-4
                py-2
              "
            >
              <svg
                class="group-hover:text-light-blue-600 text-light-blue-500 mr-2"
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
              Добавить создателя
            </button>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "./Layout";
import Multiselect from "@vueform/multiselect";
import Datepicker from "vue3-datepicker";
export default {
  layout: Layout,
  components: {
    Multiselect,
    Datepicker,
  },
  data() {
    return {
      fields: {
        id: "new",
        name: "",
        year: "",
        budget: "",
        description: "",
        length: "",
        counties: [],
        rate: 0,
        creators: [],
      },
      value: null,
      options: ["Batman", "Robin", "Joker"],
    };
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
        var(--ms-ring-color, rgba(190, 190, 190, 0.188));
    }
  }
}
</style>