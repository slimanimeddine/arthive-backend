<a id="readme-top"></a>

<br />
<div align="center">
  <a href="https://github.com/slimanimeddine/arthive-backend">
    <img src="public/logoipsum-333.png" alt="Logo" width="260" height="120">
  </a>

  <h3 align="center">Arthive REST API</h3>

  <p align="center">
    A REST API for an artworks showcase platform.
    <br />
  </p>
</div>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

## About The Project

This project is a backend API built with Laravel to power a Traditional Artworks Showcase platform. It provides a structured and efficient way to manage and display various artworks, allowing artists to upload their work and viewers to explore collections with ease. The API handles authentication, artwork management, user interactions, and other essential features to support a seamless frontend experience.

### Features

#### Authentication & User Management

- User registration (sign-up) and login (sign-in)
- Email verification and password reset
- Secure authentication using Laravel Sanctum
- User profile management

#### Artwork Management

- CRUD operations for artworks, including image uploads
- Categorization using tags
- Ability to list artworks by user or globally

#### Social Interactions

- Follow/unfollow artists
- Like/unlike artworks
- Comment on artworks with edit and delete capabilities

#### Favorites & Notifications

- Mark artworks as favorites
- Receive real-time notifications for interactions

#### Tagging & Filtering

- Organize and filter artworks by tags
- View an artist's artworks based on tags

#### Admin & Verification

- Admin authentication
- Artist verification request system

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

- [Laravel](https://laravel.com/)
- [Laravel-query-builder](https://spatie.be/docs/laravel-query-builder/v6/introduction)
- [Laravel Scout](https://laravel.com/docs/11.x/scout)
- [Typesense](https://typesense.org/)
- [Laravel Sanctum](https://laravel.com/docs/11.x/sanctum)
- [Laravel Reverb](https://laravel.com/docs/11.x/reverb)
- [Scribe](https://scribe.knuckles.wtf/)
- [Resend](https://resend.com/)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting Started

### Prerequisites

Make sure you have [PHP](https://www.php.net/), [Composer](https://getcomposer.org/) installed on your local machine.
If you don't you can head to [Installing PHP and the Laravel Installer](https://laravel.com/docs/11.x#installing-php) to get your local machine setted up.

### Installation

Follow these instructions to run this project locally on your machine

1. Clone the repo:

   ```sh
   git clone https://github.com/slimanimeddine/arthive-backend.git
   ```

2. Copy `.env.example` to `.env`

3. Create a database and copy its credentials to `.env`

4. Install the project's dependencies:

   ```sh
   composer install
   ```

5. Generate the application key:

   ```sh
   php artisan key:generate
   ```

6. Run database migrations:

   ```sh
   php artisan migrate
   ```

7. Create a symbolic link to the storage folder:

   ```sh
   php artisan storage:link
   ```

8. Start the Laravel development server:

   ```sh
   php artisan serve
   ```

9. I have used [Typesense](https://typesense.org/) as an engine to add full text search to this project.
   To run Typesense on your local machine follow these [instructions](https://typesense.org/docs/guide/install-typesense.html#option-2-local-machine-self-hosting).

10. Then, set the `SCOUT_DRIVER` environment variable as well as your Typesense host and API key credentials within your application's .env file:

    ```sh
    SCOUT_DRIVER=typesense
    TYPESENSE_API_KEY=masterKey
    TYPESENSE_HOST=localhost
    ```

11. Import User model records into the search index:

    ```sh
    php artisan scout:import "App\Models\User"
    ```

12. Import Artwork model records into the search index:
    ```sh
    php artisan scout:import "App\Models\Artwork"
    ```
13. I have used [Resend](https://resend.com/) as an email API to send emails such as email verificaiton codes and forgot password codes.
To configure Resend with Laravel follow these [instructions](https://resend.com/docs/send-with-laravel).
<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Usage

The application will be available at `http://localhost:8000`.

The application's documentation will be available at `http://localhost:8000/docs`.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## License

Distributed under the [MIT License](LICENSE.md).

<p align="right">(<a href="#readme-top">back to top</a>)</p>
