### Vue.js and Laravel App
This project is a web application built with Vue.js on the frontend and Laravel on the backend. It is designed to showcase a simple CRUD operation with a MySQL database.

## Prerequisites
Node.js
Vue.js
Laravel
## Installation
 - Clone the repository: git clone https://github.com/your-username/vue-laravel-app.git
 - Install dependencies:
 - Navigate to the frontend directory: cd vue-laravel-app/frontend and run npm install
 - Navigate to the backend directory: cd vue-laravel-app/backend and run composer install
 - Set up your database:
 - Create a new MySQL database.
 - Copy the .env.example file to a new file called .env in the backend directory.
 - In the .env file, update the DB_DATABASE, DB_USERNAME, and DB_PASSWORD values to match your MySQL database.
 - Run migrations and seed the database:
 - Navigate to the backend directory: cd vue-laravel-app/backend
 - Run php artisan migrate
 - Run php artisan db:seed
## Start the servers:
 - Navigate to the frontend directory: cd vue-laravel-app/frontend and run vite
 - Open a new terminal window and navigate to the backend directory: cd vue-laravel-app/backend and run php artisan serve
 - Open your browser and navigate to http://localhost:5173 to view the app.
## Usage
The app has a simple interface that allows you to view, create, edit posts and view comments. the Laravel API have all CRUD operations for posts and comments.