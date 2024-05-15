<!DOCTYPE html>
<html lang="pt-br">
@include('components.head')
@include('components.header')
<body>
    <main>
        <div class="as-4 flex-grow" id="content">
            @yield('content')
        </div>
    </main>
</body>
@include('components.script')
</html>
