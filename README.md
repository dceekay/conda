Conda - Contact Form Application
Overview
Welcome to the Conda project! 🎉 This is an exciting opportunity to showcase my skills with a simple yet powerful contact form application built with a Laravel back-end and a Vue.js front-end. This project is styled using TailwindCSS, with Docker to make the setup a breeze. Let's dive in!

Getting Started
1. Setting Up the Backend (Laravel)
Prerequisites
Before you start, make sure you have these installed:

PHP 8.x: The backbone of the Laravel application.
Composer: For managing PHP dependencies.
Docker & Docker Compose: To easily run the application in a containerized environment.
Installation Steps
Clone the Repository

Start by cloning the project repository and navigating into the project directory:
bash
Copy code
git clone https://github.com/dceekay/conda.git
cd conda
Configure Your Environment

Copy the example environment file and make the necessary adjustments:
bash
Copy code
cp .env.example .env
Open .env and configure your database, mail settings, and other environment variables.
Install PHP Dependencies

Install the required PHP packages using Composer:
bash
Copy code
composer install
Run Migrations

Set up your database tables by running the migrations:
bash
Copy code
php artisan migrate
Start the Docker Containers

Spin up the Docker containers to run the Laravel application along with MySQL and Mailhog:
bash
Copy code
docker-compose up -d
Access the Backend

Your Laravel API is now running! You can access it at:
API: http://localhost:8000/api/contact
Mailhog (for email testing): http://localhost:8025
2. Setting Up the Frontend (Vue.js)
Prerequisites
To run the front-end, make sure you have:

Node.js & npm: Essential for managing front-end dependencies and running the development server.
Installation Steps
Navigate to the Frontend Directory

Head over to the Vue.js front-end directory:
bash
Copy code
cd /path/to/contact-form
Install Node Dependencies

Use npm to install all necessary packages:
bash
Copy code
npm install
Run the Development Server

Start the development server and see the magic happen:
bash
Copy code
npm run serve
Access the Frontend

The front-end application will be accessible at:
Frontend: http://localhost:8080
3. Testing Your Application
Backend Testing
To ensure everything is working as expected on the back-end, run the Laravel test suite:
bash
Copy code
php artisan test
Frontend Testing
You can manually test the contact form functionality by interacting with it through the browser.
Docker Setup
This project is Docker-ready, with a Dockerfile and docker-compose.yml included to make your life easier. With Docker, you can get the Laravel back-end, MySQL database, and Mailhog email testing service up and running in no time.

Conclusion
I'm excited to share this project, and I hope it meets the expectations! This setup provides a seamless development experience with a full-stack Vue.js and Laravel application. If there's anything else you'd like to see or any improvements that can be made, I'm all ears. Here's to hoping for success with this task! 🤞
