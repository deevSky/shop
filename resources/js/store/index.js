export default {
    name: 'storeData',

    state: {
        category: [],
        product: []
    },

    getters: {
        getCategory(state) {
            return state.category
        },

        getProduct(state) {
            return state.product
        }
    },

    mutations: {
        categories(state,data){
            return state.category = data;
        },

        products(state,data){
            return state.product = data;
        }
    },

    actions: {
        allCategory(context) {
            axios.get('/category')
                .then((response) => {
                    console.log(response.data.categories)
                    context.commit('categories', response.data.categories)
                })
        },

        allProducts(context){
            axios.get('/product')
                .then((response) => {
                    console.log(response.data.products)
                    context.commit('products', response.data.products)
                })
        }
    }


}
