# Gestor de Currículums 

Aplicación web desarrollada en **Laravel 12** para la **gestión de alumnos y sus currículums**.  
Permite registrar, visualizar, editar y eliminar alumnos, así como almacenar su fotografía y datos académicos de forma segura.

---

## Características principales

* **CRUD completo de alumnos** (crear, ver, editar, eliminar).  
* **Subida de fotografía personal**, almacenada de forma privada (`storage/app/private`).  
* **Acceso protegido** a las imágenes.  
* **Visualización de perfiles individuales** con datos personales, formación y habilidades.  
* **Interfaz moderna y responsive**, basada en **Bootstrap 5.3**.  
* **Barra de navegación y sistema de búsqueda** integrado.  
* **Paginación automática** en el listado de alumnos.  

---

## Tecnologías utilizadas

* **Laravel 12.x**  
* **PHP 8.2+**  
* **MySQL 8 / MariaDB**  
* **Bootstrap 5.3**  
* **Blade Templates**  
* **Eloquent ORM**  

---

## Instalación y configuración

1. **Clona el repositorio**

   ```bash
   git clone https://github.com/usuario/gestor-cv.git
   cd gestor-cv
````

2. **Instala las dependencias**

   ```bash
   composer install
````

3. **Copia el archivo de entorno**

   ```bash
   cp .env.example .env
````

4. **Configura la base de datos**

   * Edita el archivo `.env` y actualiza:

     ```
     DB_DATABASE=nombre_basedatos
     DB_USERNAME=tu_usuario
     DB_PASSWORD=tu_contraseña
````

5. **Ejecuta las migraciones**

   ```bash
   php artisan migrate
````

6. **Crea el enlace simbólico al almacenamiento**

   ```bash
   php artisan storage:link
````

7. **Inicia el servidor**

   ```bash
   php artisan serve
````

8. Accede desde tu navegador:
   [http://localhost:8000](http://localhost:8000)

````

## Estructura básica de la aplicación

| Archivo / Carpeta                           | Descripción                                                  |
| ------------------------------------------- | ------------------------------------------------------------ |
| `app/Http/Controllers/AlumnoController.php` | Controlador principal del CRUD.                              |
| `resources/views/alumnos/`                  | Vistas Blade de alumnos (`index`, `create`, `edit`, `show`). |
| `resources/views/template/base.blade.php`   | Plantilla base con estilos Bootstrap.                        |
| `storage/app/private`                       | Carpeta donde se guardan las fotos de los alumnos.           |
| `routes/web.php`                            | Definición de rutas principales de la aplicación.            |

````

### Listado de alumnos

* Tarjetas con foto, nombre, correo y botones para ver, editar o eliminar.
 <img width="1248" height="549" alt="image" src="https://github.com/user-attachments/assets/2e13185c-2266-42cc-b939-de56b4dc1191" />


### Perfil individual

* Muestra los datos personales del alumno.
  <img width="1078" height="525" alt="image" src="https://github.com/user-attachments/assets/84a69eb7-d11c-44cb-b259-91a0427d616e" />


### Crear / Editar alumno

* Formularios de registro o edición de CV.

<img width="1361" height="942" alt="image" src="https://github.com/user-attachments/assets/af8f334e-1765-4e9d-a318-a29aa724f3f1" />


````

## Gestión de fotografías privadas

Las imágenes no se almacenan en `public/`, sino en `storage/app/private`.
Esto garantiza que **no sean accesibles directamente** desde la URL pública.

Laravel expone las imágenes de forma controlada mediante una **ruta protegida**:

```php
Route::get('/alumnos/{alumno}/fotografia', [AlumnoController::class, 'mostrarFoto'])
    ->name('alumnos.fotografia');
````

El controlador valida que el archivo exista y lo devuelve con `response()->file()`.

---

## Datos del alumno

Cada registro de alumno incluye:

* Nombre y apellidos
* Correo electrónico
* Teléfono
* Fecha de nacimiento
* Nota media
* Fotografía
* (Opcional) Formación, experiencia y habilidades

---

## Autor

**Desarrollado por:** *ALEJANDRA FERNANDEZ LOPEZ*
**Versión:** 1.0
**Framework:** Laravel 12.x
**Fecha:** * *

---
