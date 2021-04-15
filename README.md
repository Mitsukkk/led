## API to manage LED

## Routes

- [GET]   	api/led  				=> List all LED
- [POST]		api/led 				=> Add a new LED
- [GET]   	api/led/{ledId}		=> Display information of a specific LED (except Color)
- [DELETE]	api/led/{ledId}		=> Delete a specific LED
- [PUT]  		api/led/{ledId} 		=> Update information of a LED (except Color)
- [GET]		api/led/{ledId}/color  => Get color of a led
- [PUT]		api/led/{ledId}/color 	=> Update color of a led

## Installation
- Copy the contents of the .env.example file to copy it into the .env file
- Run docker containers :
```sh
docker-compose up -d
```
- Inside PHP container :
```sh
docker exec -it led_php_1 bash
composer update
```
- Create the led table using the DynamodDB interface

Postman Collection : https://filebin.net/9jv7ylrz91hav7h3
