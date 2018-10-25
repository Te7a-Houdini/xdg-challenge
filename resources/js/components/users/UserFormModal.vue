<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="userFormModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="userFormModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userFormModalLabel">{{title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                aria-describedby="emailHelp"
                                placeholder="Enter Name"
                                v-model="form.name"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-Mail Address</label>
                            <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter Email"
                                v-model="form.email"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input
                                type="password"
                                class="form-control is-invalid"
                                id="exampleInputPassword1"
                                placeholder="Password"
                                v-model="form.password"
                            >
                            <span class="invalid-feedback" role="alert">
                                <strong>errors are here</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Password Confirmation</label>
                            <input
                                type="password"
                                class="form-control is-invalid"
                                id="exampleInputPassword2"
                                placeholder="Password"
                                v-model="form.password_confirmation"
                            >
                            <span class="invalid-feedback" role="alert">
                                <strong>errors are here</strong>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">{{submitButtonTitle}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "UserFormModal",

  data() {
    return {
      inCreateMode: true,

      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      }
    };
  },

  computed: {
    title() {
      return this.inCreateMode ? "Create User" : "Edit User";
    },

    submitButtonTitle() {
      return this.inCreateMode ? "Create" : "Edit";
    }
  },

  created() {
    this.$eventBus.$on("UsersCardsItem__editUserClicked", ({ user }) => {
      console.log(user);
    });
  }
};
</script>

<style scoped>
</style>