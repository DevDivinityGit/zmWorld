<template>
    <div>
        <div class="container-fluid">

            <div class="row min-vh-100">
                <header-com></header-com>
                <div class="col-12">

                    <main class="row">
                      <slider-com></slider-com>
                        <featured-products></featured-products>
                        <div class="col-12">
                            <hr>
                        </div>
                        <latest-products></latest-products>
                        <div class="col-12">
                            <hr>
                        </div>
                        <top-selling-products></top-selling-products>
                        <top-footer></top-footer>
                    </main>
                    <!-- Main Content -->

                </div>
                <footer-com></footer-com>

            </div>

        </div>


    </div>
</template>
<script>
    import Header from "./layouts/Header";
    import Slider from "./layouts/Slider";
    import FeaturedProducts from "./layouts/FeaturedProducts";
    import LatestProducts from "./layouts/LatestProducts";
    import TopSellingProducts from "./layouts/TopSellingProducts";
    import TopFooter from "./layouts/TopFooter";
    import Footer from "./layouts/Footer";
    export default {
        components: {
          headerCom: Header,
            sliderCom: Slider,
            featuredProducts: FeaturedProducts,
            latestProducts: LatestProducts,
            topSellingProducts: TopSellingProducts,
            topFooter: TopFooter,
            footerCom: Footer,
        },

        beforeCreate() {


            if(sessionStorage.getItem('redirectURL')) sessionStorage.removeItem('redirectURL');
        },
        mounted() {

        }

    }
</script>

