<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 m-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>

                                <div class="card-tools">
                                    <router-link class="btn btn-primary btn-sm" to="/category-create"
                                                 style="color: white">Add new category
                                    </router-link>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>List</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ category.category_name }}</td>
                                        <td>{{ category.created_at | timeformat }}</td>
                                        <td>
                                            <router-link :to="`/category-edit/${category.id}`">Edit</router-link>
                                            <a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
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
            this.$store.dispatch('allCategory')
        },

        computed: {
            getAllCategory() {
                 return this.$store.getters.getCategory
            }
        },

        methods: {
            deleteCategory(id){
                axios.get('category/' + id + '/delete' )
                    .then(() => {
                        this.$store.dispatch('allCategory')
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

