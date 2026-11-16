#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

printf '\n==============================================\n'
printf ' Web Development 2 | Laravel REST API Setup\n'
printf '==============================================\n\n'

# First run: generate the official Laravel skeleton. Once the instructor
# commits the generated files, students clone that finished Laravel project.
if [[ ! -f artisan ]]; then
  echo '[1/7] Generating a fresh Laravel 13 project...'
  TEMP_DIR="$(mktemp -d)"
  trap 'rm -rf "$TEMP_DIR"' EXIT
  composer create-project laravel/laravel "$TEMP_DIR/laravel" '^13.0' --prefer-dist --no-interaction
  # Preserve the classroom instructions (the upstream skeleton also has a README).
  cp README.md "$TEMP_DIR/classroom-readme.md"
  cp -a "$TEMP_DIR/laravel/." "$ROOT/"
  cp "$TEMP_DIR/classroom-readme.md" README.md
else
  echo '[1/7] Laravel project is already present.'
fi

# Week 12 API examples live here before the instructor's first setup.
# Copy them into their normal Laravel paths and remove the staging folder.
if [[ -d .starter ]]; then
  echo '[2/7] Adding the Week 12 Student REST API...'
  cp -a .starter/. "$ROOT/"
  rm -rf .starter
else
  echo '[2/7] Student REST API source is already in the Laravel app.'
fi

# Runtime secrets and SQLite files must never be pushed to GitHub.
touch .gitignore
for rule in '/database/*.sqlite' '/database/*.sqlite-*'; do
  if ! grep -Fxq "$rule" .gitignore; then
    printf '\n%s\n' "$rule" >> .gitignore
  fi
done

if [[ ! -f .env ]]; then
  cp .env.example .env
fi

# Keep a lightweight local-only database for classroom demonstrations.
# The starter's .env.example is intentionally copied over the Laravel default.
mkdir -p database
touch database/database.sqlite

# Fresh clones have neither the vendor/ directory nor the node_modules/ folder.
echo '[3/7] Installing PHP packages with Composer...'
composer install --prefer-dist --no-interaction --no-progress

if ! grep -Eq '^APP_KEY=base64:.+' .env; then
  echo '[4/7] Generating the private Laravel application key...'
  php artisan key:generate --force
else
  echo '[4/7] Private Laravel application key already configured.'
fi

echo '[5/7] Running database migrations and loading sample students...'
php artisan migrate --force
php artisan db:seed --force

echo '[6/7] Installing and building frontend dependencies...'
if [[ -f package-lock.json ]]; then
  npm ci --no-audit --no-fund
else
  npm install --no-audit --no-fund
fi
npm run build

echo '[7/7] Available API endpoints:'
php artisan route:list --path=api

printf '\nREADY! Run: php artisan serve --host=0.0.0.0 --port=8000\n'
printf 'Then open port 8000 in the Codespaces Ports tab.\n\n'
