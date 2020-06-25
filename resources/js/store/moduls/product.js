export default {
    state: {
        product: []
    },

    getters: {
        getProduct(state) {
            return state.product
        }
    },

    mutations: {
        products(state,data){
            return state.product = data;
        }
    },

    actions: {
              allProducts(context){
            axios.get('/product')
                .then((response) => {
                    console.log(response.data.products)
                    context.commit('products', response.data.products)
                })
        }
    }
}
