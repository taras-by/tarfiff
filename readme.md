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
    
Request with filter:
    
    curl -X GET \
      'http://localhost:835/api/tariffs?filter=%7B%22ids%22%3A%5B1%2C3%5D%2C%22keys%22%3A%5B%22baby_car_seat%22%5D%7D' \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
      
The "filter" parameter is a JSON string with urlencoding:

    {"ids":[1,3],"keys":["baby_car_seat"]}
    

Get tariff with ID = 1:

    curl -X GET \
      http://localhost:835/api/tariffs/1 \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
