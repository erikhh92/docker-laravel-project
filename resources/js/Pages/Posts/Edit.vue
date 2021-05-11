<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Edit Post</h2>
    </template>

    <div class="row justify-content-center">
      <div class="col-12">
        <jet-form-section @submitted="updatePost">
          <template #title> Post Data </template>

          <template #description>
            Edit a existing post.
          </template>

          <template #form>
            <div class="w-100">
              <div class="form-group">
                <jet-label for="title" value="Post Title" />
                <jet-input
                  id="title"
                  type="text"
                  v-model="form.title"
                  autofocus
                  :class="{ 'is-invalid': form.errors.title }"
                />
                <jet-input-error :message="form.errors.title" class="alert alert-danger"/>
              </div>
            </div>

            <div class="w-100">
              <div class="form-group">
                <jet-label for="text" value="Post Content" />
                <textarea class="form-control" id="text" rows="3" v-model="form.text" autofocus :class="{ 'is-invalid': form.errors.text }"></textarea>
                <jet-input-error :message="form.errors.text" class="alert alert-danger" />
              </div>
            </div>
          </template>

          <template #actions>
            <a role="button" class="btn btn-light mr-2" :href="route('posts.index')" :class="{ 'text-white-50': form.processing }" :disabled="form.processing">BACK</a>
            <jet-button
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
            >
              Save
            </jet-button>
          </template>
        </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";

export default {
  props: {
    post: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        title: this.post.title,
        text: this.post.text,
      }),
    };
  },

  methods: {
    updatePost() {
      this.form.put(route('posts.update', this.post.id), {
        errorBag: 'updatePost',
        preserveScroll: true
      });
    },
  },

  components: {
    AppLayout,
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
  },
};
</script>
