# todo_listedinc_laravel
Simple Todo listing app created using Laravel framework

Clone the repository using below preffered way

Using SSH
```
git@github.com:sanjayparmar277/todo_listedinc_laravel.git
```

OR 

Using HTTPS
```
https://github.com/sanjayparmar277/todo_listedinc_laravel.git
```

OR 

Using GIT CLI
```
gh repo clone sanjayparmar277/todo_listedinc_laravel
```
After cloning done Switch to the repo folder 

```
cd todo_listedinc_laravel
```

Install all the dependencies using composer
```
composer install
```

Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```

Generate a new application key
```
php artisan key:generate
```

Run the database migrations <b>(Set the database connection in .env before migrating)</b>
```
php artisan migrate
```

Start the local development server
```
php artisan serve
```
You can now access the server at http://localhost:8000
