<div class="fixed top-5 right-5 z-[70] space-y-3">
   @foreach($errors->all() as $error)
        <div class="toast
        show
        relative
        flex items-start gap-3
        min-w-[320px] max-w-[420px]
        overflow-hidden
        rounded-xl
        border border-red-400/20
        bg-slate-950/80 px-4 py-3 backdrop-blur-xl  !shadow-[0_0_20px_2px_rgba(239,68,68,0.25)]
    ">

            <div class="
            flex h-9 w-9 shrink-0
            items-center justify-center
            rounded-full
            bg-red-500/10
            text-red-400
            ring-1 ring-red-400/20
            font-bold
        ">
                !
            </div>

            <div class="flex-1  text-right">
                <div class="mb-1 text-sm font-semibold text-red-400">
                    خطا
                </div>

                <div class="text-xs leading-6 text-slate-300">
                    {{$error}}
                </div>
            </div>

            <button onclick="(close_toast_error(event))"
                    type="button"
                    class="
                flex h-7 w-7 shrink-0
                items-center justify-center
                rounded-full
                text-lg
                text-slate-400
                transition
                hover:bg-red-500/10
                hover:text-red-400
            "
            >
                ×
            </button>

            <div class="
            absolute bottom-0 right-0
            h-0.5 w-full
            bg-red-400/20
        ">
                <div class="h-full w-full bg-red-400 progress-bar"></div>
            </div>

        </div>
    @endforeach

</div>
<script>
    function close_toast_error(event){
        const toast = event.target.closest('.toast');
        toast.classList.remove('show');
        toast.classList.add('hide');
        toast.remove();
    }
    const toasts = document.querySelectorAll('.toast');
    toasts.forEach(function (value){
        const progressBar=value.querySelector('.progress-bar')
        progressBar.addEventListener('animationend', () => {
            value.classList.remove('show');

            requestAnimationFrame(() => {
                value.classList.add('hide');
            });
        });
    })


</script>


{{--<div class="fixed top-5 right-5 z-[70]">--}}
{{--    <div class="toast--}}
{{--        relative--}}
{{--        flex items-start gap-3--}}
{{--        min-w-[320px] max-w-[420px]--}}
{{--        overflow-hidden--}}
{{--        rounded-xl--}}
{{--        border border-cyan-400/20--}}
{{--        bg-slate-950/80--}}
{{--        px-4 py-3--}}
{{--        backdrop-blur-xl--}}
{{--        !shadow-[0_0_20px_2px_rgba(6,182,212,0.25)]--}}
{{--    ">--}}

{{--        <!-- آیکن -->--}}
{{--        <div class="--}}
{{--            flex h-9 w-9 shrink-0--}}
{{--            items-center justify-center--}}
{{--            rounded-full--}}
{{--            bg-cyan-500/10--}}
{{--            text-cyan-400--}}
{{--            ring-1 ring-cyan-400/20--}}
{{--        ">--}}
{{--            ✓--}}
{{--        </div>--}}

{{--        <!-- متن -->--}}
{{--        <div class="flex-1 text-right">--}}
{{--            <div class="mb-1 text-sm font-semibold text-white">--}}
{{--                عملیات موفق--}}
{{--            </div>--}}

{{--            <div class="text-xs leading-6 text-slate-300">--}}
{{--                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- دکمه بستن -->--}}
{{--        <button--}}
{{--            type="button"--}}
{{--            class="--}}
{{--                flex h-7 w-7 shrink-0--}}
{{--                items-center justify-center--}}
{{--                rounded-full--}}
{{--                text-lg--}}
{{--                text-slate-400--}}
{{--                transition--}}
{{--                hover:bg-white/10--}}
{{--                hover:text-white--}}
{{--            "--}}
{{--        >--}}
{{--            ×--}}
{{--        </button>--}}

{{--        <!-- progress bar -->--}}
{{--        <div class="--}}
{{--            absolute bottom-0 right-0--}}
{{--            h-0.5 w-full--}}
{{--            bg-cyan-400/20--}}
{{--        ">--}}
{{--            <div class="h-full w-full bg-cyan-400"></div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
