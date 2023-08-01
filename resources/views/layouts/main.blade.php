<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='cache-control' content='no-cache' />
    <meta http-equiv='expires' content='0' />
    <meta http-equiv='pragma' content='no-cache' />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>{{$pageTitle}}</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    </link>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </link>
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    </link>
    @stack('styles')
</head>

<body>
    <div class="base-container">
        <div class="dv-top-menu">
            @include('layouts.menu')
        </div>
        <div class="base-contents">
            <div class="dv-left-menu">
                @include('layouts.left_menu')
            </div>
            <div class="dv-contents">
                @yield('contents')
            </div>
        </div>
    </div>
</body>

<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('scripts')

</html>