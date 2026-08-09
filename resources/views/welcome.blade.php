<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])



    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="fixed top-[20px] right-[20px]  z-[70] ">
        <div class="toast bg-black p-3 shadow-lg shadow-cyan-500/50 rounded-2xl ">
            <div class="close-error-btn">
                *
            </div>
            <div class="text-sm px-2  font-light text-right text-white">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
            </div>
            <!-- progress bar -->
        </div>
    </div>
    </body>
</html>
