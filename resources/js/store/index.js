export default {
    name: 'storeData',

    state: {
        category: []
    },

    getters: {
        getCategory(state) {
            return state.category
        }
    },

    mutations: {
        categories(state,data){
            return state.category = data;
        }
    },

    actions: {
        allCategory(context) {
            axios.get('/category')
                .then((response) => {
                    console.log(response.data.categories)
                    context.commit('categories', response.data.categories)
                })
        }
    }


}
