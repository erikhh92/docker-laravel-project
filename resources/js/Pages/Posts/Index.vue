<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Posts</h2>
    </template>

    <div class="row justify-content-center">
      <div v-if="$page.props.status" class="col-12 mb-2">
        <b-alert :text="$page.props.status.message" :variant="$page.props.status.type" closable></b-alert>
      </div>
      <div class="col-12 mb-2">
        <div class="mb-2"><a role="button" class="btn btn-primary" :href="route('posts.create.veevalidate')">{{__('create post')}} Vee-validate</a></div>
        <div><a role="button" class="btn btn-primary" :href="route('posts.create.vuelidate')">{{__('create post')}} Vuelidate</a></div>
      </div>
      <div class="col-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white p-0">
            <!-- Search bar -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-bottom-left-0" id="basic-addon1">{{__('filter')}}</span>
              </div>
              <input v-model="filterText" type="text" class="form-control" aria-describedby="basic-addon1">
              <div class="input-group-append">
                <button class="btn btn-secondary rounded-bottom-right-0" @click="filterText = ''">{{__('clear')}}</button>
              </div>
            </div>
            <!-- BTable -->
            <b-table :items="posts.data" :fields="fields" :filterValue="filterText" numbered actions>
              <template #action-cell="row">
                <inertia-link class="btn btn-warning mr-2" :href="route('posts.edit', row.item.id)">{{__('edit')}}</inertia-link>
                <inertia-link class="btn btn-danger" method="delete" :href="route('posts.destroy', row.item.id)">{{__('delete')}}</inertia-link>
              </template>
            </b-table>
            <!-- BPaginator -->
            <b-paginator :links="posts.links"></b-paginator>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BTable from "@/BootstrapComponents/Table";
import BPaginator from "@/BootstrapComponents/Paginator";
import BAlert from "@/BootstrapComponents/Alert";

export default {
  props: {
    posts: Object
  },
  data() {
    return {
      fields: [
        'title',
        'author',
        'updated_at'
      ],
      filterText: ''
    }
  },
  methods: {
    deletePost(post) {
      this.$inertia.delete(route('posts.destroy', post.id), {
        preserveScroll: true,
        onSuccess: () => (
          this.posts.splice(this.posts.indexOf(post), 1)
        )
      });
    }
  },
  components: {
    AppLayout,
    BTable,
    BPaginator,
    BAlert
  }
};
</script>
