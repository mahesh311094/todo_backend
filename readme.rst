###################
Backend Developed in PHP (CodeIgniter framework)
###################

1) Clone the repository in the root directory (For xampp htdocs and for wamp www) or Download the repository and extract the zip then copy "ToDo" folder and Paste into the root directory (For xampp htdocs and for wamp www).
2) Start your Xampp/Wamp server then open your browser and write http://localhost/phpmyadmin
3) Create a database "todo" 
4) Import SQL file todo.sql (Path: ToDo/database)

If you want to deploy on the server then you need to change the following files (Path: ToDo/application/):
1) config.php: Change base_url with your server path
2) database.php: Change username, password, and database with yours.