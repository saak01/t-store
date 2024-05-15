<div class="page page-form page-login">
    @include('components.alert')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container">
            <form action="{{ url('/admin/login') }}" method="POST">
                @csrf
                @method('POST')

                <div class="d-flex justify-content-center">
                    <img height="160px" src="{{ url('assets/images/logo.png') }}">
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email">
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="d-grid">
                    <button class="btn btn-md btn-primary mt-3">Login</button>
                    <a class="text-center mt-3 link-underline link-underline-opacity-0">Forgot password</a>
                </div>
            </form>

        </div>

    </div>

</div>
