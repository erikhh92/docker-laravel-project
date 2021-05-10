<template>
  <input
    :type="type"
    class="form-control"
    :class="{ 'is-invalid': invalid.$error }"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
  />
  <div class="invalid-feedback" v-if="invalid.$error">
    <p v-for="(error, index) of invalid.$errors" :key="index">
      <strong>{{ error.$message }}</strong>
    </p>
  </div>
</template>

<script>
export default {
  props: {
    modelValue: null,
    type: String,
    invalid: Object,
  },
};
</script>