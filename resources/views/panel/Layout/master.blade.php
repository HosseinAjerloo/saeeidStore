@include('panel.Layout.head')
<body>

<!-- === نوار بالایی === -->
@include('panel.Layout.header')

    @yield('content')

@include('panel.Layout.footer')

@include('panel.Layout.script')
@yield('script')
</body>
</html>
