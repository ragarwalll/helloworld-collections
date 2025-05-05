# SocialNetwork Django

A basic social networking application built with Django. Includes user accounts, profiles, and posting functionality.

## 🚀 Features

- User registration, login, and authentication
- Profile pages with avatar and bio
- Create, edit, and delete posts
- View a global feed of all posts

## 🎯 Prerequisites

- Python 3.6+
- Django 3.x or higher
- A database supported by Django (SQLite by default)

## ⚙️ Installation & Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/ragarwalll/helloworld-collections.git
   cd helloworld-collections/socialnetwork-django
   ```
2. Create and activate a virtual environment:
   ```bash
   python3 -m venv venv
   source venv/bin/activate  # On Windows use `venv\\Scripts\\activate`
   ```
3. Install dependencies:
   ```bash
   pip install -r requirements.txt
   ```
4. Apply migrations:
   ```bash
   python manage.py migrate
   ```
5. Create a superuser (admin account):
   ```bash
   python manage.py createsuperuser
   ```
6. Run the development server:
   ```bash
   python manage.py runserver
   ```

## ▶️ Usage

- Visit `http://127.0.0.1:8000/` to view the feed and register/login.
- Access the admin interface at `http://127.0.0.1:8000/admin/`.

## 📁 Project Structure

- `accounts/` – user registration, login, and profile management
- `posts/` – post creation, editing, and feed views
- `socialnetwork/` – project settings and URLs
- `manage.py` – Django management script

---

*Maintained by [ragarwalll](https://github.com/ragarwalll)*
