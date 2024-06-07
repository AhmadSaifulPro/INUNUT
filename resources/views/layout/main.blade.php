@include('layout.head')
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body onload="getLocation()" data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            @include('layout.sidebar')
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">

                @include('layout.navbar')

            </nav>

            <main class="content">

                @yield('content')

            </main>

            <footer class="footer">
                @include('layout.footer')
            </footer>
        </div>
    </div>

    @include('layout.script')
</body>

<!-- Mirrored from appstack.bootlab.io/dashboard-default by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Aug 2023 08:30:24 GMT -->
</html>
