<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
@include('app.layouts.components.head-tag')

<body class="theme-dark">
    @include('app.layouts.components.sidebar')
    <div id="app">
        <div id="main">
            @include('app.layouts.components.header')
            @include('app.layouts.components.page-header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('app.layouts.components.footer')
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
