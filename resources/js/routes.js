import AdminHome from "./components/admin/AdminHome";

//category
import Index from "./components/admin/categories/Index";
import Create from "./components/admin/categories/Create";
import EditCategory from "./components/admin/categories/Edit";

//products
import productsIndex from "./components/admin/products/Index";
import productCreate from "./components/admin/products/Create";
import productEdit from "./components/admin/products/Edit";


//public components
import PublicHome from "./components/public/PublicHome";
import products from "./components/public/products/Products";
import comments from "./components/public/Comments";




export const routes = [
    {
        path: '/home',
        component: AdminHome
    },

    //categories
    {
        path: '/categories',
        component: Index
    },

    {
        path: '/category-create',
        component: Create
    },

    {
        path: '/category-edit/:categoryId',
        component: EditCategory
    },

    //products
    {
        path: '/products',
        component: productsIndex
    },

    {
        path: '/product-create',
        component: productCreate
    },

    {
        path: '/product-edit/:productId',
        component: productEdit
    },


    //public views
    {
        path: '/',
        component: PublicHome
    },

    {
        path: '/all-products',
        component: products
    },
    {
        path: '/comments',
        component: comments
    },
];
