## How to install?

-   Clone the repository: run command - git clone https://github.com/jakir12/OnlineTest
-   After clone navigate to project folder, open PowerShell/CMD and run command: **composer install** (Composer must be installed on your system)
-   run command: **npm install and npm run dev**
-   run command: **copy .env.example .env** to generate .env file
-   run command php artisan key:generate
-   Create database on your local/live server
-   edit .env file and put correct database credentials
-   run command **config:cache** (usually need after editing .env file)
-   run command **php artisan migrate**
-   run command **php artisan db:seed**
-   now finally run command **php artisan serve**
-   please configure mail on .env file for mail services to work
