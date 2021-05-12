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
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('create post')}}</a>
      </div>
        
      <div class="col-12 mb-2">
        {{__('Ad voluptatem') }} {{__('Voluptas') }} {{__('Et sit ipsum') }} {{__('Ut voluptatem') }} {{__('Occaecati aut') }} {{__('Commodi laborum') }} {{__('Non') }} {{__('Qui quia unde') }} {{__('Pariatur') }} {{__('Itaque qui') }} {{__('Eveniet aut') }} {{__('Laboriosam aut') }} {{__('Sed eos') }} {{__('Molestias') }} {{__('Voluptates') }} {{__('Ut adipisci at') }} {{__('Explicabo est') }} {{__('Alias quos') }} {{__('Inventore eum') }} {{__('Natus vel culpa') }} {{__('Possimus illo') }} {{__('Illo') }} {{__('Quo officiis') }} {{__('Omnis') }} {{__('Sint enim') }} {{__('Sit quis non') }} {{__('Quia velit') }} {{__('Corrupti iure') }} {{__('Sunt dicta est') }} {{__('Quae natus') }} {{__('Beatae eos enim') }} {{__('Veritatis rem') }} {{__('Reprehenderit') }} 
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Mollitia iste')}}</a>
      </div>
      <div class="col-12 mb-2">
       {{__('Et sunt eveniet') }} {{__('Quibusdam qui') }} {{__('Dicta quis') }} {{__('Et minima') }} {{__('Quasi quaerat') }} {{__('Et et excepturi') }} {{__('Doloribus omnis') }} {{__('Excepturi quae') }} {{__('Qui omnis eos') }} {{__('Unde recusandae') }} {{__('Id architecto') }} {{__('Suscipit qui') }} {{__('Eveniet ab vel') }} {{__('Perferendis a') }} {{__('Velit assumenda') }} {{__('Quo alias') }} {{__('Id optio') }} {{__('Dolorem rem') }} {{__('Aut ea') }} {{__('Illum ullam') }} {{__('Ut veniam autem') }} {{__('A voluptatem') }} {{__('Assumenda est') }} {{__('Dicta omnis ut') }} {{__('Illo qui in sed') }} {{__('Sit voluptatum') }} {{__('Non et autem') }} {{__('Velit sed ut') }} {{__('Qui enim') }} {{__('Repellat dicta') }} {{__('Libero in et') }} {{__('Sed inventore') }} {{__('Iure nihil non') }} {{__('Ex temporibus') }} {{__('Deserunt vel at') }}
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Et consequuntur')}}</a>
      </div>
      <div class="col-12 mb-2">
        {{__('Explicabo iusto') }} {{__('Libero aut') }} {{__('Cum quia') }} {{__('Earum harum sit') }} {{__('Nobis nobis') }} {{__('Non velit') }} {{__('Fugit iste') }} {{__('Quia delectus') }} {{__('Adipisci vel') }} {{__('Nihil est') }} {{__('Laudantium eos') }} 
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Aperiam aliquid')}}</a>
      </div>
      <div class="col-12 mb-2">
       {{__('Quo veritatis') }} {{__('Sit dolor sed') }} {{__('Et rem aut') }} {{__('Nihil aliquid') }} {{__('Nemo eligendi') }} {{__('Fuga culpa') }} {{__('Hic similique') }} {{__('Beatae labore') }} {{__('Aperiam qui') }} {{__('Est enim qui ex') }} {{__('Sit delectus') }} {{__('Qui voluptates') }} {{__('Saepe omnis') }} {{__('Corporis ipsam') }} {{__('Et aut iusto') }} {{__('Ut rerum ullam') }} {{__('Quia non magnam') }} {{__('Et corporis') }} {{__('Quam eligendi') }} {{__('Cum vel rem') }} {{__('Nihil est eum') }} {{__('Sit et vero') }} {{__('Deleniti ut eum') }} {{__('Aliquid dolore') }}:
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Sit optio in')}}</a>
      </div>
      <div class="col-12 mb-2">
        {{__('Iusto') }} {{__('Doloribus quod') }} {{__('Veritatis et') }} {{__('Nobis molestiae') }}  {{__('Harum ea rerum') }} {{__('Qui fugiat') }} {{__('Numquam iusto') }}
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Enim sint ea ab')}}</a>
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Ut voluptatibus')}}</a>
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
        
        
      <div class="col-12 mb-2">
        {{__('Rerum et sit') }} {{__('Quas eaque') }} {{__('Facere nobis') }} 
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Ab et magni')}}</a>
        <a role="button" class="btn btn-primary" :href="route('posts.create')">{{__('Cum ipsum et')}}</a>
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
