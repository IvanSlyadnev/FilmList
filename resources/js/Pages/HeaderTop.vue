<template>
  <div class="flex">
    <div
      class="bg-gray-100 m-1 rounded w-14 h-14 flex items-center justify-center"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="40"
        height="40"
        viewBox="0 0 120 132"
        class="fill-current text-gray-500"
      >
        <g fill="none" fill-rule="evenodd">
          <path
            fill="#797C84"
            d="M43.667 2.408a4 4 0 0 1 .225.157l14 10.465c.699-.02 1.401-.03 2.108-.03 11.693 0 22.122 2.754 31.288 8.262l17.79-2.804a4 4 0 0 1 4.623 3.986l-.194 22.16C117.836 52.84 120 62.075 120 72.308c0 16.744-5.822 30.841-17.466 42.292C90.997 125.942 76.819 131.614 60 131.614c-16.82 0-31.024-5.699-42.615-17.096C5.795 103.121 0 89.051 0 72.307s5.795-30.815 17.385-42.212a62.348 62.348 0 0 1 7.92-6.617L38.136 3.6a4 4 0 0 1 5.53-1.192zM60 45.146c-7.978 0-14.582 2.62-19.811 7.86-5.23 5.239-7.844 11.801-7.844 19.687 0 7.886 2.588 14.476 7.763 19.77C45.39 97.646 52.022 100.24 60 100.24s14.582-2.62 19.811-7.859c5.23-5.24 7.844-11.802 7.844-19.688 0-7.886-2.615-14.448-7.844-19.688-5.229-5.24-11.833-7.859-19.811-7.859z"
          ></path>
        </g>
      </svg>
    </div>
    <div class="bg-gray-100 m-1 rounded w-full h-14 grid grid-cols-12 gap-4">
      <label
        class="
          col-start-1 col-end-3
          flex
          items-center
          justify-center
          text-2xl
          font-semibold
        "
      >
        FilmList
      </label>
      <input
        type="text"
        class="
          col-start-4 col-end-10
          border-0
          m-2
          justify-center
          bg-white
          rounded
        "
      />
      <a
        class="
          col-start-11 col-end-12
          m-2
          flex
          items-center
          justify-center
          text-gray-500
          rounded
          transition
          delay-50
          hover:bg-white
        "
        :href="route('login')"
      >
        Log in
      </a>
      <a
        class="
          col-start-12
          m-2
          flex
          items-center
          justify-center
          text-gray-500
          rounded
          transition
          delay-50
          hover:bg-white
        "
        :href="route('register')"
      >
        Sign Up
      </a>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>