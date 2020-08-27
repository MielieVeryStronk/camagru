# Camagru
 A small web application allowing you to do basic photo editing and posting using your webcam and some predefined images.

Created using:
- PHP
- HTML
- CSS
- JavaScript
- SQL database.

## Requirements

- Have [MAMP](https://bitnami.com/stack/lamp/installer) installed.
- JavaScript enabled browser.
- Sendmail for sending emails.
 
## Linux Installation

1. Clone the repo to ~/lamp/apache2/htdocs
2. Install sendmail:
```sudo apt-get install sendmail```
3. Configure PHP to use sendmail by uncommenting this line in the PHP configuration file at installdir/php/etc/php.ini:
```sendmail_path = "env -i /usr/sbin/sendmail -t -i"```
4. Launch the bitnami LAMP stack, and start the apache server and the MySQL DB.
5. Navigate to [setup.php](http://localhost:8080/camagru/utils/setup.php) OR to the appropriate port on your machine.
 - This should create and seed the database for you.
6. Now you can go to the [home page](http://localhost:8080/camagru) and continue from there!

## State of project
Project is closed. There will be no more updates.

## License
[MIT](https://choosealicense.com/licenses/mit/)
