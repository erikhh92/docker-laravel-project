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
                <jet-input-error :message="form.errors.title" />
              </div>
            </div>
            <div class="w-100">
              <div class="form-group">
                <jet-label for="title" value="Email" />
                <jet-input id="title"
                  type="text"
                  v-model.trim="form.email"
                  autofocus
                  :class="{ 'is-invalid': form.errors.email }"
                />
                <jet-input-error :message="form.errors.email" />
                <div class="invalid-feedback d-block" v-if="v$.form.email.$error">{{ v$.form.email.$errors[0].$message }}</div>
              </div>
            </div>
            <div class="w-100">
              <div class="form-group">
                <jet-label for="iban" value="IBAN" />
                <jet-input id="iban"
                  type="text"
                  v-model.trim="form.iban"
                  autofocus
                  :class="{ 'is-invalid': form.errors.iban }"
                />
                <jet-input-error :message="form.errors.iban" />
                <div class="invalid-feedback d-block" v-if="v$.form.iban.$error">{{ v$.form.iban.$errors[0].$message }}</div>
              </div>
            </div>
            <div class="w-100">
              <div class="form-group">
                <jet-label for="text" value="Post Content" />
                <textarea class="form-control" id="text" rows="3" v-model="form.text" autofocus :class="{ 'is-invalid': form.errors.text }"></textarea>
                <jet-input-error :message="form.errors.text" />
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
import useVuelidate from '@vuelidate/core';
import { required, email, minLength, helpers } from '@vuelidate/validators';
import { isValidIBANNumber } from '@/Validators/Iban';
import { isUniqueEmail } from '@/Validators/UniqueEmail';

export default {
  props: {
    post: Object
  },
  setup () {
    return { v$: useVuelidate() }
  },  
  data() {
    return {
      form: this.$inertia.form({
        title: this.post.title,
        email: this.post.email,
        iban: this.post.iban,
        text: this.post.text,
      }),
    };
  },
  validations () {
    return {
      form: {
        title: { required, minLength: minLength(5) },

        email: {
          required,
          email,
          isUniqueEmail: helpers.withMessage('Email already registered', isUniqueEmail)
        },

        iban: {
          required,
          isValidIBANNumber: helpers.withMessage('Value is not a valid IBAN',isValidIBANNumber),
        },
        text: { required, minLength: minLength(20) },
      }
    }
  },
  methods: {
    updatePost() {
      this.v$.$validate()
      if(!this.v$.$error){
        this.form.put(route('posts.update', this.post.id), {
          errorBag: 'updatePost',
          preserveScroll: true
        });
      }
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
