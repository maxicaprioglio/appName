<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/appname/css/login.css" />
    <title>Registro</title>
</head>

<body>
    <div class="d-grid place-items-center vh-100">
        <div class="d-flex justify-content-center align-self-center ">
            <form action="/nameapp/registro" method="post" class="fondo-color rounded p-4">
                <h1 class='text-center'>Registro</h1>
                @csrf
                <!-- familia -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Nombre Familiar</span>
                        <input type="text" name="familia" value='{{ old('familia') }}' class="form-control"
                            required />
                    </div>
                    @if ($errors->first('familia'))
                        <div class="text-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
                <!-- contra1 -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Contraseña primer jugador</span>
                        <input type="text" name="password" value='{{ old('password') }}' class="form-control"
                            required />
                    </div>
                    @if ($errors->first('password'))
                        <div class="text-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
                <!-- Apellido -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">Apellido</span>
                        <input type="text" name="apellido" value='{{ old('apellido') }}' class="form-control"
                            required />
                    </div>
                    @if ($errors->first('apellido'))
                        <div class="text-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
                <!-- sexo -->
                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="sexo">Genero</label>
                        <select class="form-select" name="sexo" id="sexo" value='{{ old('sexo') }}'>
                            <option value='mujer'>Mujer</option>
                            <option value='varón'>Varón</option>
                        </select>
                    </div>
                    @if ($errors->first('sexo'))
                        <div class="text-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
                <!-- juego -->
                <div class="mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="sexo">Tipo de decicion</label>
                        <select class="form-select" name="juego" id="juego" value='{{ old('juego') }}'>
                            <option value='solitario'>Solitario</option>
                            <option value='restar'>Descarte</option>
                            <option value='sumar'>Coincidencia</option>
                        </select>
                    </div>
                    @if ($errors->first('juego'))
                        <div class="text-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>
                @if (session('mensajeError'))
                    <div class="text-{{ session('css') }}">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between">
                    <a href="/nameapp/" class="btn text-ligth rounded my-2">Volver</a>
                    <button class="btn btn-dark p-2 m-2" type="submit">enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
