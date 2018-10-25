<template>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5> {{user.name}}</h5>
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
                <a href="#" class="card-link">
                    <i class="fa fa-lg fa-edit text-default"></i>
                </a>
                <a href="#" class="card-link float-right">
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
  }
};
</script>

<style scoped>
</style>