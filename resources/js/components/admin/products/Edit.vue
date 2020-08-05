<template>
    <div>
<!--        This is product {{ this.$route.params.productId }}-->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-11 m-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- form start -->
                            <form role="form" @submit.prevent="updateProduct()" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputProduct">Edit Product</label>
                                        <input type="text"
                                               class="form-control"
                                               id="exampleInputProduct"
                                               placeholder="New title"
                                               name="title"
                                               v-model="form.title"
                                               :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <label>Edit Description</label>
                                        <textarea type="text"
                                                  class="form-control"
                                                  name="description"
                                                  v-model="form.description"
                                                  :class="{ 'is-invalid': form.errors.has('description') }">
                                        </textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="aexampleInputProduct" multiple
                                                v-model="form.categories" name="categories">
                                            <option v-for="category in getAllCategory" :value="category.id">
                                                {{ category.category_name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="categories"></has-error>
                                    </div>

                                    <!--                                    <div class="form-group">-->
                                    <!--                                        <label for="example">Add New photo</label>-->
                                    <!--                                        <input  type="file" class="form-control"-->
                                    <!--                                               id="example"-->
                                    <!--                                               placeholder="New photo" name="image"-->
                                    <!--                                               :class="{ 'is-invalid': form.errors.has('image') }">-->
                                    <!--                                        <img :src="form.image" alt="" width="100px">-->
                                    <!--                                        <has-error :form="form" field="image"></has-error>-->
                                    <!--                                    </div>-->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
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
            this.$store.dispatch('allCategories'),

            axios.get(`/product/${this.$route.params.productId}/edit`)
                .then((response) => {
                    this.form.fill(response.data.product)
                })
        },

        data() {
            return {
                form: new Form({
                    title: '',
                    description: '',
                    categories: []
                })
            }

        },

        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },

        methods: {
            updateProduct() {
                this.form.post(`/product/${this.$route.params.productId}/update`)
                    .then((response) => {
                        this.$router.push('/products')

                        toast.fire({
                            icon: 'success',
                            title: 'Edited successfully'
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
