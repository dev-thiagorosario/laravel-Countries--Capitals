# Country & Capitals Quiz

Country & Capitals Quiz is a lightweight Laravel 12 project that delivers a quick trivia experience focused on matching each country to its capital city. The application ships with a clean Bootstrap-based interface, custom styling, and a streamlined flow where the player chooses how many questions they want to answer before starting the round.

---

## Highlights
- Adjustable challenge length from 3 to 30 questions with a sensible default of 10.
- Responsive UI powered by Bootstrap 5 and a lightweight custom theme (`public/assets/css/main.css`).
- Reusable Blade layout and components (`resources/views/components`) for easy UI evolution.
- Ready-to-extend controllers (`StartGameController`, `PrepareGameController`) so you can plug in any data source or gameplay logic.

---

## Tech Stack
- **Framework:** Laravel 12 (PHP 8.2+)
- **Frontend tooling:** Vite, Bootstrap 5, custom CSS
- **Package management:** Composer for PHP, npm for assets/build tooling

---

## Getting Started

### 1. Prerequisites
- PHP 8.2+
- Composer 2.x
- Node.js 18+ and npm 9+
- A supported database (SQLite/MySQL/PostgreSQL/etc.)

### 2. Installation
```bash
git clone https://github.com/<your-user>/contrie-capitals.git
cd contrie-capitals

composer install
cp .env.example .env   # update DB credentials and any API keys
php artisan key:generate

# optionally set up the database
php artisan migrate

npm install
npm run build           # or npm run dev for hot reloading
```

### 3. Local Development
Run the Laravel dev server and the Vite dev server in parallel:
```bash
php artisan serve
npm run dev
```
Alternatively you can rely on the convenience script defined in `composer.json`:
```bash
composer run dev
```

Visit `http://localhost:8000/home` to open the quiz landing page where you can pick the number of questions and start the round.

---

## Project Structure
- `resources/views/home.blade.php` – main screen with the question count selector and start button.
- `resources/views/components` – Blade components for the layout, logo, and footer.
- `public/assets` – static Bootstrap build, favicon, and custom CSS.
- `app/Http/Controllers` – request entry points, ready for you to plug in quiz preparation logic.
- `routes/web.php` – user-facing routes for starting and preparing the game.

---

## Testing
```bash
php artisan test
```
You can also run `composer test` to execute the same test suite defined in `composer.json`.

---

## Roadmap / Next Steps
1. Implement `PrepareGameController` to generate randomized country/capital questions (database seeder, API, or static list).
2. Persist player progress and scoring inside a dedicated table or cache.
3. Expand the UI with feedback for correct/incorrect answers and a final summary screen.

---

## License
This project is distributed under the [MIT License](LICENSE). Feel free to use it as a starting point for your own trivia apps or as a learning resource for Laravel 12.
