<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@php
$rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];

$isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and
$generalSettings['rtl_layout'] == 1));
@endphp
<style>
.login-container {
    margin: 120px 0px 70px;
    border-radius: 15px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(236, 236, 236);
    border-image: initial;
}

.login-card {
    padding: 30px 45px 50px 45px;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $pageTitle ?? '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/admin/vendor/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">
    @if($isRtl)
    <link rel="stylesheet" href="/assets/admin/css/rtl.css">
    @endif
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
</head>

<body class="@if($isRtl) rtl @endif">

    <div id="app">
        @php
        $getPageBackgroundSettings = getPageBackgroundSettings();
        @endphp
        <div class="container col-11 col-md-8 col-lg-5 col-xl-4">
            <div class="login-container justify-content-center align-items-center ">
                <div class="login-card">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/admin/vendor/poper/popper.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/admin/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/admin/vendor/moment/moment.min.js"></script>
    <script src="/assets/admin/js/stisla.js"></script>
    <script src="/assets/admin/vendor/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>

    <script>
    (function() {
        "use strict";

        window.csrfToken = $('meta[name="csrf-token"]');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.adminPanelPrefix = '{{ getAdminPanelUrl() }}';

        @if(session() -> has('toast'))
        $.toast({
            heading: '{{ session()->get('
            toast ')['
            title '] ?? '
            ' }}',
            text: '{{ session()->get('
            toast ')['
            msg '] ?? '
            ' }}',
            bgColor: '@if(session()->get('
            toast ')['
            status '] == '
            success ') #43d477 @else #f63c3c @endif',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: '{{ session()->get('
            toast ')['
            status '] }}'
        });
        @endif
    })(jQuery);
    </script>

    <!-- Template JS File -->
    <script src="/assets/admin/js/scripts.js"></script>
    <script src="/assets/admin/js/custom.js"></script>

</body>

</html>