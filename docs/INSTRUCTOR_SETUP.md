# Instructor Setup — From ZIP to a Reusable GitHub Codespaces Template

**Course:** Web Development 2 – Laravel  
**Topic:** Week 12 — RESTful APIs  
**Prepared by:** Crisvin B. Habitsuela, Instructor 1

## Why this works for older laboratory computers

GitHub Codespaces runs PHP, Composer, Node.js and Laravel on remote cloud compute. Students use a browser-based VS Code editor, so no local XAMPP/Laravel installation is required. A compatible browser and stable internet are still needed.

## How this relates to the TaskFlow Starter reference

The example at `https://github.com/dannielcanaryquipia/taskflow-starter` is an Expo/React Native (TypeScript) starter, not a Laravel codebase. This ZIP follows its teaching workflow: `.devcontainer/devcontainer.json`, automatic `postCreateCommand`, 2-core Codespace, port forwarding, VS Code extensions, student README and personal template repositories. It replaces Expo, Firebase and `npm start` with Laravel, PHP, SQLite, Composer and `php artisan serve`.

## Step 1 — Create the instructor repository

1. Create a new **public** GitHub repository named `laravel-week12-rest-api-starter` (public helps students access the template).
2. Upload **the contents** of the unzipped `laravel-rest-api-week12-codespaces-starter` folder into the **root** of the GitHub repository. This must include the hidden `.devcontainer` and `.starter` folders, `README.md`, `postman`, `docs`, and `api-requests.http`. Do not place an extra parent folder between your repo and `.devcontainer`.
3. Commit the files. A Git client that preserves hidden folders is often easier than web drag-and-drop; the GitHub web **Add file -> Upload files** screen may also be used.

## Step 2 — Build the Laravel app once

1. In the new repository, select **Code -> Codespaces -> Create codespace on main** (2-core is enough).
2. Wait for the Codespaces setup. It creates an official fresh Laravel 13 project, moves Week 12 API files from `.starter/` into the correct Laravel paths, installs Composer/npm dependencies, migrates an SQLite database, seeds two fictional students, and builds frontend assets.
3. Open a terminal and run:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

4. Open the Codespaces **Ports** tab and open port `8000` in the browser.
5. On the home page, click **GET /api/health** and **GET /api/students**.
6. Stop the server using **Ctrl+C**, then check the terminal commands:

   ```bash
   php artisan route:list --path=api
   php artisan test --filter=StudentApiTest
   ```

7. Verify all tests pass. If necessary, resolve errors before sharing with students.

## Step 3 — Commit Laravel's generated files (CRITICAL)

The ZIP contains the Codespaces installer and Week 12 source overlays. **Before the first Codespace run**, Laravel's official skeleton is not yet present. **After** the first run, it exists in the working repository and can be committed, so students receive a normal Laravel project immediately.

Commit and push from the instructor Codespace:

```bash
git status
git add -A
git commit -m "Initialize Laravel 13 REST API classroom template"
git push
```

Never commit `.env`, `vendor/`, `node_modules/`, or the SQLite database; the generated Laravel `.gitignore` plus installer safeguards exclude them. Do not upload tokens/secrets.

## Step 4 — Mark the repository as a template

On GitHub, select **Settings -> General -> Template repository**, and enable it. Then copy the repository link into the LMS.

Students: **Use this template -> Create a new repository -> Code -> Codespaces -> Create codespace on main**.

## Step 5 — Postman instruction

The default forwarded port is private. Please read `docs/POSTMAN_TESTING.md` before testing with Postman Web. For old PCs, use the built-in Codespaces REST Client requests file when public-port access is not appropriate.

## Laboratory assessment suggestion

- 1 point: GET students returns JSON
- 1 point: GET individual student works
- 1 point: POST creates a student with HTTP 201
- 1 point: PATCH updates a student
- 1 point: DELETE removes a student with HTTP 204

Ask students to submit their GitHub repository link and screenshots showing the response/status for each operation. Students should explain the role of `routes/api.php`, `StudentController`, `Student` model, migration, and JSON responses.

## Limitations

- The first setup downloads the framework and dependencies; it requires external network access and can take several minutes.
- Each student's private SQLite data persists inside their running Codespace but is not part of their Git repository.
- GitHub Codespaces storage/compute allowances are account-specific; keep machine sizes small and stop Codespaces after class.
- This is an unauthenticated classroom-only API. Do not make an actual student database publicly accessible.
