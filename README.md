# Integrating CodeIgniter 3.1.9 with Laravel-Mix 2.1.14
### Author Miguel Angel Gutierrez
### MIT License


## Como usar
1. Clonar el repositorio y posicionarse en el con la linea de comandos `cd`.
2. Instalar las dependencias front-end.
```
npm install
```
3. Actualizar el servico `cross-env`. y ajustarlo a nivel global. (solo linux)
```
sudo ln -s /home/users/tmp/ci3-with-laravel-mix/node_modules/cross-env/dist/bin/cross-env.js /usr/local/bin/cross-env
```
4. tambien puedes instalar `cross-env` globalmente en el entorno npm `Environment System Path`. (para windows)
```
npm install -g cross-env

# Comprobar la instalacion globalmente
npm -g list --depth=0

# Asegurese de que cross-env se encuentre en la lista.
```
5. Si no presenta errores podrás ejecutar el comando de produccion y desarrollo.
```
# For development purpose
npm run watch-poll

# For production
npm run prod
```
6. Instalar dependencias del back
```
# Composer
composer install && composer update

7. Establecer la conexion en la BD a través del archivo que se encuentra en el directorio application/config/database.php

['username']
['password']
['database']

8. Efectuar las migraciones que se encuentran en la carpeta migrations del directorio application (para este caso se debe acceder a la url a través del navegador http://project-name/migrate)

/.../