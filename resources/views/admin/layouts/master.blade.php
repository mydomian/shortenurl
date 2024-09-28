<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('admin.layouts.header')
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.layouts.sidebar')
        </aside>
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('admin-content')
                </div>
            </div>
        </div>
        <footer class="main-footer">
            @include('admin.layouts.footer')
        </footer>
    </div>
    @include('admin.layouts.scripts')
</body>

</html>
