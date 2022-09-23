<template>
    <div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <router-link :to="{name: 'home'}" class="brand-link">
                <img src="/admin/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </router-link>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/admin/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <router-link :to="{name: 'home'}" class="d-block">{{$store.getters.getUser.name}}</router-link>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <router-link :to="{name: 'home'}" class="nav-link active">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    Dashboard

                                </p>
                            </router-link>
                            <ul class="nav nav-treeview">




                            </ul>
                        </li>

                        <!--<li class="nav-item has-treeview">-->
                            <!--<router-link to="" class="nav-link">-->
                                <!--<i class="nav-icon fa fa-user"></i>-->
                                <!--<p>-->
                                    <!--Users-->
                                    <!--<i class="right fa fa-angle-left"></i>-->
                                <!--</p>-->
                            <!--</router-link>-->
                            <!--<ul class="nav nav-treeview">-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/charts/chartjs.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>ChartJS</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/charts/flot.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Flot</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/charts/inline.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Inline</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                            <!--</ul>-->

                        <!--</li>-->
                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Users
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link :to="{name: 'users'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>All users</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name: 'create.user'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Create User</p>
                                    </router-link>
                                </li>
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/UI/buttons.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Buttons</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/UI/sliders.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Sliders</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                            </ul>
                        </li>








                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Plans
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link :to="{name: 'plans'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>All Plans</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link :to="{name: 'create.plan'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Create new Plan</p>
                                    </router-link>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/buttons.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Buttons</p>-->
                                <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/sliders.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Sliders</p>-->
                                <!--</a>-->
                                <!--</li>-->
                            </ul>
                        </li>



































                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Tasks
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link :to="{name: 'tasks'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Submitted tasks</p>
                                    </router-link>
                                </li>




                                <li class="nav-item">
                                    <router-link :to="{name: 'create.task'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Create Task</p>
                                    </router-link>
                                </li>






                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/buttons.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Buttons</p>-->
                                <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/sliders.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Sliders</p>-->
                                <!--</a>-->
                                <!--</li>-->
                            </ul>
                        </li>






                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Promotion Images
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <router-link :to="{name: 'promotion.images.all'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>All Promotion images</p>
                                    </router-link>
                                </li>




                                <li class="nav-item">
                                    <router-link :to="{name: 'promotion.images.create'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Add Promotion images</p>
                                    </router-link>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--<router-link :to="{name: 'create.plan'}" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Create Plan</p>-->
                                <!--</router-link>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/buttons.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Buttons</p>-->
                                <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--<a href="/admin/template/pages/UI/sliders.html" class="nav-link">-->
                                <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                <!--<p>Sliders</p>-->
                                <!--</a>-->
                                <!--</li>-->
                            </ul>
                        </li>

















                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Guid API
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <router-link :to="{name: 'guid.index'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Update Guid API</p>
                                    </router-link>
                                </li>




                            </ul>
                        </li>









                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Download API
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <!--<li class="nav-item">-->
                                    <!--<router-link :to="{name: 'download_api.index'}" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>All download API</p>-->
                                    <!--</router-link>-->
                                <!--</li>-->





                                <li class="nav-item">
                                    <router-link :to="{name: 'download_api.create'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>All download API</p>
                                    </router-link>
                                </li>





                            </ul>
                        </li>















                        <li class="nav-item has-treeview">
                            <a href="/admin/template/#" class="nav-link">
                                <i class="nav-icon fa fa-list-alt"></i>
                                <p>
                                    Videos API
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <router-link :to="{name: 'videos.index'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>All Video API</p>
                                    </router-link>
                                </li>





                                <li class="nav-item">
                                    <router-link :to="{name: 'videos.create'}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Create Video API</p>
                                    </router-link>
                                </li>





                            </ul>
                        </li>




















































                        <!--<li class="nav-item has-treeview">-->
                            <!--<a href="/admin/template/#" class="nav-link">-->
                                <!--<i class="fa fa-product-hunt"></i>-->
                                <!--<p>-->
                                    <!--Products-->
                                    <!--<i class="fa fa-angle-left right"></i>-->
                                <!--</p>-->
                            <!--</a>-->
                            <!--<ul class="nav nav-treeview">-->
                                <!--<li class="nav-item">-->
                                    <!--<router-link :to="{name: 'all.products'}" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>All Products</p>-->
                                    <!--</router-link>-->
                                <!--</li>-->

                                <!--<li class="nav-item">-->
                                    <!--<router-link :to="{name: 'product.create'}" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Create new Product</p>-->
                                    <!--</router-link>-->
                                <!--</li>-->

                                <!--<li class="nav-item">-->
                                    <!--<router-link :to="{name: 'trashed.products'}" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Trashed Products</p>-->
                                    <!--</router-link>-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</li>-->
                        <!--<li class="nav-item has-treeview">-->
                            <!--<a href="/admin/template/#" class="nav-link">-->
                                <!--<i class="nav-icon fa fa-table"></i>-->
                                <!--<p>-->
                                    <!--Tables-->
                                    <!--<i class="fa fa-angle-left right"></i>-->
                                <!--</p>-->
                            <!--</a>-->
                            <!--<ul class="nav nav-treeview">-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/tables/simple.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Simple Tables</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                    <!--<a href="/admin/template/pages/tables/data.html" class="nav-link">-->
                                        <!--<i class="fa fa-circle-o nav-icon"></i>-->
                                        <!--<p>Data Tables</p>-->
                                    <!--</a>-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</li>-->



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>
</template>

