<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RESTful APIs — Laravel Classroom</title>
    <style>
        :root{color-scheme:light;font-family:Inter,Arial,sans-serif;color:#1f2937;background:#f4f7fc}
        *{box-sizing:border-box} body{margin:0;line-height:1.65}
        header{background:#123963;color:white;padding:46px 22px}
        .shell{max-width:980px;margin:auto} .tag{color:#bfdbfe;font-size:13px;font-weight:700;letter-spacing:.10em;text-transform:uppercase}
        h1{font-size:clamp(27px,5vw,43px);line-height:1.15;margin:10px 0}
        header p{color:#dce7f7;margin:0;max-width:680px}
        main{max-width:980px;margin:25px auto;padding:0 18px 40px}
        .card{background:white;border:1px solid #dce4ee;border-left:5px solid #0d6efd;border-radius:10px;padding:24px;margin-bottom:18px}
        h2{font-size:20px;color:#0d6efd;margin:0 0 12px} p{margin:0 0 10px}
        table{width:100%;border-collapse:collapse;font-size:14px}td,th{text-align:left;border-bottom:1px solid #edf0f4;padding:12px 8px}
        code{font-family:Consolas,monospace;background:#eef3fa;border-radius:5px;padding:2px 5px;overflow-wrap:anywhere}
        .pill{font-size:11px;font-weight:800;color:#16416c;background:#dfeeff;padding:5px 8px;border-radius:5px}
        a{color:#075acc;font-weight:600} .info{color:#56657a}
        footer{text-align:center;color:#718096;font-size:13px;padding:0 18px 30px}
    </style>
</head>
<body>
<header>
    <div class="shell">
        <div class="tag">Web Development 2 • Week 12</div>
        <h1>RESTful APIs Using Laravel</h1>
        <p>Study API routes, JSON responses, resource controllers, and test your Student Management API using Postman.</p>
    </div>
</header>
<main>
    <section class="card">
        <h2>Environment ready</h2>
        <p>Your Laravel development website is running in GitHub Codespaces. Try <a href="/api/health">GET /api/health</a> to confirm the API is working.</p>
        <p>Then open <a href="/api/students">GET /api/students</a> to see the sample database records in JSON.</p>
    </section>
    <section class="card">
        <h2>RESTful Student API endpoints</h2>
        <table>
          <thead><tr><th>Method</th><th>Endpoint</th><th>Purpose</th></tr></thead>
          <tbody>
            <tr><td><span class="pill">GET</span></td><td><code>/api/students</code></td><td>Read all students</td></tr>
            <tr><td><span class="pill">GET</span></td><td><code>/api/students/1</code></td><td>Read student #1</td></tr>
            <tr><td><span class="pill">POST</span></td><td><code>/api/students</code></td><td>Create a student</td></tr>
            <tr><td><span class="pill">PATCH</span></td><td><code>/api/students/1</code></td><td>Update a student</td></tr>
            <tr><td><span class="pill">DELETE</span></td><td><code>/api/students/1</code></td><td>Delete a student</td></tr>
          </tbody>
        </table>
    </section>
    <section class="card">
        <h2>Practice workflow</h2>
        <p><strong>1.</strong> Run <code>php artisan route:list --path=api</code>.</p>
        <p><strong>2.</strong> Try GET requests from this page.</p>
        <p><strong>3.</strong> Import <code>postman/Week12-Student-REST-API.postman_collection.json</code> into Postman, or open <code>api-requests.http</code> in the editor.</p>
        <p><strong>4.</strong> Perform POST, PATCH, and DELETE requests with sample data only.</p>
        <p class="info">Demo only: these endpoints deliberately have no authentication. Do not use real student records or deploy to production.</p>
    </section>
</main>
<footer>Prepared by Crisvin B. Habitsuela • Instructor 1</footer>
</body>
</html>
