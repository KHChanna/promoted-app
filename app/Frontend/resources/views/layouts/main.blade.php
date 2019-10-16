<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

<title>PromoApp</title>
{{--}}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('ui-ecommerce/images/favicon.ico')}}">
--}}
<!-- font awsome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<!-- jQuery -->
<script src="{{ asset('ui-ecommerce/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{ asset('ui-ecommerce/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
{{--}}
<link href="{{ asset('ui-ecommerce/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
--}}
<!-- Font awesome 5 -->
<link href="{{ asset('ui-ecommerce/fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">

<!-- plugin: fancybox  -->
<script src="{{ asset('ui-ecommerce/plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
<link href="{{ asset('ui-ecommerce/plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">

<!-- plugin: owl carousel  -->
<link href="{{ asset('ui-ecommerce/plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset('ui-ecommerce/plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
<script src="{{ asset('ui-ecommerce/plugins/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- custom style -->
<link href="{{ asset('ui-ecommerce/css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('ui-ecommerce/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<style>
    .btn-rounded {
        border-radius: 20px;
        margin:0px 10px;
    }
    .head-cat{
        background-color:#6cb2eb;
        color: white;
        padding: 10px;
        border-radius: 4px;
    }
    .h6{
        font-weight:700px;
    }
</style>

<!-- custom javascript -->
<script src="{{ asset('ui-ecommerce/js/script.js')}}" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {

	// jQuery code
    $('[name=input_qty]').keypress(function (e){
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
        }
    });

    // for (var key in carts) {
    //     console.log(carts[key])
    // }
    $('[name=input_qty]').each(function( key, data ) {
    });

});
// jquery end
</script>

</head>
<body>
<!-- ========================= SECTION MAIN ========================= -->
@include('frontend::layouts.header')
<!-- ========================= SECTION MAIN END // ========================= -->


<!-- ========================= SECTION MAIN ========================= -->
@yield('content')
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
@include('frontend::layouts.footer')
<!-- ========================= FOOTER END // ========================= -->

</body>
</html>
