# Images slideshow

This small examples implements an image slideshow using the `SnomIPPhoneImageFile` tag and the `fetch` tag.

Images are sored into the *images* folder, the php scripts increments the image number to retrieve.

## Usage

1. Add the `slideshow.php` in your web server (PHP must be enabled)
1. Setup your Snom phone in order to retrieve the PHP script

## Usage in a Docker container

This repo provides also a ready to use Dockerfile in order to run the script in a self-contained Docker container without the need to install PHP and Apache into the host machine:

1. Build the container image: `docker build -t apache-php .`
1. Run the script into the container: `docker run -it --rm --name apache-php -p 8080:80 -v $(PWD):/var/www/html apache-php`
1. Now you can access the application via *http://IP_address/slideshow.php*
