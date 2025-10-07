## About

This is a laravel project which provides crud apis for managing users.

## Requirements
- PHP >= 8.1
- Composer
- MySQL or any other database supported by Laravel
- Web server (Apache, Nginx, etc.)

## Instructions
 - Create .env file with all the necessary configurations like database connection, APP_KEY, jwt secret etc.
 - Run `composer install` to install all the dependencies.
 - Run `php artisan migrate` to create the necessary database tables.
 - Configure the web server as per https://laravel.com/docs/12.x/deployment#server-configuration

## Apis
 - `POST /api/login` - Login and get a JWT token. The default expire time for token is one hour.
 - `GET /api/users` - Get a list of all users (requires authentication).
 - `GET /api/users/{id}` - Get details of a specific user by ID (requires authentication).
 - `PATCH /api/users/{id}` - Update a specific user by ID (requires authentication).
 - `DELETE /api/users/{id}` - Delete a specific user by ID (requires authentication).
- `POST /api/refresh` - Refresh the JWT token (requires authentication). The default refresh time is one hour after expiry.
 - `POST /api/logout` - Logout the user (requires authentication).

For Apis that require authentication, include the JWT token in the Authorization header as follows:
``` Bearer {JWT_TOKEN} ```

## Code Quality
This project also includes PHPSTAN that can be ran using the command `vendor/bin/phpstan analyse app` to check for any code quality issues.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
