@include('admin.layout.head')
<body class="min-h-screen">
<div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
    <div
        class="absolute -top-40 right-[10%] h-[34rem] w-[34rem] rounded-full bg-brand-500/[0.13] blur-[130px] animate-floaty"></div>
    <div
        class="absolute bottom-[-10rem] left-[5%] h-[30rem] w-[30rem] rounded-full bg-aqua-500/[0.10] blur-[130px] animate-floaty"></div>
    <div class="absolute inset-0 opacity-[0.35]"
         style="background-image:radial-gradient(rgba(148,163,184,.08) 1px,transparent 1px);background-size:28px 28px"></div>
</div>
<div id="sidebarOverlay" class="fixed inset-0 z-30 hidden bg-ink-950/70 backdrop-blur-sm lg:hidden"></div>
@include('admin.toast.error')
@include('admin.toast.success')
@include('admin.layout.sidebar')
<div class="flex min-h-screen flex-col lg:mr-72">
@include('admin.layout.header')
    @yield('content')
</div>

@yield('other_content')
@include('admin.layout.script')
@yield('script')
</body>
</html>
