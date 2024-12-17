# 2Dees
The aim of this branch is to manipulate the database by means of ORM (object relational mapping). Tables will be created by means of issuing migrations. Attributes within tables will be created within migration files.

#### Steps covered so far
- ```php artisan migrate:install```
- ```php artisan migrate```
- ```php artisan make:migration create_categories```
- ```php artisan migrate``` (Use ```php artisan migrate:rollback``` to rollback any changes)
- ```sudo mysql -u root -p```
- ```use twodeesapp_db;```
- ```show tables;```
- Within ```schema::create...```:
    - ```$table->string('<attribute name>')``` (Replace ```<attribute name>``` with name of attribute according to requirements).
    - Append ```->nullable()``` to attribute definition to render attribute nullable.