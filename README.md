If you wnat to run the docker server 
=== 
intall docker desktop and run these commands:
1. create the net:
	``` shell script 
    docker network create ideaware_net
    ```
2. run the php server:
    ``` shell script 
    docker-compose -f ./docker/php/docker-compose.yaml up -d
    ```
3. run web server:
    ``` shell script 
    docker-compose -f ./docker/web/docker-compose.yaml up -d
    ```
4. run mysql server
    ``` shell script 
    docker-compose -f ./docker/mysql/docker-compose.yaml up -d
    ```
5. run migrate
    ``` shell script 
    php artisan migrate
    ```
6. run seed
    ``` shell script 
    php artisan db:seed
    ```