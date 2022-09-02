# BSimple

Proyecto creado utilizando el framework Laravel


Programas requisitos:

1.- Composer https://getcomposer.org/

2.- XAMPP https://www.apachefriends.org/es/index.html


Instrucciones de instalación en S.O. Windows:

1.- Abrir programa XAMPP y ejecutar los servicios de Apache y MySQL https://www.apachefriends.org/es/index.html

2.- Crear base de datos "bsimpleapp" en PhpMyAdmin presionando el botón "Admin" del servicio MySQL en XAMPP

3.- Descomprimir el proyecto y moverlo a la carpeta C:\xampp\htdocs

3.- Abrir la terminal de Windows (cmd) y situarse en la carpeta donde está alojado el directorio bsimpleapp C:\xampp\htdocs\BSIMPLE\bsimpleapp

4.- En la terminal ejecutar el comando "php artisan migrate" para migrar la base de datos

5.- En la terminal ejecutar el comando "php artisan db:seed --class=SeederTablaPermisos" para poblar la base de datos con los permisos de cada rol de usuario

6.- En la terminal ejecutar el comando "php artisan db:seed --class=SuperAdminSeeder" para poblar la base de datos con el usuario super administrador 

7.- En la terminal ejecutar el comando "php artisan serve" para iniciar la aplicación

8.- Copiar la dirección que se muestra en la terminal ( http://127.0.0.1:8000 ) y pegarla en un navegador web

9.- Iniciar sesión como super administrador con las credenciales: admin@gmail.com / 12345678
