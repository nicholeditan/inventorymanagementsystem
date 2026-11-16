# Student Guide — Week 12 RESTful APIs

**Course:** Web Development 2 – Laravel  
**Instructor:** Crisvin B. Habitsuela, Instructor 1

## First day (create your own project)

1. Sign in to GitHub using your own account.
2. Open your instructor's **Laravel Codespaces template repository**.
3. Click **Use this template** -> **Create a new repository**. Do not choose Fork.
4. Name it, for example, `webdev2-rest-api-yourlastname`; choose your preferred visibility.
5. In your NEW repository, select **Code** -> **Codespaces** -> **Create codespace on main**.
6. Wait for `postCreateCommand` to finish. Do not interrupt Composer or npm.
7. Open **Terminal** -> **New Terminal**, then run:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

8. Open **Ports** -> port `8000` -> **Open in Browser**.
9. Test the `/api/health` and `/api/students` links on the starter home page.

## Every later class

1. Open your repository -> **Code** -> **Codespaces** -> open your existing Codespace.
2. Run `php artisan serve --host=0.0.0.0 --port=8000` if it isn't running.
3. Edit `routes/api.php` and `app/Http/Controllers/Api/StudentController.php`.
4. Save and test changes. Run `php artisan route:list --path=api` to verify routes.
5. Use GitHub Source Control to **Commit** and **Sync Changes**.
6. **Stop** your Codespace when class ends so it does not keep using compute hours.

## Practice flow

| HTTP method | URL | Controller method | Result |
| --- | --- | --- | --- |
| GET | `/api/students` | `index()` | Students list; HTTP 200 |
| GET | `/api/students/1` | `show()` | One student; HTTP 200 |
| POST | `/api/students` | `store()` | New student; HTTP 201 |
| PUT/PATCH | `/api/students/1` | `update()` | Updated student; HTTP 200 |
| DELETE | `/api/students/1` | `destroy()` | Deleted; HTTP 204 |

Use sample data only. Try these JSON values for a POST request:

```json
{
  "name": "Pedro Reyes",
  "course": "BSIT",
  "year_level": 2
}
```

The API also returns JSON validation errors with status **422**, such as when `name` is missing.

## Two ways to test

**Option A — No separate Postman installation (recommended first):** Open `api-requests.http` in the Codespaces editor. The REST Client extension includes a **Send Request** action; it calls local port `8000` from inside your cloud editor, while the preview can stay private.

**Option B — Postman lesson:** Follow `docs/POSTMAN_TESTING.md` and import the collection in the `postman` folder.

## Submit to LMS

Provide your individual GitHub repository link, screenshots of your GET/POST/PATCH/DELETE results showing response status, and a short explanation of API routes, resource controllers, and JSON responses. Your instructor can change these deliverables.

## Important

- `http://127.0.0.1:8000` only works inside the Codespace or a connected forwarded environment. On the old lab PC, use the **Ports** tab's HTTPS preview URL.
- The SQLite database and `.env` are not pushed to GitHub. Rebuilding a fresh Codespace recreates the seeded sample database; your committed code is retained.
- Postman can access a remote HTTPS URL only if the port visibility/authentication setup permits it.
- Never upload private API tokens, passwords, `.env` files, or real student information.
