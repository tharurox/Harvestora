Harvestora Application
-------------------------------------------------------------------


This application is built to uplift the agricultural activities in the Sri Lanka. 
Where the users are able to ask questions and get answers from the community. 
Majority of the users who uses the application is engaged in the Agricultural acitivities. 

The main foucs of the application is to reduce the knowledge gap of the people who engaged in 
cultivation and other related agriculture fields, which enables them to quickly get their 
issues sorted and keep working. 

We wish the cultivaters harvest more by using the application.. 


Usage:
---------------------------------
1) Clone the repository to the local directory: 

git clone https://github.com/tharurox/Harvestora

2) Install the dependencies using the Composer

composer install 

3) Create the database in mysql

create database harvestora;

4) Create a new .env file

 cp .env.example .env

5) Edit the db settings username/password for mysql in the .env file

DB_DATABASE=harvestora
DB_USERNAME=<username>
DB_PASSWORD=<password>

6) Create the table structure in the database 

php artisan migrate;

7) Generate the auth key for laravel 

php artisan key:generate

8) Run the application in Laravel Development server

php artisan serve


Contributed authors : 
-----------------------------------
T.R Ranathunga
A.L.U Madushan
O.V Senavirathna
U.S Lakmali