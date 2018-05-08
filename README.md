# Timetracker

## Project Overview

##### 1. Time Frame of the whole back-end part
In total I needed 2 hours to finish back-end part
- database structure, migration and seeder (0.5 h)
- logic for storing logged time and filter all logged times (1 h)
- routes implementation, added cors origin to allow *, added php unit tests examples (0.5 h)

##### 2. Improvements and Satisfied parts of the test project
Things I could improve or do better if I would spend more time are:
- Better data validation to secure the app.
- Log In and Register for users to track time by user logged in.
- Save the timer on db if it is running continuously in case of browser closes or power loss. Next time users log in and can resume the timer.
- Track user when pauses or resumes the timer and store this history on db for future reports or analysis.

Things I am satisfied of:
- Filter functionality for times logged (order, filter, limit, offset)
- migration and db seeder to create database structure and initial records with 2 simple commands.
- Hierarchical way of coding and OOP principles used.

## Deployment Steps

##### 1. Download back-end code 
Open your terminal and run `git clone https://github.com/jurikaca/timetrackingBE.git` to download the code. After that run `cd timetrackingBE`. Now you are at the root of app.

Or you can download and unzip the compressed file on the desired location of your local machine and then navigate inside the app folder with a cmd tool.

##### 2. Setup project
Before you start on the steps below be sure that you have installed composer
- Now that you are at the root of app run `composer install` to install all the dependencies.
- Then open `.env` file to change the information related to your database credentials. If `.env` file is not created the you should create yourself by copying `.env.example`
- After this you should create an empty database named exaclty as you entered on `.env` file creadentials.
- Then run `php artisan migrate` to create the db structure and `php artisan db:seed` to create initial data (actually one user record for testing)
- Next step is to add virtual host for this project. Navigate on your local apache vhosts-config to add this code
 
 `<VirtualHost timetracking.com:80>
     ServerName timetracking.com
     ServerAlias timetracking.com
     DocumentRoot "C:/path-to-project/timetrackingBE/public"
     <Directory "C:/path-to-project/timetrackingBE/public/">
       Options +Indexes +Includes +FollowSymLinks +MultiViews
       AllowOverride All
       Require local
     </Directory>
    </VirtualHost>`
- Now you can use this back-end api from the front-end app if you set the `SERVER_URL` value to `http://timetracking.com`

## Running unit tests

Run `phpunit` to execute the php unit tests.
