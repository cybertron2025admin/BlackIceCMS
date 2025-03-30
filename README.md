# 💻 Cyber Weapon Manager

A secure PHP-based system for managing cyber weapons, email logs, and classified file attachments using JWT authentication.

---

## 🚀 Features

- 🔐 Login & Password Reset
- 📥 Weapon Inventory Management (name, location, quantity, attachment)
- 📄 File downloads secured by JWT tokens
- 📧 Email logging (stored in database)
- 🧪 Simple UI with TailwindCSS
- ⚙️ .env-based configuration

---

## ⚙️ Requirements

- PHP 8.0+
- MySQL/MariaDB
- Composer
- Web server (Apache/Nginx)

---

## 🧰 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/cyber2025tron/BlackIceCMS cyber-weapon-manager
   cd cyber-weapon-manager
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   - Copy `.env.example` or use:
     ```env
     APP_NAME=CyberWeaponManager
     DB_HOST=localhost
     DB_NAME=cyberweapons
     DB_USER=root
     DB_PASS=yourpassword
     JWT_SECRET=super_jwt_secret_key
     ```

4. **Create database and import schema**
   ```bash
   mysql -u root -p cyberweapons < database/schema.sql
   ```

5. **Run locally**
   ```bash
   php -S localhost:8000 -t public
   ```

---

## 👤 Default User

You can insert an admin account manually:

```sql
INSERT INTO users (email, password)
VALUES ('admin@cyber.local', 'CHANGEIT');
-- password: admin123
```

---

## 🔐 JWT File Download

Files are downloadable via tokenized URL:

```
/weapons/download?file=JWT_TOKEN
```

Token payload:
```json
{
  "file": "filename.pdf"
}
```

---

## 🧱 Folder Structure

```
/public          → Web root
/app
  /Controllers   → App logic
  /Models        → Database models
  /Views         → Blade-style PHP views
  /Core          → Router, DB handler, etc.
/config          → Routes config
/database        → SQL schema
/storage         → Uploaded attachments
```

---

## 📦 Packages Used

- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
- [firebase/php-jwt](https://github.com/firebase/php-jwt)
- [TailwindCSS CDN](https://tailwindcss.com)

---

## 🔐 Security Notes

- JWT tokens never expire (by design, see `WeaponController`)
- File download does not require user session
- Passwords are hashed with bcrypt

---

## 📬 Contact

Cyber Division © 2025  
Email: admin@cyber.local