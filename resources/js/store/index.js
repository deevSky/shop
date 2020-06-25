import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import category from "./moduls/category";
import product from "./moduls/product";

export default  new Vuex.Store({
    modules: {
        category,
        product
    }
});


