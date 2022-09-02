# BSimple
Proyecto laravel

Descargar composer
Abrir carpeta del proyecto en Visual Studio Code

Crear base de datos bsimpleapp en phpmyadmin

Migrar la base de datos
Abrir terminal -> Correr el comando php artisan migrate

Correr los seeders para poblar la base de datos con los permisos 
php artisan db:seed --class=SeederTablaPermisos

y el usuario super administrador (admin@gmail.com 12345678)
php artisan db:seed --class=SuperAdminSeeder
