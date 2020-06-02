<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 m-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">New Category</h3>
                            </div>

                            <!-- form start -->
                            <form role="form" @submit.prevent="addCategory()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputCategory">Add New Category</label>
                                        <input type="text" class="form-control" id="exampleInputCategory"
                                               placeholder="New Category" name="category_name"
                                               v-model="form.category_name"
                                               :class="{ 'is-invalid': form.errors.has('category_name') }">
                                        <has-error :form="form" field="category_name"></has-error>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
        name: "Create",

        data() {
            return {
                form: new Form({
                    category_name: '',
                })
            }

        },

        methods: {
            addCategory() {
                this.form.post('/create')
                    .then((response) => {
                        this.$router.push('/categories')

                        toast.fire({
                            icon: 'success',
                            title: 'Created in successfully'
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
