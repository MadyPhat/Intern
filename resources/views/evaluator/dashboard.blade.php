<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - @yield('title')</title>
    @include('admin.parts.css')
    @yield('styles')
</head>

<body id="page-top">
<div id="wrapper">
    @include('evaluator.parts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('evaluator.parts.nav')
            <div class="container-fluid">
                @yield('head')
                <div class="row">
                    @yield('contents')
                </div>
            </div>
            @include('admin.parts.footer')
        </div>

    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('admin.parts.js')
@yield('scripts')
</body>

</html>
