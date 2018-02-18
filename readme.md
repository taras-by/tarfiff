# How To Use It

Build/run containers and install Application:

    $ git clone git@github.com:taras-by/tariff.git
    $ cd tariff
    $ cp .env.example .env
    $ docker-compose build
    $ docker-compose up -d
    $ ./docker/console composer install
    $ ./docker/console php artisan key:generate
    $ ./docker/console php artisan db:install

Get tariffs: 

    curl -X GET \
      http://localhost:835/api/tariffs \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
    
Request with filter:
    
    curl -X GET \
      'http://localhost:835/api/tariffs?filter=%7B%22ids%22%3A%5B1%2C3%5D%2C%22keys%22%3A%5B%22driving%22%5D%7D' \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
      
The "filter" parameter is a JSON string with urlencoding:

    {"ids":[1,3],"keys":["driving"]}
    

Get tariff with ID = 1:

    curl -X GET \
      http://localhost:835/api/tariffs/1 \
      -H 'cache-control: no-cache' \
      -H 'content-type: application/json'
      
JSON response:

    {
        "id": 1,
        "name": "Car reservation",
        "key": "reservation",
        "prices": [
            {
                "type": "basic",
                "price": "2.00",
                "config": {
                    "time_unit": "minute"
                }
            },
            {
                "type": "fix_for_interval_after_start",
                "price": "0.00",
                "config": {
                    "time_unit": "minute",
                    "interval_start": 0,
                    "interval_end": 20
                }
            },
            {
                "type": "fix_for_time_interval",
                "price": "0.00",
                "config": {
                    "time_start": "23:00:00",
                    "time_end": "7:00:00"
                }
            }
        ]
    }
