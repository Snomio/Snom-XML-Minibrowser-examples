# Numverify integration

This small PHP script retrieves the number details from [Numverify](https://numverify.com) using the public APIs.

## Usage

1. You have to register an account on [Numverify](https://numverify.com) in order to get an API key.
1. Change the `api_key` variable according to your Numverify API key.
1. Add the `numverify.php` in your web server (PHP must be enabled)
1. Setup your Snom phone in order to retrieve the PHP script

## Usage in a Docker container

This repo provides also a ready to use Dockerfile in order to run the script in a self-contained Docker container without the need to install PHP and Apache into the host machine:

1. Build the container image: `docker build -t apache-php .`
1. Run the script into the container: `docker run -it --rm --name apache-php -p 8080:80 -v $(PWD):/var/www/html apache-php`
1. Now you can access the application via *http://IP_address/numverify.php*

## Screenshots

**Number input:**

![number input](img/input.bmp)

**Resul:**

![result](img/result.bmp)
