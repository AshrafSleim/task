<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset("admin_assets/")}}/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset("admin_assets/")}}/css/style.css" type="text/css"/>
    <link href="{{asset("admin_assets/")}}/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset("admin_assets/")}}/css/bootsnav.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset("admin_assets/")}}/css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset("admin_assets/")}}/css/mdtimepicker.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset("admin_assets/")}}/css/bootstrap-toggle.css"/>
    @yield('css')
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>

<body>
<header>
    <div class="top-header-inside">
        <div class="container hd-wd">
            <div class="row">
            </div>
        </div>
    </div>

</header>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="errorDisplay" style="padding: 10em 0;">
                    <i class="fa fa-ban" aria-hidden="true" style="color: #022e54; font-size: 75px; margin-left: 46.5%"></i>
                    <h3 class="text-center">
                        Oops, the page you are looking for does not exist. <br>
                    </h3>
                </div>
            </div>
        </div>
    </div>


<div class="clearfix"></div>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">

            </div>


        </div>
    </div>

</footer>

<!--modals-->

@yield('modals')



<script src="{{asset("admin_assets/")}}/js/jquery.2.2.3.min.js"></script>
<script src="{{asset("admin_assets/")}}/js/bootstrap.js" type="text/jscript" ></script>
<script src="{{asset("admin_assets/")}}/js/bootsnav.js"></script>
<script src="{{asset("admin_assets/")}}/js/jquery.datetimepicker.full.js"></script>
<script src="{{asset("admin_assets/")}}/js/mdtimepicker.js"></script>
<script src="{{asset("admin_assets/")}}/js/ui.js"></script>

<script src="{{asset("admin_assets/")}}/js/jquery.selectallcheckbox.js"></script>
{{--<script src="{{asset("admin_assets/")}}/js/multi-input.js"></script>--}}
<script src="{{asset("admin_assets/")}}/js/nested-form.js"></script>
<script src="{{asset("admin_assets/")}}/js/bootstrap-toggle.js"></script>



@yield('js')


<script type="text/javascript">
    $(window).on('load',function(){
        $('#squarespaceModal-').modal('show');
    });
</script>

<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 6000);
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137720110-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-137720110-1');
</script>

</body>
</html>
