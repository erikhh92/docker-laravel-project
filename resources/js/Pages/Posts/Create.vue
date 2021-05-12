<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Create Post</h2>
    </template>

    <div class="row justify-content-center">
      <div class="col-12">
        <jet-form-section @submitted="createPost">
          <template #title> Post Data </template>

          <template #description>
            Create a post and share it with the others users.
          </template>

          <template #form>
            <div class="w-100">
              <div class="form-group">
                <jet-label for="title" value="Post Title" />
                <jet-input id="title"
                  type="text"
                  v-model.trim="form.title"
                  autofocus
                  :class="{ 'is-invalid': form.errors.title }"
                />

                <jet-input-error :message="form.errors.title" class="alert alert-danger"/>

                <div class="invalid-feedback d-block" v-if="v$.form.title.$error">{{ v$.form.title.$errors[0].$message }}</div>
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

                <jet-input-error :message="form.errors.text" class="alert alert-danger"/>

                <div class="invalid-feedback d-block" v-if="v$.form.text.$error">{{ v$.form.text.$errors[0].$message }}</div>

              </div>
            </div>
          </template>

          <template #actions>
            <a role="button" class="btn btn-light mr-2" :href="route('posts.index')" :class="{ 'text-white-50': form.processing }" :disabled="form.processing">{{ __('back') }}</a>
            <jet-button :class="{ 'text-white-50': form.processing }" :disabled="form.processing">Save</jet-button>
          </template>
        </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import BInput from '@/BootstrapComponents/Input';
import useVuelidate from '@vuelidate/core';
import { required, email, minLength, helpers } from '@vuelidate/validators';
import { isValidIBANNumber } from '@/Validators/Iban';
import { isUniqueEmail } from '@/Validators/UniqueEmail';

export default {
  setup () {
    return { v$: useVuelidate() }
  },
  data() {
    return {
      form: this.$inertia.form({
        id: null,
        title: "",
        email: "",
        iban: "",
        text: "",
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
    createPost() {
      this.v$.$validate()
      if(!this.v$.$error){
        this.form.post(route('posts.store'), {
          errorBag: 'createPost',
          preserveScroll: true
        });
      }
    },
  },

  components: {
    AppLayout,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel
  }
};
</script>
