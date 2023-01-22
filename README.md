<p align="center">
  <img width="400" height="100" src="https://symfony.com/logos/symfony_black_02.png">
</p>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-brightgreen.svg" />
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white" />
  <img alt="Symfony" src="https://img.shields.io/badge/Symfony-000000?logo=symfony&logoColor=white" />
  <img alt="Composer" src="https://img.shields.io/badge/Composer-7A6E7E?logo=composer&logoColor=white" />
  <img alt="Docker" src="https://img.shields.io/badge/Docker-0db7ed?logo=docker&logoColor=white" />
  <img alt="Tailwind CSS" src="https://img.shields.io/badge/Tailwind CSS-3490DC?logo=tailwindcss&logoColor=white" />
</p>

This guide will help you to learn PHP Symfony 6 Framework basics. The concepts in this course include:
* Basic of handling requests
* Twig templates
* Databases and Doctrine
* Doctrine Relations
* Querying the database
* Authentication (registration, e-mail confirmation, login page, banning users)
* Authorization of users (roles, voters)
* User permission system (role-based)
* File uploads and displaying uploaded images
* Sending e-mail

You'll learn all this while building a fun and interesting project, a Twitter-like clone, using the most modern CSS framework Tailwind CSS.

<p align="center">
  <img src="https://i.ibb.co/k3k9JXP/How-Symfony-Works-2x.png">
</p>

## Get Started

### Setup / Installation

#### PHP 8.1
PHP will be used  to run a built-in server and run console commands. Install PHP 8.1 or higher. Download the Thread safe version [here](https://windows.php.net/download#php-8.1).

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

#### Symfony CLI
Download the 386 binaries [here](https://symfony.com/download).

<details><summary><b>Show Installations</b></summary>
  
  1. Extract the ZIP file to C:\symfony-cli.
  
  2. Add to the Path environment variable under ***User Variables***.
  
  3. Run ```symfony``` in terminal to see the CLI version and commands.
  
  <p align="center">
    <img width="600" height="400" src="https://user-images.githubusercontent.com/47154593/212466111-18f4d35e-87b7-47ea-a3cd-04be8493f3f5.png">
  </p>

</details>

#### Docker
Docker will be used to run a database server and db admin panel.

## Symfony 101

### Creating Project
Open your console terminal and run any of these commands to create a new Symfony application:

#### Symfony-cli
```shell
symfony new my_project_directory --version="6.2.*"
```

#### Composer
```shell
composer create-project symfony/skeleton:"6.2.*" my_project_directory
cd my_project_directory
composer require webapp
```

#### Running Symfony Applications
For local development, the most convenient way of running Symfony is by using the local web server provided by the symfony binary.

##### Using Symfony CLI to run Local Web Server

```shell
# Run server in background with -d
symfony server:start -d
```

### Symfony Check

#### Technical Requirements
```shell
symfony check:requirements
```

#### Security
```shell
symfony check:security
```

### Project Structure
* ```config/```     - Contains all configuration files such as routes, services and packages.
* ```migrations/``` - Contains all doctrine migration class files.
* ```src/```        - Contains all PHP code.
* ```templates/```  - Contains all Twig templates.
* ```bin/```        - Contains files for the bin/console command. Ex: ```php bin/console <command>```
* ```var/```        - Contains all automatically-created files like cache files and logs.
* ```vendor/```     - Contains all third-party libraries. These are downloaded via the Composer package manager.
* ```public/```     - It is the document root of the project where any publicly accessible files are contained.

### Controllers - Returning a Response
A **Controller** is the PHP function you write that builds the page. You take the incoming request information and use it to create a Symfony Response object, which can hold HTML content, a JSON string or even a binary file like an image or PDF.

#### Creating new controllers
After running the command, a new ```controller``` and its ```twig``` file is created in their respective directory.

```shell
symfony console make:controller HelloController
```

### Routing PHP 8 Attributes
A **Route** is the URL (e.g. /about) to your page and points to a controller.

PHP attributes allow to define routes next to the code of the controllers associated to those routes. Attributes are native in PHP 8 and higher versions.

```php
#[Route('/hello', name: 'app_hello')]
```

#### Route Parameter Requirements
In order to differentiate between two routes, ex: ```/hello/{id}``` & ```/hello/{personId}```, the **requirements** option will be used.

The **requirements** option defines the PHP regular expressions that route parameters must match for the entire route to match.

```php
#[Route('/hello/{id}', name: 'app_hello', requirements: ['id' => '\d+'])]
```

Requirements can be inlined in each parameter using the syntax ```{parameter_name<requirements>}```.

```php
#[Route('/hello/{id<\d+>}', name: 'app_hello')]
```

##### Optional Parameters
Optional Parameters are added if a parameter value is null. For example, if a user visits ```/hello/1```, it will match. But if they visit ```/hello```, it will not match. A default value can be added when visiting the ```/hello``` page for the ```{id}``` parameter.

```php
#[Route('/hello/{id}', name: 'app_hello', requirements: ['id' => '\d+'])]
public function index(int $id = 1): Response
{
    // ...
}
```

Default values can also be inlined in each parameter using the syntax ```{parameter_name?default_value}```.

```php
#[Route('/hello/{id<\d+>?1}', name: 'app_hello')]
```

##### Priority Parameter
Symfony evaluates routes in the order they are defined. If the path of a route matches many different patterns, it might prevent other routes from being matched. The optional parameter ```priority``` can be set to control the routes priority.

```php
#[Route('/hello/{id<\d+>?1}', name: 'app_hello', priority: 2)]
```

### Twig Templates
A template is the best way to organize and render HTML from inside your application, whether you need to render HTML from a controller or generate the contents of an email. Templates in Symfony are created with Twig: a flexible, fast, and secure template engine.

The Twig templating language allows you to write concise, readable templates that are more friendly to web designers and, in several ways, more powerful than PHP templates.

```twig
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Symfony!</title>
    </head>
    <body>
        <h1>{{ page_title }}</h1>

        {% if user.isLoggedIn %}
            Hello {{ user.name }}!
        {% endif %}

        {# ... #}
    </body>
</html>
```

Twig syntax is based on these three constructs:

* ```{{ ... }}```, used to display the content of a variable or the result of evaluating an expression.
* ```{% ... %}```, used to run some logic, such as a conditional or a loop.
* ```{# ... #}```, used to add comments to the template (unlike HTML comments, these comments are not included in the rendered page).

Using the ```AbstractController``` in the Controller class to render the Twig template.

```php
class HelloController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }
}
```

#### Twig Template Inheritance
The ```extends``` tag can be used to extend a template from another one. We also need to surround all of our content with a ```{% block body %}``` tag and a closing ```{% endblock %}```.

```twig
{# Child template #}
{% extends "base.html" %}
{% block body %}
    <div class="row">
        {# ... #}
    </div>
{% endblock %}
```

```twig
{# Parent template #}
{% block body %}{% endblock %}
```

#### Twig Control Structures
##### For Loop
A for loop can be used inside a twig template to display all the values from an array (from controller).

```twig
{% for num in tests %}
  <div>{{ num }}</div>
{% endfor %}
```

##### Conditional Statement
```twig
{% for num in tests %}
    {% if num <= 2 %}
        <div>{{ num }}</div>
    {% else %}
        <div>Num greater than 2</div>
    {% endif %}
{% endfor %}
```

#### Twig Filters & Functions
##### Filters
Filters in Twig can be used to modify variables. Filters are separated from the variable by a pipe symbol. They may have optional arguments in parentheses. 

> *A list of filters can be find [here](https://twig.symfony.com/doc/3.x/filters/index.html).*

```twig
{{ content|safe_join(", ")|lower }} 
```

##### Functions - Partial Templates
Twig provides a number of handy functions that can be used directly within Templates.

> *A list of functions can be find [here](https://twig.symfony.com/doc/3.x/functions/index.html).*

###### Include Function
The [include](https://twig.symfony.com/doc/3.x/functions/include.html) function returns the rendered content of a template. Included templates have access to the variables of the active context.

```twig
{{ include('template.html') }}
```

###### Partial Templates
Partial Twig templates help you reduce code duplication by adding code in a template and including it in multiple other templates. Partial templates starts with an ```_```. The ```_``` prefix is optional, but it's a convention used to better differentiate between full templates and template fragments.

```twig
{% for num in tests %}
    {% if num.test <= 2 %}
        <div>{{ num.test }}</div>
    {% else %}
        <div>Num greater than 2</div>
    {% endif %}
    {{ include('hello/_test.html.twig', {date: num.created}) }}
{% endfor %}
```

### Generating Links to Routes
Use the ```path()``` Twig function to link pages and pass the route name as the first argument and the route parameters as the optional second argument.

```twig
<a href={{ path('app_id', {id: num.test}) }}>{{ num.test }}</a>
```

### Symfony Maker
Symfony Maker helps you create empty commands, controllers, form classes, tests and more so you can forget about writing boilerplate code.

#### Installation
```powershell
composer require --dev symfony/maker-bundle
```

#### Usage
```powershell
symfony console list make
```

### Symfony Profiler
The profiler is a powerful development tool that gives detailed information about the execution of any request.

<p align="center">
  <img width="600" height="400" src="https://symfony.com/doc/6.2/_images/web-interface.png">
</p>

## Databases and Doctrine ORM
Symfony provides all the tools you need to use databases in your applications thanks to Doctrine, the best set of PHP libraries to work with databases. These tools support relational databases like MySQL and PostgreSQL and also NoSQL databases like MongoDB.

<p align="center">
  <img src="https://i.ibb.co/Ytc0VLY/Databases-Doctrine-2x.png">
</p>

### Docker
Docker is a software platform that allows you to build, test, and deploy applications quickly. Docker packages software into standardized units called containers that have everything the software needs to run including libraries, system tools, code, and runtime.

<p align="center">
  <img src="https://i.ibb.co/xDzgmLM/Docker-2x.png">
</p>

#### MySQL Server and Connection
```yml
version: "3.8"
services:
  mysql:
    image: mariadb:10.8.3
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
    ports:
      - 3306:3306

  adminer:
    image: adminer
    restart: always
    ports:
      - 8080:8080
```

* Configure the database connection by changing the ```DATABASE_URL``` in ```.env``` file.
  ```
  DATABASE_URL="mysql://root:root@127.0.0.1:3306/SymfonyGuide?serverVersion=mariadb-10.8.3&charset=utf8mb4"
  ```
* Change the ```server_version``` in ```doctrine.yaml``` file.
  ```yaml
  doctrine:
      dbal:
          url: '%env(resolve:DATABASE_URL)%'
          server_version: '10.8.3'
  ```
* Create database with Symfony command.
  ```
  symfony console doctrine:database:create
  ```
* If you obtain error ```could not find driver in ExceptionConverter.php```, then enable the extension ```pdo_mysql``` in ```php.ini``` file.

### Entities
Entities are PHP Objects that can be identified over many requests by a unique identifier or primary key.

```
symfony console make:entity
```

### Migrations
Database migrations are a way to safely update your database schema both locally and on production. Instead of running the doctrine:schema:update command or applying the database changes manually with SQL statements, migrations allow to replicate the changes in your database schema in a safe manner.

* Create migration file in the migrations folder with the SQL query and with the ```up()``` and ```down()``` functions.
  ```
  symfony console make:migration
  ```
* Verify the status of the migration.
  ```
  symfony console doctrine:migrations:status
  ```
* Execute the migration.
  ```
  symfony console doctrine:migrations:migrate 
  ```
* Reverse a migration.
  ```
  symfony console doctrine:migrations:migrate prev
  ```
* Execute migration on server without the need to interact with the warning message.
  ```
  symfony console doctrine:migrations:migrate --no-interaction
  ```

### Doctrine Fixtures
Fixtures are used to load a "fake" set of data into a database that can then be used for testing or to help give you some interesting data while you're developing your application.

#### Installation
```powershell
composer require --dev orm-fixtures
composer require --dev doctrine/doctrine-fixtures-bundle
```

#### Usage
```php
public function load(ObjectManager $manager): void
    {
        $microPost1 = new MicroPost();
        $microPost1->setTitle('Welcome to Mauritius');
        $microPost1->setText('Port-Louis');
        $microPost1->setCreated(new DateTime());
        $manager->persist($microPost1);
        $manager->flush();
    }
```

```
symfony console doctrine:fixtures:load
```

### Repositories
A repository is a term used by many ORMs. It means the place where our data can be accessed from, a repository of data. This is to distinguish it from a database as a repository does not care how its data is stored.

* Retrieve all data
  ```php
  $microPostRepository->findAll()
  ```
* Retrieve data by id
  ```php
  $microPostRepository->findOne(1)
  ```
* Retrieve one data corresponding to title
  ```php
  $microPostRepository->findOneBy(['title' => 'Welcome to Mauritius'])
  ```
* Retrieve all data corresponding to title
  ```php
  $microPostRepository->findBy(['title' => 'Welcome to Mauritius'])
  ```
* Add new data in table
  ```php
  $microPost = new MicroPost();
  $microPost->setTitle('Welcome to Germany');
  $microPost->setText('Belgium');
  $microPost->setCreated(new DateTime());
  $microPostRepository->save($microPost, true);
  ```
* Update existing data in table
  ```php
  $microPost = $microPostRepository->find(2);
  $microPost->setTitle('Welcome update');
  $microPostRepository->save($microPost, true);
  ```
* Remove data from table
  ```php
  $microPost = $microPostRepository->find(2);
  $microPostRepository->remove($microPost, true);
  ```
> *The function ```flush()``` flushes all changes to objects that have been queued up to now to the database. This effectively synchronizes the in-memory state of managed objects with the database.*

### Param Converter
The default Symfony FrameworkBundle implements a basic but robust and flexible MVC framework. [SensioFrameworkExtraBundle](https://symfony.com/bundles/SensioFrameworkExtraBundle/current/index.html) extends it to add sweet conventions and annotations. It allows for more concise controllers.

```
composer require sensio/framework-extra-bundle
```

```php
/**
 * @Route("micro-post/{microPost}", name="app_micro_post_show")
 */
public function showOne(MicroPost $microPost): Response
{
    dd($microPost);
    return $this->render('micro_post/index.html.twig', [
        'controller_name' => 'MicroPostController',
    ]);
}
```

The ```{microPost}``` variable in the URL will be equal to the ```id``` of the ```MicroPost``` object in the database. By default, it is fetching by the primary key but this can be configurable ([Documentation](https://symfony.com/bundles/SensioFrameworkExtraBundle/current/annotations/converters.html)).

## Forms

### Handling Form Submission

### Flash Messages & Redirects

### Customizing Form Rendering

### Form Themes

### Edit Form

### Form Classes

## Author

👤 **Rohan Bhautoo**

* Github: [@rohan-bhautoo](https://github.com/rohan-bhautoo)
* LinkedIn: [@rohan-bhautoo](https://linkedin.com/in/rohan-bhautoo)

## Show your support

Give a ⭐️ if this project helped you!
