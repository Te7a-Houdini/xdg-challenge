<template>
    <div class="row">
        <UsersCardsItem/>
    </div>
</template>

<script>
import UsersCardsItem from "./UsersCardsItem";

export default {
  name: "UsersCards",

  components: {
      UsersCardsItem,
  },

  props: {
    users: {
      type: Array,
      required : true,
    }
  }
};
</script>

<style scoped>
</style>