# RUN APPLICATION

Build/run containers:

    $ git clone git@github.com:taras-by/tariff.git
    $ cd tariff
    $ docker-compose build
    $ docker-compose up -d
    $ ./docker/console composer install
    $ ./docker/console php artisan db:install

Run application: http://localhost:835
