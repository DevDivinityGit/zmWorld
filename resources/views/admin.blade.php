<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/admin/template/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/template/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css">
    <style>


        .select2 .select2-selection__choice__display {
            /*background: #636363;*/
            color: #000;
        }
        /*select2-selection*/
        .addDangerous {
            outline: none !important;
            border-color: red !important;
            box-shadow: 0 0 10px red !important;
        }




    </style>


    {{--<span class=" select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2-states-po-container"><li class="select2-selection__choice" title="Latest Products" data-select2-id="select2-data-10-3qox"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-po-container-choice-9xsq-1"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-po-container-choice-9xsq-1">Latest Products</span></li><li class="select2-selection__choice" title="Top Selling Products" data-select2-id="select2-data-11-97mo"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-po-container-choice-vw85-2"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-po-container-choice-vw85-2">Top Selling Products</span></li></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" --}}


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div id="app">

        <router-view :key="$router.path"></router-view>

    </div>




    <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/admin/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/admin/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/template/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/admin/template/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="/admin/template/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="/admin/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/admin/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="/admin/template/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="/admin/template/dist/js/pages/dashboard2.js"></script>


<script type="text/javascript" src="/js/lib/helpers.js"></script>
<script type="text/javascript" src="/js/lib/jquery_prev.js"></script>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>




</script>

<script src="/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/js/admin/admin_app.js"></script>

<script>

</script>





</body>
</html>
