
## Descargar y configurar el proyecto base

1. Clona el repositorio de este proyecto base:
   **git clone {link del repo sin las llaves}**
2. Accede a la carpeta del proyecto clonado.
3. Conecta tu proyecto a tu propio repositorio en GitHub:
   **git remote add origin {URL de tu repositorio en GitHub sin las llaves}**
4. Verifica que el repositorio remoto esté correctamente configurado:
   **git remote -v**
   
## Ejecutar el proyecto de manera local

Para comenzar, se deben habilitar las siguientes extensiones en el archivo php.ini eliminando el ; en ;extension=soap ;extension=gd ;extension=zip

Ahora se debe configurar un token para utilizar el comando "composer update", este lo puedes configurar mediante el comando composer config --global github-oauth.github.com {Aqui_tu_token sin las llaves}

Ahora ejecuta el comando composer update

Por ultimo debes ejecutar las migraciones con el comando php artisan migrate, después los seeders

Para iniciar el proyecto, usa el comando: php artisan serve
# Proyecto de Blog

## Descripción
Este proyecto es un blog desarrollado con Laravel que permite a los usuarios crear, editar y visualizar publicaciones. A continuación, se describen las características y funcionalidades implementadas.

## Paso 1: Configuración inicial del proyecto
Ejecuté las migraciones y seeders iniciales para establecer las tablas y datos básicos en la base de datos. Luego, creé una nueva migración para la tabla `posts`, que incluye los campos `title`, `content`, `author_id`, 'photo', 'likes_count' y `created_at`. Finalmente, utilicé seeders para poblar la tabla con 12 entradas.

## Paso 2: Relación entre modelos
Definí la relación `belongsTo` en el modelo `Post` para asociar cada publicación con un autor (usuario). También implementé la relación `hasMany` en el modelo `User`, permitiendo que un autor tenga múltiples publicaciones.

## Paso 3: Interacción con Eloquent
Utilicé Eloquent en el controlador del blog para obtener la lista de publicaciones y sus autores, enviándolos a las vistas correspondientes. Implementé filtros por autor utilizando Eloquent scopes (llamados scopePorAutor y scopeOrdenarporFecha) y añadí la funcionalidad para ordenar las publicaciones por fecha y autor.

## Paso 4: Diseño modular con JavaScript y CSS
Implementé un archivo JavaScript modular que maneja la funcionalidad interactiva, el cual es un botón de like en los posts interactivo.

## Paso 5: Integración de Ajax/fetch
Implementé un sistema de carga de más publicaciones en la página principal utilizando la API de Ajax. Creé un botón "Cargar más" que permite realizar solicitudes sin necesidad de recargar la página, mostrando un indicador de carga mientras se recuperan las publicaciones adicionales.

## Paso 6: Uso de Datatables
En una vista separada (`/admin/posts`), implementé Datatables para listar todas las publicaciones, permitiendo buscar, ordenar y paginar los resultados. Así como editar y eliminar.

## Paso 7: Almacenamiento en Laravel
Agregué la funcionalidad para que los usuarios suban imágenes junto con cada publicación. Utilicé el sistema de almacenamiento de archivos de Laravel para guardar las imágenes en el servidor, almacenando la ruta correspondiente en la base de datos y mostrando la imagen junto a cada publicación.


