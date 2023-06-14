
## Installation 

- Clone this repository 
- navigate to the `laravel-api` directory
- Copy `.env` file: `cp .env.example .env`
- Set the environment variables in `.env` file
- Install composer dependencies: `composer install`
- install node modules `npm install`
- Generate key: `php artisan key:generate`
- Run migration and seeders: `php artisan migrate:fresh --seed`
- compile vue components `npm run dev`
- serve app: `php artisan serve`

## unit tests

  unit tests can be found on the `tests` directory
- run : `./vendor/bin/phpunit` to run all tests.


## Deployment CI/CD Pipeline

The deployment pipeline will be triggered everytime you push to the master branch.
After making changes, go to the `Actions` tab on the repo
wait for the pipeline to finish

Then go to `http://thawing-sierra-45371.herokuapp.com` to see changes

