

# Final Year Project Management System (FYPMS)

A web-based application built with Laravel to manage final year projects for students and advisors. This system facilitates communication, project tracking, and document management.

## Features

- User authentication and authorization
- Role-based access control (Student, Advisor, Admin)
- Project assignment and tracking
- Discussion forum for project-related communication
- Notification system for important updates
- File upload and management for project documents
- Dashboard for project status overview

## Requirements

- PHP 8.0 or higher
- Composer
- Node.js and npm
- MySQL or other supported database

## Installation

1. **Clone the repository**
   ```sh
   git clone https://github.com/naolasis/Final-Year-Project.git
   cd Final-Year-Project
   ```

2. **Run database migrations**
   ```sh
   php artisan migrate
   ```

3. **Seed the database (optional)**
   ```sh
   php artisan db:seed
   ```

4. **Start the development server**
   ```sh
   php artisan serve
   ```
   The application will be accessible at `http://localhost:8000`.

## Usage

- Register as a new user or log in with existing credentials.
- Depending on your role, access different functionalities such as project management, forum discussions, and notifications.
- Admins can manage users and projects through the admin dashboard.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.

## License

This project is open-source and licensed under the [MIT license](LICENSE).

## Contact

If you have any questions or suggestions, feel free to open an issue or contact the project maintainers.

---

Thank you for using the Final Year Project Management System! We hope it helps make your project management process smoother and more efficient.
```
