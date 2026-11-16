# Postman Testing in GitHub Codespaces — Important Instructions

Your Laravel server is INSIDE GitHub Codespaces, not on the laboratory PC.

## First run

In Codespaces terminal:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Open the **Ports** tab and **Open in Browser** for port 8000. A forwarded address looks like:

```
https://your-codespace-name-8000.app.github.dev
```

**Do not copy the example address**. Copy your OWN port 8000 URL.

## Postman Web / Postman Cloud Agent

1. Open Postman (web app) and import `postman/Week12-Student-REST-API.postman_collection.json`.
2. Select the collection -> Variables -> change `base_url` to your forwarded **HTTPS** URL; save.
3. IMPORTANT: A **private** Codespaces port requires GitHub authentication. Postman Cloud Agent will not automatically use the same GitHub browser session.
4. For a temporary classroom demo ONLY, if permitted by your instructor and GitHub policy, change port 8000 visibility from **Private** to **Public** in Codespaces **Ports** tab. Public means anyone with the URL may access this unauthenticated API. Use fabricated test records and never real data.
5. Send the requests in numbered order. POST stores the newly created student ID for subsequent PATCH and DELETE requests.
6. **After testing:** immediately change port visibility back to **Private**, stop the Laravel server, and stop the Codespace when finished.

### Safer alternative (no public port needed)

Open `api-requests.http` inside your Codespace. The VS Code **REST Client** extension sends requests to `http://127.0.0.1:8000` **within the cloud development environment**, so you can keep the forwarded port private. It exercises the same HTTP methods, responses, and status codes, but it is not Postman.

## Check each API method

| Request | Expected response |
| --- | --- |
| GET `/api/health` | 200; JSON `status: ok` |
| GET `/api/students` | 200; JSON list (two seeded records initially) |
| GET `/api/students/1` | 200; first student |
| POST `/api/students` | 201; created record (saves ID in the collection) |
| PATCH `/api/students/{{student_id}}` | 200; course changed |
| DELETE `/api/students/{{student_id}}` | 204; empty response body |
| POST with missing `name` / `course` | 422; JSON validation messages |

### Troubleshooting

- **404:** Check that `/api/students` has `/api/` prefix, and run `php artisan route:list --path=api`.
- **502/connection error:** Verify `php artisan serve` is still running.
- **GitHub login page or 401 before Laravel:** The forwarded port may be Private and Postman is not authenticated to GitHub; use the internal REST Client or ask permission for temporary public visibility.
- **422:** Check JSON body and set `Accept: application/json` and `Content-Type: application/json`.
- **Database errors:** Try `php artisan migrate --force` and `php artisan db:seed --force`.
- **Unexpected HTML response:** Set request header `Accept: application/json` and verify the URL.
