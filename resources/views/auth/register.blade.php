@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>


                    @if ($message_e = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading"><i class='bx bx-check'></i> Proceso completado con Exito!</h5>
                            {{ $message_e }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                    class='bx bx-x'></i></button>
                        </div>
                    @endif

                    @if(session('alert_message'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                alert('{{ session('alert_message') }}');
                            });
                        </script>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container mt-5">

                        <!-- Contenido de cada paso -->
                        <div id="step-1-content" class="step-content p-4 border rounded active">
                            <h3>Información de Usuario</h3>
                            <div class="container-formulario">

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="name"
                                                class="col-md- col-form-label text-md-end">{{ __('Nombre') }}</label>

                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="Por ejemplo, Jose">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __('Apellido') }}</label>

                                            <input id="surname" type="text"
                                                class="form-control @error('surname') is-invalid @enderror" name="surname"
                                                value="{{ old('surname') }}" required autocomplete="surname"
                                                placeholder="Por ejemplo, Escalona" place autofocus>

                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Cargo') }}</label>

                                            <input id="cargo" type="text"
                                                class="form-control @error('cargo') is-invalid @enderror" name="cargo"
                                                required autocomplete="new-cargo"
                                                placeholder="Por ejemplo, Cordinador de Servicios">

                                            @error('cargo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Departamento (DPT)') }}</label>

                                            <input id="dpt" type="text"
                                                class="form-control @error('dpt') is-invalid @enderror" name="dpt"
                                                placeholder="Por ejemplo, Servicios Tecnologicos" required
                                                autocomplete="new-dpt">

                                            @error('dpt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Por ejemplo, jose.escalona@grupoxven.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Email input -->

                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Contraseña') }}</label>

                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password"
                                                placeholder="Su contraseña debe tener minimo 8 caracteres">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password-confirm"
                                                cclass="col-md- col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirmar contraseña">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="role">Tipo de Usuario</label>
                                        <select id="role" name="role"
                                            class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="">Seleccione un rol</option>
                                            <option value="lectura">Solo Lectura</option>
                                            <option value="lectura-escritura">Lectura y Escritura</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <h5 class="mt-6 mb-4"><strong>Informacion de Contacto</strong></h5>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Numero Movil') }}</label>

                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                required autocomplete="new-phone" placeholder="Por ejmplo, 0412458779">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Numero Extension') }}</label>

                                            <input id="n_extension" type="text"
                                                class="form-control @error('n_extension') is-invalid @enderror"
                                                name="n_extension" required autocomplete="new-n_extension"
                                                placeholder="Por ejmplo, 1010">

                                            @error('n_extension')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Location input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Localidad</label>
                                        <input id="location" type="text"
                                            class="form-control @error('location') is-invalid @enderror" name="location"
                                            required autocomplete="location" placeholder="Por ejmplo, Torre Xerox">

                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Location input -->


                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>


                                </form>

                            </div>







                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection