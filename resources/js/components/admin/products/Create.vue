<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-11 m-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">New Product</h3>
                            </div>

                            <!-- form start -->
                            <form role="form" @submit.prevent="addProduct()" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputProduct">Add New Product</label>
                                        <input type="text" class="form-control" id="exampleInputProduct"
                                               placeholder="New title" name="title"
                                               v-model="form.title"
                                               :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Add New Description</label>
                                        <markdown-editor  name="description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></markdown-editor>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label for="example">Add New photo</label>
                                        <input @change="changePhoto($event)" type="file" class="form-control" id="example"
                                               placeholder="New photo" name="photo"
                                               :class="{ 'is-invalid': form.errors.has('photo') }">
                                        <img :src="form.photo" alt="" width="100px">
                                        <has-error :form="form" field="photo"></has-error>
                                    </div>


                                    <div class="form-group">
                                        <label for="aexampleInputProduct">Add New Product</label>
                                        <select class="form-control" id="aexampleInputProduct" multiple
                                                v-model="form.categories" name="categories">
                                            <option v-for="category in getAllCategory" :value="category.id">
                                                {{ category.category_name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="categories"></has-error>

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
                    title: '',
                    description: '',
                    photo: '',
                    categories: []
                })
            }

        },
        mounted() {
            this.$store.dispatch('allCategory')
        },


        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },


        methods: {
            addProduct() {
                this.form.post('/product/create')
                    .then((response) => {
                        this.$router.push('/products')

                        toast.fire({
                            icon: 'success',
                            title: 'Created successfully'
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
