<template>
  <div class="card">
    <div class="card-header bg-primary">
      <div class="row">
        <div class="col-md-4">
          <span class="float-left text-white">Users</span>
        </div>
        <div class="col-md-4">
          <input
            v-model="nameSearch"
            @input="fetchUsers"
            type="text"
            class="form-control form-control-sm"
            placeholder="Search For User By Name"
          >
        </div>
        <div class="col-md-4">
          <button class="btn btn-sm btn-default float-right">Create</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <UsersCards :users="users"/>
    </div>
  </div>
</template>

<script>
import UsersCards from "./UsersCards";

export default {
  name: "UsersCardsContainer",

  data() {
    return {
      users: [],
      nameSearch:'',
    };
  },

  created() {
    this.fetchUsers();
  },

  methods: {
    async fetchUsers() {
      let { data } = await axios.get("users",{params : {name : this.nameSearch}});

      this.users = data.data;
    }
  },

  components: {
    UsersCards
  }
};
</script>

<style scoped>
</style>