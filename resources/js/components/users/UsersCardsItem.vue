<template>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h4>First User</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        <h5>Email : test@example.com</h5>
                    </li>
                    <li>
                        <h5>Name : Ahmed</h5>
                    </li>
                    <li>
                        <h5>Created At : 2018-09-10</h5>
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
  name: "UsersCardsItem"
};
</script>

<style scoped>
</style>