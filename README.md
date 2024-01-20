# Project Setup Instructions

This guide walks you through the process of setting up the project on your local development environment.

## Step 1: Clone the Repository

First, clone the repository to your local machine using the following command:

```bash
git clone https://github.com/divyamanchireddy19/ips-sample.git
```
## Step 2: Environment Setup
Set up your environment file which includes your local configurations.

Copy the .env.example file to create a .env file:
```bash
cp .env.example .env
```

## Step 3: Generate Application Key

Generate a new application key:
```bash
php artisan key:generate
```

## Step 4: Install Dependencies

Install the project's PHP dependencies using Composer.
```bash
composer install
```


## Step 5: Run Migrations

Run the database migrations:
```bash
php artisan migrate
```

## Step 6: Install NPM Packages

Install the required NPM packages for your front-end assets.
```bash
npm install
```

## Step 7: Compile Assets

Compile the front-end assets:
```bash
npm run dev
```


## Step 8: Run the Application

You can start the Laravel application using Laravel's built-in server:
```bash
php artisan serve
```
*Alternatively, if you are using tools like Laravel Valet, Herd, or Homestead, set them up according to their respective documentation.*



## Step 9: Register and Login

- Open your web browser and go to the application URL.
- Complete the registration process.
- Log in with your credentials

## Step 10: Access the Parts Inventory

- Navigate to [Your-App-URL]/inventory/parts to access the parts inventory.
- The rest of the application should be intuitive to use.


### Notes:

- Replace `[URL-of-the-repo]` and `[Your-App-URL]` with the actual repository and application URLs, respectively.
- The instructions are simplified and assume that the user has a basic understanding of Laravel and command-line operations.
- Make sure your Laravel and Node.js environments are correctly set up for these commands to work.
- Additional steps or configurations might be necessary depending on the specifics of your project.



