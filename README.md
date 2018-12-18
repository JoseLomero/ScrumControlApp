# ScrumControlApp

## Tabla de contenidos
1. [Participantes](#participantes)
    1. [Sprint 1](#sprint1)
    2. [Sprint 2](#sprint2)
2. [Archivo SQL](#sql-data)
    1. [Acceso a la base de datos](#acceso-bd)
3. [Usuarios y contraseñas](#user-pass)
    1. [Developer](#dev)
    2. [Product Owner](#po)
    3. [Scrum Master](#sm)

## Participantes <a name="participantes"></a>

### Sprint 1 <a name="sprint1"></a>

El equipo está formado por:
- José Manuel Lomero - https://github.com/JoseLomero
- Josep Sort - https://github.com/nilarrus

### Sprint 2 <a name="sprint2"></a>

El equipo está formado por:
- José Manuel Lomero - https://github.com/JoseLomero
- Josep Sort - https://github.com/redgat


## Archivo SQL <a name="sql-data"></a>

[Aqui](https://github.com/JoseLomero/ScrumControlApp/blob/desarrollo/ScrumControlBD.sql) puedes encontrar el archivo SQL para la base de datos.

### Acceso a la base de datos <a name="acceso-bd"></a>

Hay que crear un usuario llamado "*boss*" con la contraseña "*1234*" para poder acceder a la base de datos. Alternativamente, también se puede editar el archivo ```config.php``` y reemplazar a *boss* y *1234* por el usuario y contraseña deseados:

``` php
define('DB_USERNAME', 'boss'); // cambiar a boss por el otro usuario
define('DB_PASSWORD', '1234'); // cambiar 1234 por la contraseña
```


## Usuarios y contraseñas <a name="user-pass"></a>
Los usuarios se dividen en tres grupos según sus permisos sobre las funciones que podrán hacer en la aplicación y por tanto qué permisos tendrán. Estos son *Developer* (0), *Product Owner* (1) y *Scrum Master* (2).

### Developer <a name="dev"></a>

| Usuario | Contraseña |
|---|---|
| Jose | 1234 |
| Nil | 1234 |
| Pop | 1234 |

### Product Owner <a name="po"></a>

| Usuario | Contraseña |
|---|---|
| Enric | 1234 |

### Scrum Master <a name="sm"></a>

| Usuario | Contraseña |
|---|---|
| Leandro | 1234 |