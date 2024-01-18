<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/appname/css/login.css" />
    <title>Login NameApp</title>
</head>

<body>
    <div class="d-grid place-items-center vh-100">
        <div class="d-flex justify-content-center align-self-center ">
            <form action="/nameapp/login" method="POST" class="fondo-color rounded p-4 pb-1">
                @csrf
                <input class="w-100 m-2" type="text" name="familia" id="familia" placeholder="Familia"
                    value='{{ old('familia') }}'>
                <input class="m-2 w-100" type="text" name="password" id="password" placeholder="Contraseña">
                <div class="input-group px-5 my-2">
                    <label class="input-group-text" for="usuario">Jugador?</label>
                    <select class="form-select" name="usuario" id="usuario" value='{{ old('usuario') }}'>
                        <option value='0'>Solitario</option>
                        <option value='1'>Usuario 1</option>
                        <option value='2'>Usuario 2</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/nameapp/registro" class="btn text-ligth rounded my-2">Registrarse</a>
                    <button class="btn btn-dark p-2 m-2" type="submit">Enviar</button>
                </div>
                @if (session('mensajeError'))
                    <div class="text-{{ session('css') }}">
                        {{ session('mensaje') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>

</html>
