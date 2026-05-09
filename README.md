
# EduArcade Web

Plataforma web desarrollada con **Laravel 11** para la gestión y descarga de software educativo (EduArcade).

## Características
* **Gestión de Usuarios:** Sistema de perfiles con roles.
* **Panel de Soporte:** Sistema de tickets para atención al usuario.
* **Módulo de Descargas:** Sección dedicada para obtener las últimas versiones de EduArcade.
* **Frontend Moderno:** Estilizado con SASS y Vite.

## Requisitos del Sistema
* PHP >= 8.2
* Composer
* Node.js & NPM
* MySQL / MariaDB

## Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/ZephyroYz/EduArcade.git](https://github.com/ZephyroYz/EduArcade.git)
   cd EduArcade
   
# Instalar dependencias de PHP:
composer install

# Instalar dependencias de Frontend:
npm install

# Configurar el entorno:
cp .env.example .env
php artisan key:generate
(No olvides configurar tu base de datos en el archivo .env)

# Ejecutar migraciones:
php artisan migrate

# Compilar assets:
npm run dev

# Para levantar el servidor localmente:
php artisan serve
