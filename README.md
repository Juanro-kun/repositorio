<<<<<<< HEAD
# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
=======
<p align="center">
  <img src="./assets/facena.png" alt="Logo de FACENA" width="100"/>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/CodeIgniter-EE4623?style=for-the-badge&logo=codeigniter&logoColor=white"/>
  <img src="https://img.shields.io/badge/UNNE-Taller_de_Programación_I-blue?style=for-the-badge"/>
  <img src="https://img.shields.io/badge/Estado-EnCurso-black?style=for-the-badge"/>
</p>

# 🐲 La Taberna del Gnomo Errante - Ecommerce D&D (UNNE 2025)

Bienvenido al repositorio del **Proyecto Integrador** de la materia **Taller de Programación I** (FaCENA - UNNE).  
Aquí encontrarás el código completo de un **ecommerce temático** inspirado en el universo de **Calabozos y Dragones**, donde la fantasía se encuentra con el desarrollo web.

> ¿Necesitás dados mágicos, pócimas, grimorios o miniaturas para tu próxima campaña? ¡Esta tienda lo tiene todo!

---

## 📦 Estructura del Repositorio

| Carpeta/Archivo       | Descripción |
|----------------------|-------------|
| `app/`               | Lógica principal del sistema (MVC - CodeIgniter) |
| `public/`            | Archivos públicos: imágenes, estilos y scripts |
| `app/Controllers/`   | Controladores del frontend y backend admin |
| `app/Models/`        | Modelos que conectan con la base de datos |
| `app/Views/`         | Vistas del catálogo, carrito, panel admin y más |
| `app/Database/`      | Migraciones y seeds de la base de datos |
| `README.md`          | Documentación del proyecto (este archivo) |

---

## 🚀 Funcionalidades principales

### ⚔️ Frontend épico
- Página de inicio con productos destacados
- Sección “Quiénes Somos” y “Comercialización”
- Catálogo navegable por categorías
- Carrito dinámico y checkout funcional
- Estética medieval responsive con Bootstrap 5

### 🧙 Backend poderoso
- Panel de administración con gestión de productos, stock y usuarios
- CRUD completo con carga de imágenes
- Sistema de roles (admin/cliente)
- Alertas de stock bajo y pedidos recibidos

> [!TIP]
> Todo el sistema fue construido respetando el patrón MVC usando CodeIgniter 4.3.2.

---

## 🧰 Tecnologías utilizadas

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/CodeIgniter-EE4623?style=for-the-badge&logo=codeigniter&logoColor=white"/>
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white"/>
</p>

---

## 🏆 Proyecto Integrador - Taller de Programación I

Este proyecto representó la culminación de los contenidos de la materia:

✅ Uso correcto del framework CodeIgniter y patrón MVC  
✅ Modelado relacional de base de datos y relaciones entre entidades  
✅ Diseño responsive y temático  
✅ Separación clara entre lógica, presentación y persistencia  

> [!IMPORTANT]
> Se priorizó la escalabilidad, la reutilización de componentes y la experiencia de usuario.

---

## 📌 Notas finales

- Proyecto desarrollado en 2025 como parte de la cátedra de **Taller de Programación I (FaCENA - UNNE)**.
- Pensado para ser un proyecto funcional, expandible y divertido.
- Ideal para mostrar habilidades de desarrollo backend y frontend integradas.

---

<p align="center"><b>⚔️ Desarrollado con pasión, lógica y una pizca de magia por Tobias y Juan</b></p>
>>>>>>> prueba-catalogo

