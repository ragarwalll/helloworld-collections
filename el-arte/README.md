# El Arte

A PHP/HTML social networking platform built for developers to learn and experiment. Developed as a learning project to understand web app architecture and social features.

## 🚀 Features

- User registration, login, and authentication
- Developer-focused profiles with bio and skill tags
- Create, edit, and delete posts (text and code snippets)
- Follow/unfollow other users
- Like and comment on posts

## 🎯 Prerequisites

- PHP 7.0+ with GD or ImageMagick for avatar uploads
- MySQL (or MariaDB) database
- Apache or Nginx web server

## ⚙️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/ragarwalll/helloworld-collections.git
   cd helloworld-collections/el-arte
   ```
2. Create a database and import the schema:
   ```bash
   mysql -u root -p your_db_name < schema.sql
   ```
3. Configure database settings in `config.php`.
4. Make the `uploads/` directory writable for avatars:
   ```bash
   chmod 755 uploads/
   ```
5. Point your web server document root to this folder.

## ▶️ Usage

1. Visit `http://localhost/el-arte` in your browser.
2. Register a developer account and set up your profile.
3. Follow other developers, post code snippets, and engage via comments and likes.

---

*Maintained by [ragarwalll](https://github.com/ragarwalll)*
