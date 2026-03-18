## SHIPPING
### A practical assessment project

#### Requirements
1. Docker

#### Running
1. Create file `.env` file
```
APP_ENV=dev
API_SECRET_KEY=xxyyzz
```
2. `docker compose up --build`
3. `docker compose exec app composer install`
4. Navigate to `localhost:8080`

#### Testing
1. `docker compose exec app composer test`

#### Documentation
* [Wiki](https://github.com/tdshuma/shipping/wiki)

#### Demo
* [Wiki](https://www.goldilocksgroup.co.za/fastway)