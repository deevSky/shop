<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products</h3>

                                <div class="card-tools">
                                    <router-link class="btn btn-primary btn-sm" to="/product-create"
                                                 style="color: white">Add new product
                                    </router-link>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>List</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(product, index) in getAllProducts" :key="product.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ product.title }}</td>
                                        <td v-if="product.description.length >= 10">{{ product.description |
                                            limitLength(10, '...')}}
                                        </td>
                                        <td v-else>{{ product.description }}</td>
                                        <td>

                                            <img :src="`../assets/admin/default/${product.photo}`" alt="" width="75px">
                                        </td>
                                        <td>
                                            <ul v-for="n in product.category.length" :key="n">
                                                <li> {{product.category[n -1].category_name }}</li>
                                            </ul>

                                        </td>
                                        <td>
                                            <a href="" @click.prevent="deleteProduct(product.id)">Delete</a>
                                            <router-link :to="`/product-edit/${product.id}`">Edit</router-link>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "Index",

        mounted() {
            this.$store.dispatch('allProducts')
        },

        computed: {
            getAllProducts() {
                return this.$store.getters.getProduct
            }
        },

        methods: {
            ourImage(img) {
return "uploadImage" + img;
            },

            deleteProduct(id) {
                axios.get('product/' + id + '/delete')
                    .then(() => {
                        this.$store.dispatch('allProducts')
                        toast.fire({
                            icon: 'success',
                            title: 'Deleted successfully'
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>
