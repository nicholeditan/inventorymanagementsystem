# Laravel REST API Classroom Starter — GitHub Codespaces

**Web Development 2 – Laravel | Week 12: RESTful APIs**  
Prepared by **Crisvin B. Habitsuela, Instructor 1**

A template-style GitHub Codespaces starter inspired by [TaskFlow Starter](https://github.com/dannielcanaryquipia/taskflow-starter), but built for **Laravel**, not Expo/React Native.

## Lessons covered

1. Introduction to REST Architecture
2. API Routes
3. JSON Responses and HTTP Status Codes
4. API Resource Controllers
5. API Testing Using Postman

## Included environment

| Tool | Configuration |
| --- | --- |
| Cloud editor | GitHub Codespaces browser-based VS Code |
| PHP | 8.4 |
| Laravel | 13.x (official `laravel/laravel` project on first setup) |
| Composer | Installed in the PHP dev container |
| Node.js | 22 |
| Database | SQLite (no MySQL server required) |
| API | Working `Student` CRUD + validation + JSON |
| Postman | Importable collection with auto-saved student ID |
| Alternative | `api-requests.http` for REST Client inside Codespaces |

## IMPORTANT — Instructor first-time bootstrap

**This archive is an installable Codespaces template kit, not a vendored/full Laravel source tree yet.** It automatically downloads the official Laravel 13 skeleton during the instructor's FIRST Codespace setup. It then copies the included Week 12 code into a working Laravel application. **The instructor must commit and push that generated Laravel source before marking the repository as a classroom template.**

Read **[`docs/INSTRUCTOR_SETUP.md`](docs/INSTRUCTOR_SETUP.md)** first.

## Students: each class

After the instructor has published the finished template:

1. Open your instructor's repository.
2. Click **Use this template -> Create a new repository**.
3. In your repository, click **Code -> Codespaces -> Create codespace on main**.
4. Wait for setup. Start the server in the terminal:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

5. Open the forwarded **port 8000** in the Codespaces **Ports** tab.
6. Visit `/api/health` and `/api/students`.
7. Test POST/PATCH/DELETE in Postman or from `api-requests.http`.
8. **Commit and Sync** changes, then **Stop Codespace** at the end of class.

Full guide: [`docs/STUDENT_GUIDE.md`](docs/STUDENT_GUIDE.md).

## API endpoint summary

| Method | URL | Description | Expected status |
| --- | --- | --- | --- |
| GET | `/api/health` | Health check | 200 |
| GET | `/api/students` | List students | 200 |
| GET | `/api/students/1` | Get one student | 200 / 404 |
| POST | `/api/students` | Create student | 201 / 422 |
| PUT/PATCH | `/api/students/1` | Update student | 200 / 422 |
| DELETE | `/api/students/1` | Delete student | 204 / 404 |

The initial SQLite database contains two **fictional** example students: Juan Dela Cruz and Maria Santos.

## Quick commands

```bash
php artisan serve --host=0.0.0.0 --port=8000
php artisan route:list --path=api
php artisan migrate --force
php artisan db:seed --force
php artisan test --filter=StudentApiTest
```

## Where to find code

After first setup: `routes/api.php`, `app/Http/Controllers/Api/StudentController.php`, `app/Models/Student.php`, `database/migrations/`, and `tests/Feature/StudentApiTest.php`.

Before first setup, the source files are intentionally staged under `.starter/` and moved to normal Laravel locations automatically.

## Postman and safety

Read [`docs/POSTMAN_TESTING.md`](docs/POSTMAN_TESTING.md). GitHub forwarded ports default to private; Postman Cloud Agent cannot assume your signed-in GitHub session. The included API has no authentication **for classroom practice only**: never use real student records or expose a production database.

**Reminder:** Codespaces consumes compute while running. Stop your Codespace when finished and commit code so it survives any workspace deletion.
"# laravel-codespaces-starter" 
