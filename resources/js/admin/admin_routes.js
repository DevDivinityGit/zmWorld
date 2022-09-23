import Home from "../components/admin/Home";


import Login from "../components/layouts/Login";
import Reset from "../components/layouts/Reset";
import ChangePassword from "../components/layouts/ChangePassword";



//USER CRUD


import MainContent from "../components/layouts/users/Maincontent";
import CreateUser from "../components/layouts/users/CreateUser";
import EditUser from "../components/layouts/users/Edit";
import VerifyCode from "../components/admin/layouts/VerifyCode";

// END USER CRUD


// PLAN ROUTES

import AllPlans from "../components/layouts/plans/Index";
import CreatePlan from "../components/layouts/plans/Create";
import EditPlan from "../components/layouts/plans/Edit";



// END PLAN ROUTES

//TASK ROUTES

import AllTasks from "../components/layouts/tasks/Index";
import CreateTask from "../components/layouts/tasks/Create";


// END TASK ROUTES





// IMAGE PROMOTION
import CreatePromotionImage from "../components/layouts/promotion_images/Create";
import AllPromotionImage from "../components/layouts/promotion_images/Index";
import GuidAll from "../components/layouts/guid/Index";

// DOWNLOAD API
import CreateDownloadApi from "../components/layouts/download_api/Create";
import DownloadApiIndex from "../components/layouts/download_api/Index";
import DownloadApiEdit from "../components/layouts/download_api/Edit";


// VIDEOS
import VideoCreate from "../components/layouts/videos/Create";
import VideoIndex from "../components/layouts/videos/Index";
import VideoEdit from "../components/layouts/videos/Edit";



const routes = [
    {path: '/', component: Home, name: 'home',
        children: [


            {path: "users", component: MainContent, name: 'users'},
            {path: "users/:id/edit", component: EditUser, name: 'edit.user'},
            {path: "plans", component: AllPlans, name: 'plans'},
            {path: "plans/:id", component: EditPlan, name: 'edit.plan'},
            {path: "tasks", component: AllTasks, name: 'tasks'},
            {path: "tasks/create", component: CreateTask, name: 'create.task'},
            {path: "plans/create", component: CreatePlan, name: 'create.plan'},
            {path: "create-user", component: CreateUser, name: 'create.user'},




            {path: "guid-apis", component: GuidAll, name: 'guid.index'},



            // PROMOTION IMAGES


            {path: "promotion-images", component: AllPromotionImage, name: 'promotion.images.all'},
            {path: "promotion-images/create", component: CreatePromotionImage, name: 'promotion.images.create'},



            // DOWNLOAD API

            {path: "download-apis-create", component: CreateDownloadApi, name: 'download_api.create'},
            {path: "download-apis-index", component: DownloadApiIndex, name: 'download_api.index'},
            {path: "download-apis/:id/edit", component: DownloadApiEdit, name: 'download_api.edit'},




            // VIDEOS
            {path: "videos-create", component: VideoCreate, name: 'videos.create'},
            {path: "all-videos", component: VideoIndex, name: 'videos.index'},
            {path: "all-videos/:id/edit", component: VideoEdit, name: 'videos.edit'},






            // {path: "products", component: AllProducts, name: 'all.products'},
            // {path: "products/create", component: ProductCreate, name: 'product.create'},
            // {path: "products/trashed", component: TrashedProducts, name: 'trashed.products'},
            // {path: "products/:slug/edit", component: ProductEdit, name: 'product.edit'},
            //
            //
            // {path: "categories", component: Categories, name: "categories.all"},
            // {path: "categories/:id/edit", component: CategoryEdit, name: "category.edit"},
            // {path: "categories/create", component: CreateCategory, name: "category.create"},
            //
            //
            //
            //
            //
            // {path: "contact", component: Contact, name: "contact"},
            //
            //


        ],
        beforeEnter: (to, from, next) => {
            if(localStorage.getItem('token') === null) {
             next({name: 'login'});

            } else next();
        },


},
    //
    {path: '/reset', component: Reset, name: 'reset'},
    {path: '/verify-code', component: VerifyCode, name: 'verify.code'},
    {path: '/login', component: Login, name: 'login'},
    {path: '/change-password', component: ChangePassword, name: 'change.password'},
    //
    // {path: '*', component: FourOfFour, name: '404'},
    //
    //





];

export default routes;



