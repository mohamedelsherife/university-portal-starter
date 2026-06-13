<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    {{-- global css file --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    {{-- put your css here using @section('my-css') --}}
    @yield('my-css')
    {{-- put the title of the page here using @section('page-title', 'your-title') --}}
    <title>@yield('page-title')</title>
</head>
<body>
    {{-- header of all the pages --}} 
    @include('layouts.header')
    {{-- page content that change for every pages, change it using @section('content') --}}
    <main class="container my-4"> 
    @yield('content')
    </main>
    {{-- footer of all the pages --}}
    @include('layouts.footer')
</body>
</html>