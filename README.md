<p align="center">
  <img width="400" height="100" src="https://symfony.com/logos/symfony_black_02.png">
</p>
<h1 align="center">PHP Symfony Guide</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-brightgreen.svg" />
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white" />
  <img alt="Symfony" src="https://img.shields.io/badge/Symfony-000000?logo=symfony&logoColor=white" />
  <img alt="Composer" src="https://img.shields.io/badge/Composer-7A6E7E?logo=composer&logoColor=white" />
</p>

## Description
> A guide to help you with PHP Symfony Framwork basics, architecture and advanced topics.
>
> https://symfony.com/doc/current/index.html

## Prerequisite

### PHP 8.1
> Download it [here](https://windows.php.net/download#php-8.1) and choose the Thread safe version.

#### Install PHP on Windows
##### 1. Extract the downloaded zip file in ```C:\Program Files\``` directory
##### 2. Copy the full directory of the extracted folder
##### 3. Now click on Start Menu and search ```Environment variables``` and open it.
##### 4. Under System variables, add a new path and paste the full directory in step 2.
##### 5. Save your changes and check the php version in command prompt.

```shell
php --version
```

### Composer
> Composer will be used to install PHP packages. Download it [here](https://getcomposer.org/download/).

#### Windows Installer
> The installer - which requires that you have PHP already installed - will download Composer for you and set up your PATH environment variable so you can simply call composer from any directory.
>
> Download and run Composer-Setup.exe - it will install the latest composer version whenever it is executed. 

#### Command-line installation
> To quickly install Composer in the current directory, run the following script in your terminal.

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## Author

👤 **Rohan Bhautoo**

* Github: [@rohan-bhautoo](https://github.com/rohan-bhautoo)
* LinkedIn: [@rohan-bhautoo](https://linkedin.com/in/rohan-bhautoo)

## Show your support

Give a ⭐️ if this project helped you!
