
# Conda Assessment

**Conda Assessment** is a contact form application showcasing a Laravel backend and a Vue.js frontend. Styled with TailwindCSS and fully Dockerized, this project demonstrates modern web development practices and deployment techniques.

## Features

### Frontend

- A responsive contact form with fields for Name, Email, Subject, and Message.
- Client-side validation using Vue.js to ensure all fields are correctly filled.
- Modern and clean user interface styled with TailwindCSS.

### Backend

- A robust Laravel API that handles form submissions.
- Server-side validation for enhanced security and reliability.
- Form data is stored in a MySQL database (`contacts` table).
- Confirmation emails are sent using Mailhog for local testing.
- JSON responses indicate the success or failure of form submissions.
- Includes unit tests to ensure API functionality and reliability.

### Dockerized

- The application is fully Dockerized for easy setup and deployment.
- Docker containers include services for the Laravel backend, Vue.js frontend, MySQL database, and Mailhog for email testing.

## Getting Started

### Prerequisites

Ensure you have the following software installed:

- **Docker**: To containerize the application.
- **Docker Compose**: To manage multi-container Docker applications.

### Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/dceekay/conda.git
   cd conda
   ```

2. **Set Up the Environment**:

   Copy the example environment file and configure it:

   ```bash
   cp backend/.env.example backend/.env
   ```

   Edit the `.env` file in the `backend` directory with your database and email settings.

3. **Install Backend Dependencies**:

   Navigate to the backend directory and install PHP dependencies:

   ```bash
   cd backend
   composer install
   ```

4. **Install Frontend Dependencies**:

   Navigate to the frontend directory and install Node.js dependencies:

   ```bash
   cd ../frontend
   npm install
   ```

5. **Run Migrations**:

   Create the necessary database tables using Laravel migrations:

   ```bash
   docker-compose exec backend php artisan migrate
   ```

6. **Start Docker Containers**:

   Launch the application with Docker Compose:

   ```bash
   docker-compose up -d
   ```

   This command starts the backend, frontend, MySQL, and Mailhog services.

## Usage

- **API Endpoint**: Access the contact form API at [http://localhost:8000/api/contact](http://localhost:8000/api/contact).
- **Frontend**: Interact with the frontend application at [http://localhost:8080](http://localhost:8080).
- **Mailhog**: View sent emails at [http://localhost:8025](http://localhost:8025).

### Testing

- **Run Backend Tests**:

  Verify API functionality with Laravel's unit tests:

  ```bash
  docker-compose exec backend php artisan test
  ```

## Project Structure

- **`backend/`**: Contains the Laravel backend application.
- **`frontend/`**: Contains the Vue.js frontend application.
- **`docker-compose.yml`**: Manages Docker containers for the application.

## Contributing

Contributions are welcome! To contribute:

1. Fork this repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
```
