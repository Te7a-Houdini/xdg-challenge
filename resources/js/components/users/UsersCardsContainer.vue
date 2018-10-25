<template>
    <div class="card">
        <div class="card-header bg-primary">
            <span class="float-left text-white">Users</span>
            <button class="btn btn-sm btn-default float-right">Create</button>
        </div>
        <div class="card-body">
            <UsersCards :users="[]"/>
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