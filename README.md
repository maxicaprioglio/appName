# Name App
Es un proyecto que sirve para encontrar un nombre o ver nombres. Esta creado el Front en React Js y el Back en Laravel. 

## Empecemos con el Front

Bajar la carpeta Front y instalar las dependencias (npm i)
Esta listo para subirlo (npm run build)

## Armado del Back

Bajar la carpta Back y instalar las dependencias: composer install
Crea la connexion a la base de datos en el .env
Genera una nueva clave de aplicación: php artisan key:generate
hacer las migraciones de la base de datos: php artisan migrate
Copiar los archivos del Front (build) a la carpeta public/nameapp (menos index.html)  
Copiar del archivo index.html (front - build) el script y el link al archivo en la vista del back "back\resources\views\partials\nameapp\juego.blade.php", linea 13 y 14 copias solo el nombre del archivo (ejemplo: /static/js/main.148ca083.js) .
listo ya podes probarlo en desarrollo: php artisan serve


