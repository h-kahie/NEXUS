# NEXUS — Personal Life OS

NEXUS is a local-first personal life management system built with PHP, MySQL, HTML, CSS, and JavaScript.

## Purpose

NEXUS helps manage five core areas without duplicating daily task management:

- Education
- Skills
- Faith
- Health
- Personal

### System principle

**Goals → Schedule → Execute → Track → Review**

## Stack

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Apache/XAMPP for local development

## Architecture

```text
NEXUS/
├── app/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   └── views/
├── database/
│   └── nexus.sql
├── public/
│   ├── index.php
│   └── assets/
│       ├── css/
│       └── js/
├── includes/
├── .gitignore
└── README.md
```

## Development phases

1. Foundation and project structure
2. MySQL database
3. PHP backend and CRUD
4. Core areas and goals
5. Milestones and progress
6. Schedule
7. Weekly and monthly rhythm
8. Dashboard
9. Authentication and security
10. Testing and polish

## Local setup

1. Put the project inside XAMPP `htdocs`.
2. Start Apache and MySQL.
3. Create the database using `database/nexus.sql`.
4. Configure database credentials in `app/config/database.php`.
5. Open `http://localhost/NEXUS/public/`.

## Status

**NEXUS v1.0 — Foundation**

Built for clarity, consistency, and growth.