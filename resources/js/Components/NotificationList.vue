<template>
  <li class="nav-item dropdown">
    <a class="nav-link" role="button" data-toggle="dropdown" aria-expanded="false">
      <span>Notifications
        <span class="badge badge-light" v-if="notifications.length">{{ notifications.length }}</span>
        <span class="sr-only">unread messages</span>
        <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </span>
    </a>

    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="notificationList">
        <a class="dropdown-item px-4" v-for="notification in notifications" v-bind:key="notification" href="#">{{ notification.message }}</a>
    </div>
  </li>
</template>

<script>

export default {
  data() {
    return {
      notifications: []
    }
  },
  computed: {

  },
  mounted() {
    Echo.channel('main-channel').listen('.NewNotification', data => {
      this.notifications.push(data)
      console.log("new notification")
    })
  }
};
</script>