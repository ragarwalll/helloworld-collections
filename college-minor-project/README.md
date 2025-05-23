# College Minor Project: Social Network Lite

A simplified PHP/HTML social networking application developed as my college minor project. Includes core social features without chat or advanced interactions.

## 🚀 Features

- User registration, login, and authentication
- Profile pages with avatar upload and bio
- Create, edit, and delete text posts
- View a global posts feed
- Comment on and like posts

## 🎯 Prerequisites

- PHP 7.0+ with GD or ImageMagick for avatar uploads
- MySQL (or MariaDB) database
- Apache or Nginx web server

## ⚙️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/ragarwalll/helloworld-collections.git
   cd helloworld-collections/college-minor-project
   ```
2. Create a database and import the schema:
   ```bash
   mysql -u root -p your_db_name < schema.sql
   ```
3. Configure database settings in `config.php`.
4. Ensure the `uploads/` directory is writable:
   ```bash
   chmod 755 uploads/
   ```
5. Point your web server to this folder.

## ▶️ Usage

1. Open `http://localhost/college-minor-project` in your browser.
2. Register or log in to your account.
3. Update your profile and avatar.
4. Create and interact with posts.

---

*Maintained by [ragarwalll](https://github.com/ragarwalll)*
