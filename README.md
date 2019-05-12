# PollaCopaAmerica

Trabajo de Diseño y Analisis de Software | Universidad EIA ![logo eia](https://github.com/EIA-University/LogosEIA/blob/master/assets/png/logo-eia-icon.png?raw=true)
Software para la organizacion de la polla de la Copa America. Desarrollado para la clase de Analisis y Diseño de Software.


## Requerimientos
* Laravel | [https://laravel.com](https://laravel.com)
* Laragon | [https://laragon.org](https://laragon.org)
* Mysql Workbench | [https://www.mysql.com/products/workbench/](https://www.mysql.com/products/workbench/)
* Sequel Pro |   [https://www.sequelpro.com](https://www.sequelpro.com)


## Importar Un Proyecto
para correr el proyecto:

1. bajar las dependecias de php con composer
    ```
    composer install
    ```
2. bajar las depedencias de frontend con npm 
    ```
    npm install
    ```
4. crear sus variables de entorno 
    ```
    cp .env.example .env
    ```
5. Generar la llave de encritapción 
    ```
    php artisan key:generate
    ```
6. Configurar la BD local acorde a su entorno de desarrollo (En el archico .env  cambiar las variables de entorno)
    ```
    .....

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=root
    DB_PASSWORD=secret
    
    ....

    ```

7. Migrar la base de datos y popular sus tablas
    ```
    php artisan migrate --seed
    ```

## Uso
 para correr el servidor: 
 ```
 php artisan serve
 ```



## Recursos
* laracast | [https://laracasts.com](https://laracasts.com)
* importar proyecto | [https://devmarketer.io](https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/)
* fontawesome | [https://fontawesome.com/icons?d=gallery&q=plus&m=free](https://fontawesome.com/icons?d=gallery&q=plus&m=free)
* boostrap theme | [https://startbootstrap.com/previews/sb-admin-2/](https://startbootstrap.com/previews/sb-admin-2/)
* boostrap docs | [https://getbootstrap.com/docs](https://getbootstrap.com/docs/4.3/getting-started/introduction/)
* chartjs   |  [https://www.chartjs.org/docs/latest/](https://www.chartjs.org/docs/latest/)



