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
          <button
            @click.prevent="$eventBus.$emit('UsersCardsContainer__createUserClicked')"
            class="btn btn-sm btn-default float-right"
          >Create</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <UsersCards :users="users"/>
    </div>
    <UserFormModal/>
  </div>
</template>

<script>
import UsersCards from "./UsersCards";
import UserFormModal from "./UserFormModal";

export default {
  name: "UsersCardsContainer",

  data() {
    return {
      users: [],
      nameSearch: ""
    };
  },

  created() {
    this.fetchUsers();

    this.$eventBus.$on("UserFormModal__formSubmitted", () => {
      this.nameSearch = "";
      this.fetchUsers();
    });

    this.$eventBus.$on("UsersCardsItem__deleteUserConfirmed", ({ user }) => {
      this.deleteUser(user.id)
        .then(() => this.fetchUsers())
        .catch(({ response }) => alert(response.data.errors.message));
    });
  },

  methods: {
    async fetchUsers() {
      let { data } = await axios.get("users", {
        params: { name: this.nameSearch }
      });

      this.users = data.data;
    },

    deleteUser(id) {
      return axios.delete(`users/${id}`);
    }
  },

  components: {
    UsersCards,
    UserFormModal
  }
};
</script>

<style scoped>
</style>