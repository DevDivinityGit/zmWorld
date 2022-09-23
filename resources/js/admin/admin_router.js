Vue.use(VueRouter);
import Routes from "./admin_routes";
const vueRouter = new VueRouter({
    mode: 'history',
    routes: Routes,
});


vueRouter.beforeResolve((to, from, next) => {

    if(to.path) NProgress.start();
    next();
});
vueRouter.afterEach((to, from, next) => {



    NProgress.done();
});













export default vueRouter;


