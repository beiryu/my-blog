# Laravel Blog

## Table of Contents

- [Description](#description)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Docker Setup](#docker-setup)
- [Contributing](#contributing)
- [License](#license)

## Description

This Laravel Blog is a web application that allows users to create, read, update, and delete blog posts. It's built using the Laravel framework, providing a robust and scalable foundation for a blogging platform.

## Features

- User authentication and authorization
- CRUD operations for blog posts
- Categorization of blog posts
- Responsive design
- Docker support for easy development and deployment

## Requirements

- PHP 7.3 or higher
- Composer
- Node.js and NPM
- Docker and Docker Compose (optional, for containerized setup)

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/beiryu/laravel-blog.git
   cd laravel-blog
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install JavaScript dependencies:
   ```
   npm install
   ```

4. Copy the example environment file and modify it according to your needs:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Run database migrations:
   ```
   php artisan migrate
   ```

7. Seed the database (optional):
   ```
   php artisan db:seed
   ```

## Usage

1. Compile assets:
   ```
   npm run dev
   ```

2. Start the development server:
   ```
   php artisan serve
   ```

3. Visit `http://localhost:8000` in your web browser.

## Docker Setup

This project includes a Docker configuration for easy development and deployment. To use Docker:

1. Make sure you have Docker and Docker Compose installed on your system.

2. Build and start the containers:
   ```
   docker-compose up -d
   ```

3. The application will be available at `http://localhost`.

For more details on the Docker setup, refer to the `docker-compose.yml` file


## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the MIT license. See the LICENSE file for more details.
