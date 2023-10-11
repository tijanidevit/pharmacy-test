## This repo is a basic test repo. It is a simple task management project built with Laravel

### Setup

-   Pull/Clone the Repo
-   Run `composer install` to install all packages
-   Copy the .env.example file and save as .env
-   Run `php artisan key:generate` to generate the app key
-   Setup the environment (Database and Email) in the .env file => Email will be sent to customers
-   Run `php artisan migrate --seed` to create needed database tables and seed Admin record
-   Run `php artisan storage:link` to link public and storage media
-   Run `php artisan serve` to start the backend service

### Brief Description

#### Admin

-   Can add and view all customers
-   Can add and view all categories
-   Can add and view all products and products sales
-   Can view all partners, their products and sales

#### Customers

-   Customers can either register or be added by the admin
-   Customers can see products and order products
-   Customers can then make payments

#### Partners

-   Can add and view all products and products sales
-   All activities are via a restful endpoints. Postman Details Below

##### Postman Collection

-   [Postman Collection](https://documenter.getpostman.com/)
-   It contains some documentation
-   Please select the dev environment as the active enviroment.

*   The dev environment has two variables:

-   BASE_URL => The API base URL (Set it to the setup Base Url)
-   TOKEN => The auth token. This will be automatically filled after each login request is complete
