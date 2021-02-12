## About Test Property Api

This application revolves around gathering data from a 3rd party service and building a CRUD interface to manage additional data.


### Installation
- Run command in bash terminal 
```bash
git clone https://github.com/pamekar/pworks.git && cd pworks
```
- Install required packages with
```bash
composer install
```
- Set up your DB environment, and ensure the DB credentials of your server matches with your .env file 
- Migrate and seed database
```bash
php artisan migrate:fresh --seed
```
- Run
```bash
php artisan serve
```
- Finally, Click this link https://127.0.0.1:8000, and we're good.

             
#### Missing
- Create new properties
- Update new properties

### Improvements
- Integrating with redis, sqs or rabbitmq to manage the 
- Updating properties from api via webhooks to improve performance
- Use Elasticsearch to speedup search process


