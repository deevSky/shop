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
        allCategories(context){
            axios.get('/category')
                .then((response) => {
                    console.log(response.data.categories)
                    context.commit('categories', response.data.categories)
                })
        }
    }
}
