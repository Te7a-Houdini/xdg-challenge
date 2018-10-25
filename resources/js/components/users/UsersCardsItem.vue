<template>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>{{user.name}}</h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        <h6>Email : {{user.email}}</h6>
                    </li>
                    <li>
                        <h6>Name : {{user.name}}</h6>
                    </li>
                    <li>
                        <h6>Created : {{user.created_at}}</h6>
                    </li>
                </ul>
                <a
                    href="#"
                    class="card-link"
                    @click.prevent="$eventBus.$emit('UsersCardsItem__editUserClicked',{user})"
                >
                    <i class="fa fa-lg fa-edit text-default"></i>
                </a>
                <a @click.prevent="deleteUser" href="#" class="card-link float-right">
                    <i class="fa fa-lg fa-trash text-danger"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "UsersCardsItem",

  props: {
    user: {
      type: Object,
      required: true
    }
  },

  methods: {
    deleteUser() {
      if (confirm(`Are You Sure Want To Delete ${this.user.name} ?`)) {
        this.$eventBus.$emit("UsersCardsItem__deleteUserConfirmed", {
          user: this.user
        });
      }
    }
  }
};
</script>

<style scoped>
</style>