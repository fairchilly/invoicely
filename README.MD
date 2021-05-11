<div style="text-align:center"><img src="https://i.imgur.com/jq5An3E.png" /></div>

#### Purpose

This application is used to quickly generate PDF invoices. Users who sign up will be able to keep a history of previously generated invoices, mark them as paid, organize them, and more.

#### Installation

1. Move to the root of the project
2. Copy and fill the mysql database variables: `cp .env.example .env`
3. Copy the laravel environment variables: `cd src && cp .env.example .env`
4. Run the docker instances: `cd ../ && docker-compose up -d nginx react`
5. Open bash for the laravel instance: `docker exec -it invoicely_php /bin/sh`
6. Grant write permissions for laravel application: `chmod 755 -R storage bootstrap/cache`
7. Visit `localhost` in your browser to view the application

#### Tech Stack

Laravel, React (with Typescript and MobX), MySQL, Nginx, Redis, Elasticsearch, Docker
