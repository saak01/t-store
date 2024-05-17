<!DOCTYPE html>
<html lang="pt-br">
@include('components.head')
@include('components.header')
<body>
    <main class="d-flex justify-content-center container mt-4">
        <div class="as-4 flex-grow" id="content">
            @yield('content')
        </div>
    </main>
</body>
@include('components.script')
</html>
