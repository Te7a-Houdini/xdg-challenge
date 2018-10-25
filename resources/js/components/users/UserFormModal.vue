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
                                :class="{'is-invalid' : errors.name}"
                                id="name"
                                aria-describedby="emailHelp"
                                placeholder="Enter Name"
                                v-model="form.name"
                            >
                            <FormError v-for="error in errors.name" :key="error" :error="error"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-Mail Address</label>
                            <input
                                type="email"
                                class="form-control"
                                :class="{'is-invalid' : errors.email}"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter Email"
                                v-model="form.email"
                            >
                            <FormError v-for="error in errors.email" :key="error" :error="error"/>
                        </div>
                        <template v-if="inCreateMode">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    :class="{'is-invalid' : errors.password}"
                                    id="exampleInputPassword1"
                                    placeholder="Password"
                                    v-model="form.password"
                                >
                                <FormError
                                    v-for="error in errors.password"
                                    :key="error"
                                    :error="error"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Password Confirmation</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    :class="{'is-invalid' : errors.password_confirmation}"
                                    id="exampleInputPassword2"
                                    placeholder="Password"
                                    v-model="form.password_confirmation"
                                >
                                <FormError
                                    v-for="error in errors.password_confirmation"
                                    :error="error"
                                    :key="error"
                                />
                            </div>
                        </template>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button
                        @click.prevent="submit"
                        type="button"
                        class="btn btn-primary"
                    >{{submitButtonTitle}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormError from "../FormError";

export default {
  name: "UserFormModal",

  data() {
    return {
      inCreateMode: true,
      errors: {},

      form: {
        id: null,
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
      return this.inCreateMode ? "Create" : "Save";
    }
  },

  created() {
    this.$eventBus.$on("UsersCardsContainer__createUserClicked", () => {
      this.inCreateMode = true;
      this.resetForm();
      this.resetErrors();

      $(this.$el).modal("show");
    });

    this.$eventBus.$on("UsersCardsItem__editUserClicked", ({ user }) => {
      this.inCreateMode = false;
      this.resetForm();
      this.resetErrors();

      this.form.name = user.name;
      this.form.email = user.email;
      this.form.id = user.id;

      $(this.$el).modal("show");
    });
  },

  methods: {
    resetForm() {
      this.form = {
        id: null,
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      };
    },

    async submit() {
      const url = this.inCreateMode ? "users" : `users/${this.form.id}`;
      const method = this.inCreateMode ? "post" : "put";

      try {
        let { data } = await axios[method](url, {
          name: this.form.name,
          email: this.form.email,
          password: this.form.password,
          password_confirmation: this.form.password_confirmation
        });
      } catch (error) {
        if (error.response.status === 422) {
          this.showFormValidationErrors(error.response.data.errors);
        }
      }
    },

    showFormValidationErrors(errors) {
      this.resetErrors();
      Object.keys(errors).forEach(errorKey =>
        this.$set(this.errors, errorKey, errors[errorKey])
      );
    },

    resetErrors() {
      this.errors = {};
    }
  },

  components: {
    FormError
  }
};
</script>

<style scoped>
</style>