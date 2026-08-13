<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('title')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('adminFolder/assets/js/theme-init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('global/css/persian-datepicker.min.css')}}"/>

</head>
