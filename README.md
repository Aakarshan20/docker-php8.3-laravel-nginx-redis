## how to use

***You have to install docker, docker-compose first!***

#### install
```
# docker-compose up -d
```

#### check result 
```
# docker ps
```
```
CONTAINER ID   IMAGE                                  COMMAND                   CREATED          STATUS          PORTS                                                           NAMES
05827a19b604   nginx                                  "/docker-entrypoint.…"   10 minutes ago   Up 10 minutes   0.0.0.0:80->80/tcp, :::80->80/tcp                               laravel-nginx
f72cc06d8427   dockerphp83laravelnginxredis_laravel   "docker-php-entrypoi…"   10 minutes ago   Up 10 minutes   0.0.0.0:9000-9010->9000-9010/tcp, :::9000-9010->9000-9010/tcp   laravel-app
1ccf657b64d4   redis                                  "docker-entrypoint.s…"   10 minutes ago   Up 10 minutes   0.0.0.0:6379->6379/tcp, :::6379->6379/tcp                       laravel-redis
9a4b75cbf908   mysql:8                                "docker-entrypoint.s…"   10 minutes ago   Up 10 minutes   0.0.0.0:3306->3306/tcp, :::3306->3306/tcp, 33060/tcp            laravel-mysql
```

#### go to the laravel container

```
#docke exec -it laravel-app bash
```

### copy .env

```
# cp .env.example .env
```

### install vendor

```
# composer install
```

### change permissions 

```
# chmod 777 -R storage
```
### add key
```
# php artisan key:generate
```

### migrate

```
# php artisan migrate
```
 
