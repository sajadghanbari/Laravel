# 🛍️ Laravel E-Commerce Platform

A powerful and modern **E-Commerce web application** built with **Laravel**, featuring a fully functional **Admin Panel** for product, category, and user management.  
This project is designed for scalability, security, and ease of customization.

---

## 🚀 Features

### 🛒 Storefront
- Browse products by category or search
- Product detail pages with pricing and stock info
- User authentication (login, register, forgot password)
- Shopping cart and checkout system
- Order history and tracking
- Responsive design (mobile-friendly)

### ⚙️ Admin Panel
- Dashboard overview with key stats
- Product management (CRUD)
- Category management
- Order management
- User management (roles and permissions)
- Upload and manage images
- Secure admin authentication

### 🔒 Security
- CSRF protection
- Password hashing
- Validation and request filtering
- Role-based access control (RBAC)

---

## 🧱 Tech Stack

| Layer | Technology |
|-------|-------------|
| Backend | Laravel 10+ |
| Frontend | Blade Templates / Bootstrap / Tailwind |
| Database | MySQL / PostgreSQL |
| Authentication | Laravel Breeze / Sanctum |
| File Storage | Laravel Filesystem (Local / S3) |
| Deployment | Docker / Laravel Forge / Shared Hosting |

---

## ⚡ Installation

Follow the steps below to get the project running locally:

```bash
# Clone the repository
git clone https://github.com/sajadghanbari/Laravel.git

# Navigate into the project directory
cd Laravel

# Install dependencies
composer install
npm install && npm run dev

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in the .env file, then migrate:
php artisan migrate --seed

# Start the local server
php artisan serve
