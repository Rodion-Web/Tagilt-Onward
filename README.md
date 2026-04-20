# 🌐 Лендинг волонтёрской программы (Taglit / Yahad)

![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)
![Status](https://img.shields.io/badge/status-active-success)
![Security](https://img.shields.io/badge/security-basic-important)

<p align="center">
  🇬🇧 English | <a href="README.eng.md">eng English</a>
</p>

## 📌 Описание

Fullstack лендинг для регистрации участников волонтёрской программы в Израиле.

Проект реализует удобный пользовательский интерфейс и backend-обработку заявок с отправкой на email и сохранением данных.

---

## ⚙️ Функционал

- Адаптивный лендинг (mobile-first)
- Форма регистрации пользователей
- Валидация данных (email, поля формы)
- Отправка заявок на email
- Сохранение заявок в CSV
- Интерактивные элементы (accordion, слайдер, scroll)
- SEO-оптимизация (meta, OpenGraph)

---

## 🧠 Технологии

### Frontend

- HTML5
- CSS3 (Flexbox, Grid)
- JavaScript (ES6)
- Swiper.js

### Backend

- PHP
- PHPMailer
- SMTP (email отправка)
- CSV (хранение данных)

---

## 🔒 Безопасность

- Использование `.env` для хранения конфигурации SMTP
- Переменные окружения не хранятся в репозитории
- Валидация и очистка пользовательских данных
- Защита от XSS (`htmlspecialchars`)
- Чувствительные данные исключены через `.gitignore`

---

## 🚀 Запуск проекта

### Требования

- PHP 7.4+

---

### Локальный запуск

```bash
git clone https://github.com/Rodion-Web/Tagilt-Onward.git
cd Tagilt-Onward
php -S localhost:8000
```

Открыть:
http://localhost:8000

---

### ⚠️ Настройка

Создай файл `.env`:

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

## 📂 Структура проекта

```bash
/img
.env-example
.gitignore
.htaccess
README.eng.md
README.md
favicon.ico
index.html
normalize.css
script.js
send.php
style.css
```
## 🌐 Демо

[https://yahad4israel.ru/](https://yahad4israel.ru/)

---

## 📬 Как работает отправка

1. Пользователь заполняет форму
2. JS отправляет данные через `fetch`
3. PHP обрабатывает и валидирует
4. Данные:
   - отправляются на email
   - сохраняются в CSV

---

## 👨‍💻 Автор

Fullstack разработка: frontend + backend логика + деплой

---

## 💡 Возможные улучшения

- Добавить защиту от спама (reCAPTCHA)
- Подключить базу данных
- Реализовать админ-панель
- Добавить rate limiting
- Логирование ошибок

---
