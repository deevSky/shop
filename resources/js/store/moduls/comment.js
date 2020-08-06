export default {
    state: {
        comment: [],
    },

    getters: {
        getComment(state) {
            return state.comment
        },
    },

    mutations: {
        comments(state,data){
            return state.comment = data;
        },
    },

    actions: {
        allComments(context){
            axios.get('/product/{product}/comment')
                .then((response) => {
                    console.log(response.data.comments)
                    context.commit('', response.data.comments)
                })
        }
    }
}
