# 📚 Library Management System (Laravel + MySQL)

A simple backend-only CRUD application for managing books, members, and borrowed books using **Laravel** and **MySQL**.  
This project supports Create, Read, Update, and Delete operations for all entities with RESTful API routes.

---

## ⚙️ Setup Instructions

### 1️⃣ Clone or Extract Project
If you downloaded a ZIP, extract it into your web server directory (e.g., `htdocs` or `www`).

If using Git:
```bash
git clone <your-repo-url>
cd library-management-crud
```

---

### 2️⃣ Install Dependencies
Run the following command inside the project folder:
```bash
composer install
```

---

### 3️⃣ Configure Environment
Duplicate the `.env.example` file and rename it to `.env`.  
Then set up your database connection details:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

---

### 5️⃣ Run Database Migrations
Create all tables:
```bash
php artisan migrate
```

---

### 6️⃣ Start Local Development Server
```bash
php artisan serve
```
Then open your browser and visit:
```
http://127.0.0.1:8000
```

---

## 🧪 API Endpoints (for Postman Testing)

| Method | Endpoint | Description |
|--------|-----------|-------------|
| **GET** | `/api/books` | View all books |
| **POST** | `/api/books` | Add a new book |
| **PUT** | `/api/books/{id}` | Update book details |
| **DELETE** | `/api/books/{id}` | Delete a book |
| **GET** | `/api/members` | View all members |
| **POST** | `/api/members` | Add a new member |
| **PUT** | `/api/members/{id}` | Update member details |
| **DELETE** | `/api/members/{id}` | Delete a member |
| **GET** | `/api/borrowed-books` | View borrowed book records |
| **POST** | `/api/borrowed-books` | Record a new borrow transaction |
| **PUT** | `/api/borrowed-books/{id}` | Update return date |
| **DELETE** | `/api/borrowed-books/{id}` | Delete a borrow record |

---

## 🧾 Example JSON Response

**POST /api/books**
```json
{
  "message": "Book added successfully",
  "data": {
    "id": 1,
    "title": "Clean Code",
    "author": "Robert C. Martin",
    "published_year": 2008,
    "genre": "Programming",
    "created_at": "2025-10-22T20:30:00.000000Z"
  }
}
```

---

## 🧰 Technologies Used
- **Laravel 12.x**
- **PHP 8+**
- **MySQL / phpMyAdmin**
- **Composer**
- **Postman (for API testing)**

---
