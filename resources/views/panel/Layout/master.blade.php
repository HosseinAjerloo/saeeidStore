@include('panel.Layout.head')
<body>

<!-- === نوار بالایی === -->
@include('panel.Layout.header')

    @yield('content')

@include('panel.Layout.footer')

@include('panel.Layout.script')
@include('panel.toast.error')
@include('panel.toast.success')
@yield('script')
</body>
</html>
