

import Routes from "./routes";
Vue.use(VueRouter);
const vueRouter =  new VueRouter({
   mode: 'history',
   routes: Routes,
});

// vueRouter.beforeEach((to, from, next) => {
//       if(to.path !== '/cart' && from.path !== '/register') {
//window.history.pushState({}, document.title, "/" + "");

//           sessionStorage.removeItem('redirectURL');
//       }

      // next();
// });




vueRouter.beforeResolve((to, from, next) => {

    if(to.path) NProgress.start();
     next();
});
vueRouter.afterEach((to, from, next) => {
   // if(sessionStorage.getItem('redirectURL')) {
   //     if(to.path !== '/register' || to.path !== sessionStorage.getItem('redirectURL')) {
   //         sessionStorage.removeItem('redirectURL');
   //         alert(to.path);
   //     }
   //
   //
   //
   //
   // }




    NProgress.done();
});





export default vueRouter;
