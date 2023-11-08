## Proyecto Stiwi

### Dependencias

- XAMPP ultima version.
- PHP 8.0~ en adelante
- Composer

### Instrucciones para iniciar el Proyecto

1. Seguir el tutorial de youtube: [🧑‍💻🧙🏻CÓMO INSTALAR LARAVEL EN WINDOWS 🔥🧙🏻 Instalación de LARAVEL + COMPOSER desde cero【paso a paso】 - YouTube](https://www.youtube.com/watch?v=IOiq9wGTA_4)

2. Clonar el repositorio dentro htdocs.

3. Desde la consola de XAMPP ejecutar mysql.

4. Abrir una consola (CMD) dentro de la carpeta del proyecto y ejecutar los comandos.

5. **composer install**

6. Copiar el contenido de .env.example en un nuevo archivo llamado .env

7. Dentro del archivo .env buscar DB_DATABASE y cambiar el nombre a ej. laravel_dashboard y guardar el cambio.

8. Ejecutar comando: **php artisan key:generate**

9. **php artisan migrate** 

10. Pedira una confirmacion para crear la DB a lo cual hay que aceptar (Y)

11. Para ejecutar la pagina ejecutar: **php artisan serve**


