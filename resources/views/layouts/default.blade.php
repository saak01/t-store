<!DOCTYPE html>
<html lang="pt-br">
@include('components.head')
@include('components.header')

<body>
    <main>
        @yield('content')
    </main>
</body>
@include('components.script')

</html>
