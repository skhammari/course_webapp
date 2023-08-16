Here is a README.md file for the coding assignment with PHP, dependency injection, MVC, SOLID principles, Twig, Docker,
and .env:

# Course Management Application

This is a simple course management application built with PHP, dependency injection, MVC architecture, and Twig
templates.

## Features

- List courses
- Add new courses
- Basic routing

## Usage

The application uses Docker to run.

Clone the repository:

```
git clone https://github.com/skhammari/course_webapp.git
```

### Build and run:

```
cd docker &&
docker compose up -d
``` 

### Install dependencies:

```
docker compose exec app
composer install
```

The application will be available at http://localhost.

The `.env` file contains configuration like database credentials.

## Structure

- `docker/` - docker files
- `src/` - PHP application code
    - `app/` - Main Application code
        - `Core/` - Core application code
            - `Controllers/` - Controllers
            - `Exceptions/` - Custom exceptions
            - `Router.php` - Router
            - `View.php` - View
        - `Models/` - Models
        - `Repositories/` - Repositories
    - `public/` - public files
    - `views/` - Twig template files

The application follows MVC structure with separation of concerns between model, view, and controller. Dependency
injection is implemented in `Container.php` to wire up dependencies.

## Next Steps

If I had more time, here are some improvements I would focus on:

- Add test coverage
- Implement a more robust dependency injection container
- Add input validation
- Add authentication and authorize routes
- Extract templates into separate Twig files
- Improve styling and UI
- Add database migrations
- Containerize database

## License

MIT