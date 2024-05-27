# Laravel API Deployment Guide

This guide provides instructions for deploying a Laravel project that serves as an API, including database migrations and seeding, along with a Postman collection for testing.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP
- Composer
- PostgreSQL
- Postman (for testing)

## Getting Started

1. Clone the repository to your local machine

2. Navigate to the project directory

3. Install project dependencies: composer install

4. Copy the `.env.example` file and rename it to `.env`: cp .env.example .env

5. Configure your `.env` file with your PostgreSQL database credentials

6. Generate the application key

7. Run database migrations and seed the database: php artisan migrate --seed


## Testing the API

To test the API endpoints, you can use the provided Postman collection. Import the collection into your Postman application and set up the environment variables accordingly.

### Postman Collection

You can find the Postman collection in the postman_collection.json directory. Import the collection into Postman and set up the following environment variables:

- `base_url`: The base URL of your Laravel application (e.g., http://localhost:8000)

### Environment Variables

Make sure to set up the following environment variables in Postman:

- `base_url`: The base URL of your Laravel application (e.g., http://localhost:8000)

## Running the Application

To run the Laravel application locally, use the following command: php artisan serve


By default, the application will be available at `http://localhost:8000`.

## Additional Information

For more information on Laravel, please refer to the [official documentation](https://laravel.com/docs).

