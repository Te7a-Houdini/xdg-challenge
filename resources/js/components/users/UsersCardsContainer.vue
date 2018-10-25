<template>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <span class="pull-left">Users</span>
        </div>
        <div class="card-body">
            <UsersCards/>
        </div>
    </div>
</template>

<script>
import UsersCards from './UsersCards'

export default {
  name: "UsersCardsContainer",
  components : {
      UsersCards,
  }
};
</script>

<style scoped>
</style>