<template>
    <div>
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="/admin/template/#"><i class="fa fa-bars"></i></a>
                </li>
                <!--<li class="nav-item d-none d-sm-inline-block">-->
                    <!--<a href="/admin/template/index3.html" class="nav-link">Home</a>-->
                <!--</li>-->
                <li class="nav-item d-none d-sm-inline-block">
                    <!--<router-link :to="{name: 'contact'}" class="nav-link">Contact Me</router-link>-->
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">-->
                <!--<div class="input-group input-group-sm">-->
                    <!--<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">-->
                    <!--<div class="input-group-append">-->
                        <!--<button class="btn btn-navbar" type="submit">-->
                            <!--<i class="fa fa-search"></i>-->
                        <!--</button>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</form>-->



            <!--<ul class="nav navbar-nav navbar-right" style="position: absolute; right: 150px;">-->
                <!--<li style="align-content:right">-->
                    <!--<a href="/" target="_blank" class="btn btn-secondary mt-1">-->
                        <!--<i class="fa fa-globe" style="font-size: 20px;"></i>-->
                        <!--Visit main site-->

                    <!--</a>-->
                <!--</li>-->
            <!--</ul>-->





            <!-- Right navbar links -->
            <ul class="nav navbar-nav navbar-right" style="position: absolute; right: 10px;">
                <li style="align-content:right">
                    <button @click="hitLogout()" class="btn btn-secondary mt-1">
                        <i class="fa fa-sign-out" style="font-size: 20px;"></i>
                        Logout

                    </button>
                </li>
            </ul>
            <div style="clear: both;"></div>

        </nav>

    </div>
</template>


<script>
    export default {

        methods: {
            hitLogout() {
                const token = localStorage.getItem('token');

                axios({
                    method: 'post',
                    url: '/api/logout',
                    headers: {
                        authorization: "Bearer "+token,
                    }
                }).
                    then(res => {
                        if(res.data.code === 200) {
                            localStorage.clear();
                            this.$router.push({name: 'login'});
                    }
                });






            }
        }

    }
</script>







