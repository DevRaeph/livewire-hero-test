<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack("seo")

    @vite(['resources/css/app.css'])


    @livewireStyles
    @stack('css')


</head>


<body>
<div>

    {{$slot}}

</div>

@livewireScripts
@vite(['resources/js/app.js'])

@stack('js')
</body>
</html>
