import AdminHome from "./components/admin/AdminHome";
import Ex from "./components/ExampleComponent";
import Index from "./components/admin/categories/Index";
import Create from "./components/admin/categories/Create";

export const routes = [
    {
        path: '/home',
        component: AdminHome
    },

    {
        path: '/products',
        component: Ex
    },

    {
        path: '/categories',
        component: Index
    },

    {
        path: '/category-create',
        component: Create
    },

]
