### 2Dees
In fulfilment of what should have been the home assignment for the Server Side Scripting Unit. The aim of this project is to gain an understanding of web application development using Laravel and MVC.

#### Steps covered so far
- ```git checkout -b b1-init-proj```
- ```composer create-project laravel/laravel=10 twodeesapp```
- ```sudo mysql -u root -p```
- ```show databases;```
- ```CREATE DATABASE twodeesapp_db;```
- ```CREATE USER 'mandyfarrugia'@'%' IDENTIFIED BY 'password';```
- ```GRANT ALL ON twodeesapp_db.* TO 'mandyfarrugia'@'%';```
- ```FLUSH PRIVILEGES;```
- ```nano /etc/mysql/mariadb.conf.d/50-server.cnf``` then ensure ```bind-address``` is set as follows: ```bind-address = 0.0.0.0```
- Within ```.env```, set the following:
    - ```DB_DATABASE: twodeesapp_db```
    - ```DB_USERNAME: mandyfarrugia```
    - ```DB_PASSWORD: password```