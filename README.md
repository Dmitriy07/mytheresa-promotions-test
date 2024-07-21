# Mytheresa test task

The project probably will not work on Windows.

### Required the host machine set up. You should have installed:

- Docker and Docker compose
- GNU Make

### Project installation steps:

1. Clone this repository, and navigate to the cloned directory.
2. In the terminal run command `make up`, it will start the environment.
3. In the browser navigate to url http://localhost:8080/products?category=boots&priceLessThan=99001 to get the results.
Changing the `category` or `priceLessThan` you will get different results
4. To run the tests run the command `make tests` in the terminal.
5. To destroy the environment run `make down`.

#### Project structure
The application logic stored in a `app/src/Mytheresa` folder

The migrations are in a `app/db/migrations` folder

The tests are in a `app/tests` folder
