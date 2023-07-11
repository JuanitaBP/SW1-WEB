# sw1_web



## Requisitos 
- xammp https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.17/xampp-windows-x64-8.1.17-0-VS16-installer.exe/download
- laravel --version
laravel Installer 4.2.17
- composer --version
Composer version 2.4.2 2022-09-14 16:11:15
- php --version
PHP 8.1.10 (cli)

## Instalacion del proyecto
ir a la ruta de xammp y ejecutar xammp
Crear base de datos en phpadmin, o posgretsql
abrir cmd desde donde se guardara el proyecto
- git clone https://github.com/Pericena/sw1_web.git
- composer update
- composer install
- npm install
- npm run dev

## Dependencia
- composer require livewire/livewire
- composer require laravel/jetstream

## duplicar el archivo .env example
cambiar nombre a .env
-php artisan key:generate
- php artisan migrate:fresh --seed
- php artisan serve http://127.0.0.1:8000

## git
#### Bajar cambios primero (para que tus cambios se mantenga sigue estos paso)

- git add .
- git commit -m "soy yo otraves"
- git pull origin main

#### Subir sus cambios al proyecto(para subir tus cambios sigue estos pasos)

- git add .
- git commit -m "soy yo"
- git push origin main

## laravel ejemplos
- php artisan make:migration create_Users_table
- php artisan make:model User
- php artisan make:controller UserController
- php artisan make:seeder UsersSeeder


## Crear proyecto
#### Crear Proyecto Laravel de cero 
##### Instalar Laravel 
- composer global require laravel/installer 

##### Crear Proyecto
- laravel new nuevo_proy 

##### Instalar LOGIN de LARAVEL
- composer require laravel/ui
- php artisan ui bootstrap --auth
- npm install
- npm run dev
- composer require jeroennoten/laravel-adminlte
- php artisan adminlte:install
- php artisan ui bootstrap --auth (no es necesario)
- composer require maatwebsite/excel
- php artisan storage:link
- alt+shif+a comentar
# proyectogrupalsw
# swproyecto
# swproyecto
# swproyecto
