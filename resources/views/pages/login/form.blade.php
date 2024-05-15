<div class="position-absolute top-50 start-50 translate-middle">
    <div class="container">
        <form action="{{url('/admin/login')}}" method="POST">
            @csrf
            @method('POST')
            <div class="d-flex justify-content-center">
                <img height="160px" src="{{url('assets/images/logo.png')}}" >
            </div>
            <div class="form-group mb-2">
                <label for="" class="form-label">Email</label>
                <input class="form-control" type="text" name="email">
            </div>
            <div class="form-group mb-2">
                <label for="" class="form-label">Senha</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="d-grid">
                <button class="btn btn-md btn-primary mt-3">Continuar</button>
            </div>
        </form>
    </div>
</div>
