<template>
    <div>
        <h2>This is category {{ this.$route.params.categoryId }}</h2>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 m-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>

                            <!-- form start -->
                            <form role="form" @submit.prevent="updateCategory()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">Edit Category</label>
                                        <input type="text" class="form-control" id="exampleInputCategory"
                                               placeholder="New Category" name="category_name"
                                               v-model="form.category_name"
                                               :class="{ 'is-invalid': form.errors.has('category_name') }">
                                        <has-error :form="form" field="category_name"></has-error>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Edit",

        mounted() {
            axios.get(`/category/${this.$route.params.categoryId}/edit`)
                .then((response) => {
                    this.form.fill(response.data.category)
                })
        },

        data() {
            return {
                form: new Form({
                    category_name: '',
                })
            }

        },

        methods: {
            updateCategory() {
                this.form.post(`/category/${this.$route.params.categoryId}/update`)
                    .then((response) => {
                        this.$router.push('/categories')

                        toast.fire({
                            icon: 'success',
                            title: 'Edited in successfully'
                        })
                    })
                    .catch(() => {

                    })

            }
        }
    }
</script>

<style scoped>

</style>
