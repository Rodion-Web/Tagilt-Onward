# 🌐 Volunteer Program Landing Page (Taglit / Yahad)

![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)
![Status](https://img.shields.io/badge/status-active-success)
![Security](https://img.shields.io/badge/security-basic-important)

<p align="center">
  🇬🇧 English | <a href="README.md">🇷🇺 Русский</a>
</p>

---

## 📌 Description

Fullstack landing page for a volunteer program registration system.

The project combines a responsive frontend with backend form processing, email delivery, and data persistence.

---

## ⚙️ Features

- Responsive landing page (mobile-first)
- User registration form
- Input validation (email, required fields)
- Email submission via SMTP
- Data storage in CSV format
- Interactive UI (accordion, slider, smooth scroll)
- SEO optimization (meta tags, OpenGraph)

---

## 🧠 Tech Stack

### Frontend

- HTML5
- CSS3 (Flexbox, Grid)
- JavaScript (ES6)
- Swiper.js

### Backend

- PHP
- PHPMailer
- SMTP (email delivery)
- CSV (data storage)

---

## 🔒 Security

- Environment variables (`.env`) for sensitive configuration
- `.env` file excluded from repository via `.gitignore`
- User input sanitization (`htmlspecialchars`)
- Email validation (`filter_var`)
- No sensitive data stored in public repository

---

## 🚀 Getting Started

### Requirements

- PHP 7.4+

---

### Run locally

```bash
git clone https://github.com/Rodion-Web/Tagilt-Onward.git
cd Tagilt-Onward
php -S localhost:8000
```

Open in browser:
http://localhost:8000

---

### ⚠️ Configuration

Create a `.env` file:

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=465
SMTP_SECURE=ssl
SMTP_USERNAME=your_email@gmail.com
SMTP_PASSWORD=your_app_password
SMTP_FROM_NAME=Your Name
SMTP_TO=your_email@gmail.com
```

---

## 📂 Project Structure

```bash
index.php
send.php
/style.css
/script.js
.env (ignored)
```

---

## 📬 How it works

1. User fills out the form
2. Frontend sends data via `fetch`
3. Backend validates and sanitizes input
4. Data is:
   - sent via email
   - stored in CSV file

---

## 👨‍💻 Author

Fullstack development: frontend, backend logic, and deployment.

---

## 💡 Future Improvements

- Add reCAPTCHA (anti-spam protection)
- Integrate database (MySQL/PostgreSQL)
- Implement admin panel
- Add rate limiting
- Improve logging and monitoring

---
