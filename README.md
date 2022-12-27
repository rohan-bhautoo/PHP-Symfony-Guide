<p align="center">
  <img width="400" height="100" src="https://symfony.com/logos/symfony_black_02.png">
</p>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-brightgreen.svg" />
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white" />
  <img alt="Symfony" src="https://img.shields.io/badge/Symfony-000000?logo=symfony&logoColor=white" />
  <img alt="Composer" src="https://img.shields.io/badge/Composer-7A6E7E?logo=composer&logoColor=white" />
</p>

This guide will help you to learn PHP Symfony Framework basics, the architecture and some advanced topics like Mailers, Validations, Notifications, etc. The full guide can be seen on the [Symfony Documentation](https://symfony.com/doc/current/index.html).

## Get Started

### Setup / Installation

#### PHP 8.1
Install PHP 8.1 or higher. Download the Thread safe version [here](https://windows.php.net/download#php-8.1).

<details><summary><b>Show Steps</b></summary>

1. Extract the downloaded zip file in ```C:\Program Files\``` directory.

2. Copy the full directory of the extracted folder.

3. Now click on Start Menu and search ```Environment variables``` and open it.

4. Under System variables, add a new value inside the ```Path``` variable and paste the full directory in step 2.

5. Save your changes and check the php version in command prompt.

    ```shell
    php --version
    PHP 8.1.13 (cli) (built: Nov 22 2022 15:49:14) (ZTS Visual C++ 2019 x64)
    Copyright (c) The PHP Group
    Zend Engine v4.1.13, Copyright (c) Zend Technologies
    ```

</details>

#### Composer
Composer will be used to install PHP packages. Download it [here](https://getcomposer.org/download/).

<details><summary><b>Show Installations</b></summary>

1. Windows Installer - The installer, which requires that you have PHP already installed, will download Composer for you and set up your PATH environment variable so you can simply call composer from any directory. Download and run [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe) - it will install the latest composer version whenever it is executed.

2. Command-line installation - To quickly install Composer in the current directory, run the following script in your terminal. Use this [guide to install Composer programatically](https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md).

    ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    ```

</details>

#### Installing Packages
A common practice when developing Symfony applications is to install packages([bundles](https://symfony.com/doc/current/bundles.html)) that provide ready-to-use features.

Most of the time this setup can be automated and that's why Symfony includes ```Symfony Flex```, a tool to simplify the installation/removal of packages in Symfony applications. Technically speaking, Symfony Flex is a Composer plugin that is installed by default when creating a new Symfony application and which automates the most common tasks of Symfony applications.

```shell
cd my-project/
composer require logger
```

### Create Project and Pages
Open your console terminal and run any of these commands to create a new Symfony application:

```shell
composer create-project symfony/skeleton:"6.2.*" my_project_directory
cd my_project_directory
composer require webapp
```

#### Running Symfony Applications
For local development, the most convenient way of running Symfony is by using the local web server provided by the symfony binary.

##### Using Symfony CLI to use Local Web Server
Download the binary file of the CLI [here](https://github.com/symfony-cli/symfony-cli/releases/download/v5.4.20/symfony-cli_windows_386.zip) and extract the execution file to your project directory.

```shell
# Run server in background with -d
symfony server:start -d
```

#### Route and Controller
A **Route** is the URL (e.g. /about) to your page and points to a controller.

A **Controller** is the PHP function you write that builds the page. You take the incoming request information and use it to create a Symfony Response object, which can hold HTML content, a JSON string or even a binary file like an image or PDF.

##### Creating new controllers
After running the command, a new ```controller``` and its ```twig``` file is created in their respective directory.

```shell
php bin/console make:controller
```

##### Annotation Routes
Instead of defining your route in YAML, Symfony also allows you to use ```annotation``` or ```attribute routes```. Attributes are built-in in PHP starting from PHP 8. In earlier PHP versions you can use annotations. To do this, install the annotations package:

```shell
composer require annotations
```

The route can be directly placed above the controller:

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
```

The page can be tested with Symfony Web Server at http://localhost:8000/index.

##### Twig Templates
If you're returning HTML from your controller, you'll probably want to render a template. Twig is the template engine used in Symfony applications. There are tens of default filters and functions defined by Twig, but Symfony also defines some filters, functions and tags to integrate the various Symfony components with Twig templates.

> Template files live in the templates/ directory, which was created for you automatically when you installed Twig.

```twig
{# templates/index/index.html.twig #}
<h1>Hello {{ controller_name }}! ✅</h1>
```

## Author

👤 **Rohan Bhautoo**

* Github: [@rohan-bhautoo](https://github.com/rohan-bhautoo)
* LinkedIn: [@rohan-bhautoo](https://linkedin.com/in/rohan-bhautoo)

## Show your support

Give a ⭐️ if this project helped you!
