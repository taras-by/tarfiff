# RUN APPLICATION

Build/run containers:

    $ git clone git@github.com:taras-by/tariff.git
    $ cd tariff
    $ docker-compose build
    $ docker-compose up -d
    $ ./docker/console composer install
    $ ./docker/console php artisan db:install

Get tariffs: 

    curl -X GET \
      http://localhost:835/api/tariffs \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
      
Get tariff with ID = 1:

    curl -X GET \
      http://localhost:835/api/tariffs/1 \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
