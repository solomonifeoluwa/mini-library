Mini Library System - README
📚 Features
Authentication

User registration and login via API and traditional form.

Protected routes using Laravel Sanctum.

RESTful API (mobile/client):

Register, login, list/filter books, borrow, return, and view borrowed books.

Admin Views (server-rendered):

Manage users and books.

View borrowing statistics by month.

Bonus Features:

Return books via API and admin views.

Filter books by author or availability.

Track basic user activity with borrowing logs.

🧰 Tech Stack
Laravel 10

Blade (with optional Bootstrap or Tailwind)

Laravel Sanctum (API auth)

MySQL

🚀 Setup Instructions
1. Clone the Repository
bash
Copy
Edit
git clone <https://github.com/solomonifeoluwa/mini-library.git>
cd mini-library
2. Install Dependencies
bash
Copy
Edit
composer install
npm install && npm run dev
3. Configure Environment
bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Edit .env and set your database credentials.

4. Migrate and Seed
bash
Copy
Edit
php artisan migrate:fresh --seed
This will seed:

A test admin user:

Email: admin@example.com

Password: password

Sample users and books

🔑 API Endpoints
Base URL: /api


Method	Endpoint	Description
POST	/register	Register a new user
POST	/login	Log in and receive token
GET	/books	List books with filters
POST	/borrow	Borrow a book
POST	/return	Return a book
GET	/my-borrows	View books borrowed by user
Authentication:
Use Bearer Token in headers for protected routes.

makefile
Copy
Edit
Authorization: Bearer <your_api_token>
🧪 Testing with Postman
Log in via POST /api/login using:

Email: admin@example.com

Password: password

Copy the token from the response.

Set the token in your request headers:

makefile
Copy
Edit
Authorization: Bearer <token>
Test the endpoints: /api/books, /api/borrow, etc.

🖥️ Admin Panel
Access the admin interface via browser:

bash
Copy
Edit
http://localhost:8000/login
Log in with:

Email: admin@example.com

Password: password

Admin capabilities:

Add/edit/delete books

Manage users

View monthly borrowing statistics

Track borrowed/returned books

📁 Folder Structure (Simplified)
pgsql
Copy
Edit
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   └── Admin/
├── Models/
database/
├── migrations/
├── seeders/
resources/
├── views/
routes/
├── api.php
└── web.php
📌 Notes
All borrowing data is tracked via a borrowings table.

Each borrowing record is timestamped and linked to user and book.

Admin views use Blade, styled optionally with Bootstrap/Tailwind.

API responses are JSON and support pagination and filtering.
