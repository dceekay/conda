# Conda Challenge - Contact Form API

This repository contains a simple contact form built with Vue.js on the frontend and a Laravel API backend. The project is dockerized for easy setup and includes features like form validation, email sending, and basic error handling.

## Features

- **Vue.js**: Modern JavaScript framework for building the frontend.
- **Laravel**: PHP framework for the backend API.
- **TailwindCSS**: Utility-first CSS framework for styling.
- **Docker**: Containerization for easy setup.
- **MailHog**: Email testing tool used for capturing and viewing emails sent by the application.

## Prerequisites

Make sure you have the following installed:

- Docker and Docker Compose
- Node.js and npm
- PHP and Composer

## Setup

### Backend (Laravel API)

1. Clone the repository:

   ```bash
   git clone https://github.com/dceekay/conda.git
   cd conda
Build and start the Docker containers:

bash
Copy code
docker-compose up --build
Run migrations to set up the database:

bash
Copy code
docker-compose exec app php artisan migrate
If needed, seed the database:

bash
Copy code
docker-compose exec app php artisan db:seed
Your Laravel API should now be running at http://localhost:8000.

Frontend (Vue.js)
Navigate to the frontend directory:

bash
Copy code
cd frontend
Install the dependencies:

bash
Copy code
npm install
Start the development server:

bash
Copy code
npm run serve
Open your browser and go to http://localhost:8080 to view the application.

Usage
Contact Form: Fill out the form and submit. The data will be validated, saved to the database, and an email will be sent using MailHog.
MailHog: Access MailHog's web interface at http://localhost:8025 to view sent emails.
Testing
To run the tests for the Laravel API:

bash
Copy code
docker-compose exec app php artisan test
Contributing
If you'd like to contribute, please fork the repository and make changes as you'd like. Pull requests are warmly welcome.

License
This project is licensed under the MIT License.