<template>
  <li class="nav-item dropdown">
    <a
      id="languagePicker"
      class="nav-link"
      role="button"
      data-toggle="dropdown"
      aria-expanded="false"
    >
      <span>
        {{ __(currentLocaleLabel) }}
        <svg
          class="ml-2"
          width="18"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </span>
    </a>

    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="languagePicker">
        <h6 class="dropdown-header small text-muted">{{__('change language')}}</h6>
        <a class="dropdown-item px-4" :class="{'disabled': locale == currentLocale}" v-for="(label, locale) in availableLocales" v-bind:key="locale" :href="route('language', locale)">{{ __(label) }}</a>
    </div>
  </li>
</template>

<script>
import JetDropdownLink from '@/Jetstream/DropdownLink'

export default {
  computed: {
    currentLocale() {
        return this.$page.props.locale
    },
    currentLocaleLabel() {
        return this.availableLocales[this.currentLocale]
    },
    availableLocales() {
        return this.$page.props.availableLocales
    }
  },
  components: {
      JetDropdownLink
  }
};
</script>