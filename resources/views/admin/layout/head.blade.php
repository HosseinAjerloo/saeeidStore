<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('title')
    <script src="{{asset('global/js/jquery-4.0.0.slim.min.js')}}"></script>
    <script src="{{asset('global/js/persian-date.min.js')}}"></script>
    <script src="{{asset('global/js/persian-datepicker.min.js')}}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('adminFolder/assets/js/theme-init.js')}}"></script>
    <link rel="stylesheet" href="{{asset('global/css/persian-datepicker.min.css')}}"/>

</head>
