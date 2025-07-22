# Note-Taking Application

A simple, secure, and user-friendly note-taking web application demonstrating full CRUD functionality, built with Laravel (backend API) and Vue.js (frontend).

---

## Features

- Create, read, update, and delete notes
- Fully integrated RESTful API backend

---

## Technology Stack

| Layer     | Technology          |
|-----------|---------------------|
| Backend   | Laravel (PHP)       |
| Frontend  | Vue.js (latest)     |
| Database  | MySQL               |

---

## Getting Started

### Prerequisites

- PHP 8.x
- Composer
- MySQL (or SQLite)
- Node.js & npm

---

### Backend Setup

1. Clone the repository and go into the backend folder:
    ```bash
    cd note-back
    ```

2. Install PHP dependencies:
    ```bash
    composer install
    ```

3. Create `.env` file and configure your database credentials:
    ```bash
    cp .env.example .env
    ```

4. Generate app key:
    ```bash
    php artisan key:generate
    ```

5. Run database migrations:
    ```bash
    php artisan migrate
    ```

6. Start the Laravel development server:
    ```bash
    php artisan serve
    ```

API will be available at `http://localhost:8000/api/notes`

---

### Frontend Setup

1. Navigate to frontend folder:
    ```bash
    cd note-app
    ```

2. Install dependencies:
    ```bash
    npm install
    ```

3. Verify API base URL in `src/axios.js` matches backend URL:
    ```js
    baseURL: 'http://localhost:8000/api'
    ```

4. Run the Vue development server:
    ```bash
    npm run dev
    ```

Frontend will be available at `http://localhost:5173/` (or another port shown in terminal).

---

## Usage

- Use the form to create new notes.
- Notes are displayed below.
- Edit or delete notes with the respective buttons.

---

## Author

Chamodya B Herath | chamodyabherath@gmail.com | https://github.com/CA-Creation

