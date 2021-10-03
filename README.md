## About Appointment
Build the backend of an api to manage users and appointments. 

During covid, my dentist office specifically kept calling me to change appointments- It made me wonder how things are done from their end and how to possibly make the experience better overall. 

This api is specifically for a dentist’s office to help manage their database.

## If you would like to follow along in the series - The playlist link for this video can be found <a href = "https://www.youtube.com/playlist?list=PLxyLoVOL_gY5SzhYeWqDkKHxxl8hETqQb">here</a> <br>

## Tech stack
    - Laravel/PHP
    - SQL

## Project setup
- Laravel valet
    - If you do not have Laravel Valet installed, follow the instructions [here](https://laravel.com/docs/7.x/valet#the-park-command) 
        ##### TL/DR
        - `brew update`
        - `brew install php`
        - Install composer [here](https://getcomposer.org/)
        - `composer global require laravel/valet`. 
            Be sure the ~/.composer/vendor/bin directory is in your system's "PATH".
        - `valet install`
    - Directions to serve the site (https://laravel.com/docs/6.x/valet#serving-sites): 
        ##### TL/DR
        - In your terminal, make a new directory for the project: 
            - `mkdir ~/Code`
            - `cd ~/Code`
            - run `valet park`
    - Fork or clone project here into `~/Code` directory: [appointment api](git@github.com:tthompson899/appointment.git)
    - Once project is cloned, spin up the website at [appointment.test/api](http://appointment.test/api/)

- MySQL
    - `brew install mysql@5.7`
    - `brew services start mysql@5.7`

    - Once valet and project has been cloned locally, run `composer install`

## How to view api
Use Postman [install here](https://www.postman.com/downloads/) or browser to visit api route
    - Example route to visit [Get all users](http://appointment.test/api/users)

