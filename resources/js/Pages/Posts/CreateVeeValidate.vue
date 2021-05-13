<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Create Post VeeValidate</h2>
    </template>

    <div class="row justify-content-center">
      <div class="col-12">

        <jet-form-section>
          <template #title> Post Data </template>

          <template #description>
            Create a post and share it with the others users.
          </template>

          <template #form>
            <Form @submit="onSubmit" :validation-schema="schema">

              <div class="form-group">
                <label for="title">Post Title</label>
                <Field class="form-control" id="title" name="title" type="text" />
                <ErrorMessage class="invalid-feedback d-block" name="title" />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <Field class="form-control" id="email" name="email" type="email" />
                <ErrorMessage class="invalid-feedback d-block" name="email" />
               </div>

              <div class="form-group">
                <label for="iban">IBAN</label>
                <Field class="form-control" id="iban" name="iban" type="text" />
                <ErrorMessage class="invalid-feedback d-block" name="iban" />
              </div>

              <div class="form-group">
                <label for="text">Post Content</label>
                <Field as="textarea" class="form-control" id="text" name="text" rows="3" />
                <ErrorMessage class="invalid-feedback d-block" name="text" />
              </div>
              <a role="button" class="btn btn-light mr-2" :href="route('posts.index')" :class="{ 'text-white-50': form.processing }" :disabled="form.processing">{{ __('back') }}</a>
              <button type="submit" class="btn btn-primary" @click="save(form)">Save</button>
            </Form>
          </template>

        </jet-form-section>

        <!--<jet-form-section @submitted="createPost">
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
        </jet-form-section>-->
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

  import { Field, Form, ErrorMessage, useForm } from "vee-validate";
  import * as Yup from "yup";
  import { isValidIBANNumber } from '@/Validators/Iban'
  import { isUniqueEmail } from '@/Validators/UniqueEmail'
  import { Inertia } from '@inertiajs/inertia'



export default {
  setup () {
    const schema = Yup.object().shape({
      title: Yup.string().required().min(5).max(250).label("Post Title"),
      email: Yup.string().required().email().test('checkEmailUnique', 'Email already registered', value =>
        isUniqueEmail(value),
      ).label("Email"),
      iban: Yup.string().required().test('isValidIBANNumber', 'Value is not a valid IBAN', value =>
        isValidIBANNumber(value),
      ).label("IBAN"),
      text: Yup.string().required().min(20).max(500).label("Post Content"),
    });
    function onSubmit(values) {
      console.log(values);
      Inertia.post('/posts', values);
      useForm();
    }

    function save() {
    }
    return {
      schema,
      onSubmit,
      save,
    };
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
  /*methods: {
    createPost() {
      this.v$.$validate()
      if(!this.v$.$error){
        this.form.post(route('posts.store'), {
          errorBag: 'createPost',
          preserveScroll: true
        });
      }
    },
  },*/

  components: {
    AppLayout,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    Field,
    Form,
    ErrorMessage,
  }
};
</script>
