## SHIPPING
### A practical assessment project

#### Requirements
1. Docker

#### Running
Create file `.env` file
```
APP_ENV=dev
API_SECRET_KEY=xxyyzz
```

`docker compose up --build`

#### Testing
1. `docker compose exec app bash`
2. `composer test`

#### Documentation
* [Wiki](https://github.com/tdshuma/shipping/wiki)