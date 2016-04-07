# Softkey handling example

This example shows how to handle the softkeys via XML minibrowser

## Usage in a Docker container

This repo provides also a ready to use Dockerfile in order to run the script in a self-contained Docker container without the need to install PHP and Apache into the host machine:

1. Build the container image: `docker build -t apache-php .`
1. Run the script into the container: `docker run -it --rm --name apache-php -p 8080:80 -v $(PWD):/var/www/html apache-php`
1. Now you can access the application via *http://IP_address/softkeys.php*
