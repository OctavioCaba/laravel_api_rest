# API REST con Laravel
API REST desarrollada con Laravel y MariaDB.

## ¿Cómo lo ejecuto en local?
Necesitarás tener instalado `Node.js` y tener acceso a una terminal para seguir los siguientes pasos:
<br />
``npm i`` => instalar las dependencias en la carpeta raíz del proyecto.
<br />

## Base de datos
Además deberás contar con algún paquete de software para levantar un servidor con base de datos `SQL` o `MariaDB`. Por ejemplo: `XAMPP`, `WAMP`, `LAMP` o alguno similar.<br />
Luego de iniciar los módulos de `Apache` y `MySQL` abrir el navegador y, en la barra de direcciones, escribir `localhost/phpmyadmin/`.<br />
Una vez en la página, crear una base de datos llamada `laravel_api_rest` - `utf8_general_ci`.
<br />

## Variables de entorno
Crear un archivo `.env` dentro de la carpeta raíz con la siguiente estructura:
<br />
`
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:jt8tBXfB343PSaAkgzrKaAiwVGOhgNsNLUJ3oIDmS54=
APP_DEBUG=true
APP_URL=http://laravel_api_rest.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api_rest
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
`
<br />

## Migraciones e inserciones en la base de datos
Abrir la consola y ejecutar el siguiente comando
<br />
``php artisan migrate --seed`` => realizamos las migraciones y seeds en la base de datos.
<br />

:warning: Ejecutar el siguiente paso **SÓLO** si ya has completado los pasos `Base de datos`, `Variables de entorno` y `Migraciones e inserciones en la base de datos` :warning:<br />
<br />
`php artisan serve` => levantamos el servicio.
<br />

## Probar servicios de API
### Con Visual Studio Code
Instalar la extensión `[REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client)`. Luego abrir los archivos `[authorsRequests.rest](./authorsRequests.rest)`, `[booksRequests.rest](./booksRequests.rest)` y `[genresRequests.rest](./genresRequests.rest)`, y ejecutar las peticiones HTTP que desees.
<br />

### Sin Visual Studio Code
Instalar un programa que permita realizar peticiones HTTP como `Postman` o `Insomnia`, luego realizar las peticiones que aparecen en los archivos `[authorsRequests.rest](./authorsRequests.rest)`, `[booksRequests.rest](./booksRequests.rest)` y `[genresRequests.rest](./genresRequests.rest)`.
<br />

### Créditos
Proyecto enteramente diseñado y desarrollado por [Octavio Caba](https://octaviocaba.github.io/portafolio/).
