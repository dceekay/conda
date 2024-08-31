<p align="center"> </p>

<p align="center">
    <a href="https://github.com/dceekay/conda/actions"><img src="https://github.com/dceekay/conda/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://github.com/dceekay/conda"><img src="https://img.shields.io/github/stars/dceekay/conda" alt="Stars"></a>
    <a href="https://github.com/dceekay/conda"><img src="https://img.shields.io/github/license/dceekay/conda" alt="License"></a>
</p>

## About the Project

This project is a simple contact form application built with a Laravel back-end and a Vue.js front-end. It's styled with TailwindCSS and set up using Docker for easy deployment.

### Features

- **Frontend**: A user-friendly contact form with client-side validation using Vue.js.
- **Backend**: A Laravel API that handles form submissions, validates data, stores it in a database, and sends emails via Mailhog.
- **Dockerized**: The entire environment, including MySQL and Mailhog, is set up with Docker for easy local development.

## Getting Started

### Prerequisites

- **PHP 8.x**: Required for the Laravel back-end.
- **Node.js & npm**: Required for the Vue.js front-end.
- **Composer**: PHP dependency management.
- **Docker & Docker Compose**: To run the application in a containerized environment.

### Installation

#### Clone the Repository

```bash
git clone https://github.com/dceekay/conda.git
cd conda
Set Up the Environment
bash
Copy code
cp .env.example .env
Configure the .env file with your database and mail settings.

Install Dependencies
Backend (Laravel):

bash
Copy code
composer install
Frontend (Vue.js):

bash
Copy code
cd frontend
npm install
Run Migrations
bash
Copy code
php artisan migrate
Run the Docker Containers
bash
Copy code
docker-compose up -d
Access the Application
API: http://localhost:8000/api/contact
Frontend: http://localhost:8080
Mailhog: http://localhost:8025
Testing
Run Backend Tests
bash
Copy code
php artisan test
Validate Frontend
Test the form in your browser at http://localhost:8080.
