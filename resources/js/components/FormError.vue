<template>
    <span class="invalid-feedback" role="alert">
        <strong>{{error}}</strong>
    </span>
</template>

<script>
export default {
  name: "FormError",
  props: {
    error: {
      type: String,
      required: true
    }
  }
};
</script>
