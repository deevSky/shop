export default {
    state: {
        category: [],
    },

    getters: {
        getCategory(state) {
            return state.category
        },
    },

    mutations: {
        categories(state,data){
            return state.category = data;
        },
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
