// ADMIN ROUTES









// END ADMIN ROUTES
















import Home from "./components/Home";
import Test from "./components/Test";
import FourOFour from "./components/layouts/404";
import Categories from "./components/layouts/Categories";
import Login from "./components/layouts/Login";
import Register from "./components/layouts/Register";
import Logout from "./components/layouts/Logout";
import Cart from "./components/layouts/Cart";
import Checkout from "./components/layouts/Checkout";
import ShowProduct from "./components/layouts/ShowProduct";
import FeaturedProductsAll from "./components/pages/FeaturedProductsAll";
import LatestProductsAll from "./components/layouts/LatestProductAll";
import TopSellingProductsAll from "./components/layouts/TopSellingProductsAll";


import Search from "./components/Search";


const routes = [
    {path: '/', component: Home, name: 'home'},
    {path: '/test', component: Test, name: 'test'},
    {path: '/categories', component: Categories, name: 'categories'},
    {path: '/register', component: Register, name: 'register',

        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('token') === null) {
             next();

            } else next({name: 'home'});
        },
    },
    {path: '/login', component: Login, name: 'login',

        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('token') === null) next();
            else next({name: 'home'});
        },

    },
    {path: '/logout', component: Logout, name: 'logout',
        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('token') !== null) next();
            else next({name: 'home'});
        },

    },
    {path: '/cart', component: Cart, name: 'cart',
        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('token') === null) {
                sessionStorage.setItem('redirectURL', '/cart');
                next({name: 'login'});
            }
            else next();
        },},
    {path: '/checkout', component: Checkout, name: 'checkout'},
    {path: '/featured-products', component: FeaturedProductsAll, name: 'featured.products.all'},
    {path: '/latest-products', component: LatestProductsAll, name: 'latest.products.all'},
    {path: '/top-selling-products', component: TopSellingProductsAll, name: 'top.selling.products.all'},
    {path: '/products/:slug', component: ShowProduct, name: 'show.product',},

    {path: '/search/:query', component: Search, name: 'search'},

    {path: '*', component: FourOFour, name: '404'},
];

export default routes;