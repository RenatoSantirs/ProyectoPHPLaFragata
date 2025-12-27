##Descripción del Proyecto

Este proyecto es una aplicación web desarrollada utilizando PHP, MySQL, JavaScript, HTML y CSS, orientada a la gestión de datos mediante interfaces web dinámicas, con control de acceso basado en roles y permisos.
La aplicación implementa un CRUD completo para múltiples módulos, tales como Categorías, Empleados, Productos, Usuarios, entre otros, garantizando una administración eficiente y segura de la información. Las operaciones CRUD se realizan mediante AJAX para una experiencia de usuario fluida y sin recargas de página.

**Tecnologías y Herramientas Utilizadas**
Backend: PHP
Base de Datos: MySQL
Frontend: HTML5, CSS3, JavaScript
Frameworks y Librerías:
Bootstrap (diseño responsivo)
jQuery (manipulación del DOM y AJAX)
SweetAlert2 (alertas personalizadas)
Input Mask (validación y formato de campos)
Bootstrap Slider
Bootstrap WYSIWYG Editor
jQuery UI
jVectorMap (mapas interactivos)
Pace.js (indicadores de carga)
Timepicker (selección de tiempo)

**Funcionalidades Clave**

*Autenticación de usuarios*

*Gestión de roles y permisos*

*Interfaces amigables y responsivas*

*Validaciones del lado del cliente y servidor*

*Estructura modular y escalable*

##Autor

**Renato Jesus Santiago Sedano**
* [Linkedin] [www.linkedin.com/in/renato-santiago-sedano]

* [Gmail] [renatojesussantiago98@gmail.com]

##Recursos / Agradecimientos
Este proyecto fue desarrollado con la ayuda del tutorial *Tutoriales a tu alcance* del Video de [Juan Fernando Urrego/Tutoriales a tu alcance].

##Instalación
Para usarlo en Ubuntu es necesario descargar MySQL y subir la base de datos
El usuario administrador es el siguiente:
usuario: admin
contraseña: 12345
Si tienen problemas con conectarse es probable que sea porque el nombre de ingreso a MySQL es diferente al de usted.
Para arreglarlo es necesario cambiar lo siguiente:
modelos/conexion.php
$link = new PDO("mysql:host=localhost;dbname=fragatainventario",
			            "root", #cambiar por su usuario de MySQL
			            "root"); #cambiar por su contraseña de MySQL

##Contratación

Si desea contratarme puede escribirme en renatojesussantiago98@gmail.com para consultas
