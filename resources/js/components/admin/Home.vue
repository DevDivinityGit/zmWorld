<template>
    <div>
        <nav-com></nav-com>
        <slider></slider>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <div>
                `
                <router-view :key="$router.path"></router-view>
            </div>
            <!-- /.content -->
        </div>

        <footer-com></footer-com>



    </div>
</template>

<script>
   import Footer from "./layouts/Footer";
   import Nav from "./layouts/Nav";
   import Slider from "./layouts/Slider";


   export default {
       components: {
         footerCom: Footer,
           navCom: Nav,
           slider: Slider,



       },
       mounted() {
       },

   }

</script>



