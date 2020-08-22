Travis and Mike,

Thank you very much for your time and consideration with this coding challenge. Please follow the instructions below to set everything up locally.

First, run the following SQL to set up a new DB schema:

    CREATE SCHEMA `c1`
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

Next, clone this repo, install the Composer and npm modules, and then point the `.env` file to the `c1` DB (you can probably just copy the contents of `.env.example` into `.env`). After that, please run the following migration command to set up and seed the DB:

    php artisan migrate:fresh --seed

Check out `database/seeds/UserSeeder.php` for a list of prepopulated users and passwords for logging in with.

Lastly, run either of the following commands to build the JS/CSS assets:

    npm run prod
    npm run watch

Also, for what it's worth, I set up a virtual host for my local environment, but that's likely not necessary. If you have any issues with file paths being weird without a virtual host though, then setting up a virtual host will likely solve the problem.