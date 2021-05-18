<template>
  <app-layout>
    <template #header>
      <h2 class="h4 font-weight-bold">Upload File</h2>
    </template>

    <div class="row justify-content-center">

      <div v-if="$page.props.status" class="col-12 mb-2">
        <b-alert :text="$page.props.status.message" :variant="$page.props.status.type" closable></b-alert>
      </div>

      <div class="col-12 mb-3">

        <jet-form-section>
          <template #title> Upload File </template>

          <template #description>
            Upload a file.
          </template>

          <template #form>
            <Form @submit="onSubmitS3" :validation-schema="schema">
              <div class="form-group">
                <div class="custom-file">
                  <Field class="custom-file-input" id="file_s3" name="file_s3" type="file" />
                  <label class="custom-file-label" for="file_s3">Choose file</label>
                  <ErrorMessage class="invalid-feedback d-block" name="file_s3" />
                </div>
              </div>
              <button type="submit" class="btn btn-primary mb-3" @click="save(form)">Upload Amazon S3</button>
            </Form>
            <Form @submit="onSubmitDropbox" :validation-schema="schema">
              <div class="form-group">
                <div class="custom-file">
                  <Field class="custom-file-input" id="file" name="file" type="file" />
                  <label class="custom-file-label" for="file">Choose file</label>
                  <ErrorMessage class="invalid-feedback d-block" name="file" />
                </div>
              </div>
              <button type="submit" class="btn btn-primary" @click="save(form)">Upload Dropbox</button>
            </Form>
          </template>

        </jet-form-section>

      </div>

      <div class="col-12">
        <div class="card shadow bg-light">
          <div class="card-body bg-white p-0">
            <!-- BTable -->
            <b-table :items="files.data" :fields="fields"></b-table>
            <!-- BPaginator -->
            <b-paginator :links="files.links"></b-paginator>
          </div>
        </div>
      </div>

    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from "@/Jetstream/FormSection";
import { Field, Form, ErrorMessage } from "vee-validate";
import * as Yup from "yup";
import { isValidIBANNumber } from '@/Validators/Iban'
import { isUniqueEmail } from '@/Validators/UniqueEmail'
import { Inertia } from '@inertiajs/inertia'
import BTable from "@/BootstrapComponents/Table";
import BPaginator from "@/BootstrapComponents/Paginator";
import BAlert from "@/BootstrapComponents/Alert";

export default { 
  props: {
    files: Object
  },
  setup () {
    const schema = Yup.object().shape({
      file_s3: Yup.mixed().required("A file is required"),
      file: Yup.mixed().required("A file is required"),
    });
    function onSubmitS3(values) {
      Inertia.post('/files-s3', values);
    }
    function onSubmitDropbox(values) {
      Inertia.post('/files-dropbox', values);
    }

    function save() {
    }
    return {
      schema,
      onSubmitS3,
      onSubmitDropbox,
      save
    };
  },
  data() {
    return {
      form: this.$inertia.form({
        id: null,
        file_s3: "",
        file: "",
      }),
      fields: [
        'name',
        'file_path',
        'updated_at',
      ]
    };
  },

  components: {
    AppLayout,
    JetFormSection,
    Field,
    Form,
    ErrorMessage,
    BAlert,
    BTable,
    BPaginator
  }
};
</script>
