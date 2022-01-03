<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Produtos</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @component('navbar_component', ['current' => $current])
        
    @endcomponent
    <div class="container mt-5">
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>

    @hasSection ('javascript')
        @yield('javascript')
    @endif

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>