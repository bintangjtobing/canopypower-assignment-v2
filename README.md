### Installation
1. Clone the repository first
   ```sh
   git clone https://github.com/bintangjtobing/canopypower-assignment-v2
   ```
2. Install composer by run 
    ```sh
    composer intall
    ```
3. Install NPM packages
   ```sh
   npm install
   ```
4. Dont forget to set the connection on .env file, change on DB_Connection section
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1 <- Your site IP
    DB_PORT=3306 <- Dont forget the port of your hosting databases
    DB_DATABASE=canopyv2
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
## Setup
- From your local (or inside container), run `npm run dev` to build frontend assets
- Go into Laravel container and run `php artisan migrate` to create database
- (only for first time setup) run `php artisan db:seed` to seed the user on database.

## Run the sites
- Run `php artisan serve`
- Access the website via `http://localhost:8000`

## How it works?
- You can login it with email: admin@admin.com, password: admin.
- And then you will see the dashboards.
- As your assignment, i've been already completed that.

## Several Screenshot
This is several screenshot view of my assignment. Please take a look.
![Dashboard](https://ibb.co/SXRgJVH)
![Login page](https://ibb.co/VQZ11YH)
![User page](https://ibb.co/f8yTTxB)
