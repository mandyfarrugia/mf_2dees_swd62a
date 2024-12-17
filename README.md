# 2Dees
Focal point at this stage is to create a Laravel project and set up a database along with a user to whom access privileges will be granted. 

#### Steps covered so far
- ```git checkout -b b1-init-proj```
- ```composer create-project laravel/laravel=10 twodeesapp```
- Switch to another bash terminal and type ```sudo mysql -u root -p```
- ```show databases;```
- ```CREATE DATABASE twodeesapp_db;```
- ```CREATE USER 'mandyfarrugia'@'%' IDENTIFIED BY 'password';```
- ```GRANT ALL ON twodeesapp_db.* TO 'mandyfarrugia'@'%';```
- ```FLUSH PRIVILEGES;```
- Open another bash terminal and type ```nano /etc/mysql/mariadb.conf.d/50-server.cnf``` then ensure ```bind-address``` is set as follows: ```bind-address = 0.0.0.0```
- Within ```.env```, set the following:
    - ```DB_DATABASE: twodeesapp_db```
    - ```DB_USERNAME: mandyfarrugia```
    - ```DB_PASSWORD: password```