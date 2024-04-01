<p>I tried:) </p>

# **Getting Started**

Clone the repository:

```sh
git@github.com:Heyosseus/paysera.git
```

Navigate to the project directory:

```sh
 cd paysera
```

Run `composer install` to install the dependencies
```sh
composer install
```

Install the dependencies:

```sh
npm install
```

Create a copy of the `.env` file:

```sh
cp .env.example .env
```

Generate the application key:

```sh
php artisan key:generate
```

Generate JWT token:

```sh
php artisan jwt:secret
```

Run the database migrations:

```sh
php artisan migrate
```

Compile the assets:

```sh
npm run dev
```

Start the development server:

```sh
npm run serve
```
