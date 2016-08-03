# Docker php-fpm init project

Docker initial environment
## Feature:

* Ubuntu 16.04
* Git
* PHP 7.0
* Nginx
* MySQL
* MariaDB
* Postgres
* Composer
* Node (With PM2, Bower, Grunt, and Gulp)
* Redis
* Memcached
* Beanstalkd


## Installation
### Requirement
To build docker container require your machine has installed:

1. `git`
2. `docker`
   * [Docker install] (https://docs.docker.com/engine/installation/linux/ubuntulinux/)
3. `docker-compose`
    * [Docker compose install] (https://docs.docker.com/compose/install/) 


###  Installation and config
You follow step by step:

1. Clone source from github:
    * `cd ~`
    * `git clone https://github.com/datnq201088/docker-init-project.git web`

2. Enter `web` directory, start docker container you need:
    * `cd ~/web`
    * `docker-compose  up -d nginx mysql memcached`
    * List container you can start:
        - `nginx, php-fpm, mysql,memcached, mariadb, postgres, redis, mongo, beanstalkd, workspace`
    * Notice: container `php-fpm, workspace` always start in all of case  
        
3. Your project code located in folder `src`
   
4. Customize nginx config if you want. They located in directory `nginx`:

 * `site.conf`
 * `nginx.conf`
     
5. Remember update your hosts:
    * `127.0.0.1 docker.dev` in `/etc/hosts` (Ubuntu)

6. Connect database of project
    * Update `hostname` database  by service name docker compose: `mysql, mariadb, redis, memcached, mongo`
    * `username, password, database name` you can get from  `environment` variables that you set from service `php-fpm` in file `docker-compose.yml`
    * Example config in Codeigniter:
    ```php

        $db['default'] = array(
            'dsn'   => '',
            'hostname' => 'mysql', // service name 
            'username' => getenv('MYSQL_USER'),
            'password' => getenv('MYSQL_PASSWORD'),
            'database' => getenv('MYSQL_DATABASE'),
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE,
        );
    ```


7. Enter container `workspace`  to work
   This is container you run comand: `npm, gulp, grunt, bower, composer ` to install all packages, dependencies.
   * You get container name:
   
        * `docker ps `
  * SSH container `workspace`
  
        * `docker exec -it web_workspace_1 bash`

8. Open your browser: `http://docker.dev`. It works fine! 


### Update and customize

1. You can edit `docker-compose.yml` and `Dockerfile` in folder services

2. Build container and start:
   Rebuild all container
    *   `docker-compose stop`
    *   `docker-compose build  --no-cache` 
    
   You can build only edited container:
    *   `docker-compose build php-fpm`

   Start all container: 
    *   `docker-compose up -d nginx mysql ... ` 

