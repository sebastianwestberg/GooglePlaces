# Google Places API wrapper

### Instructions

Clone repository:
```
git clone https://github.com/sebastianwestberg/GooglePlaces.git
```

Add your Google Developer API key to `web/index.php`:
```
# web/index.php
...
$app['API_key'] = '';
```

Run docker-compose:
```
docker-compose up -d
```

Install dependencies:
```
docker-compose exec php bash
cd ../api
composer update
```

Cross your fingers and run the tests:
```
vendor/bin/phpunit tests/
```

Available endpoints:

* /stores - GET Collection of resources (optionally /stores?pageToken=token)
* /stores/{place_id} - GET a resource by place_id
