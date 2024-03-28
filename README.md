# Basic Twig Template Views Demo

This demo uses the Twig templating engine to create a simple PHP website skeleton

## Tech stack

* [PHP](https://www.php.net/): A popular general-purpose scripting language that is especially suited to web development
* [Composer](https://getcomposer.org/): A Dependency Manager for PHP
* [Twig](https://twig.symfony.com/doc/3.x/): Template engine for PHP


## Installation

Make sure PHP and Composer are installed: <https://getcomposer.org/download/>

Then clone this repo to your local hard drive. For example:

```sh
gh repo clone danpoynor/basic-twig-template-views-demo
```

or

```sh
git clone https://github.com/danpoynor/basic-twig-template-views-demo.git
```

## Usage

Use [MAMP](https://www.mamp.info/en/mamp) or other server to run the code in your browser. Be sure to use the `public` directory as the document root (where the `index.php` file is). Start the server and view the app at the url such as <localhost:8888>.

## Developer Notes on How This Project Was Initially Created

1. Ensure PHP and Composer are installed.
2. Create a new directory for your app and cd into it.
3. Then run the following command to get the latest version of Twig:

```sh
composer require "twig/twig:^3.0"
```

This will create the initial project structure:

```sh
├── composer.json
├── composer.lock
└── vendor
    ├── autoload.php
    ├── composer/
    ├── symfony/
    └── twig/
```

3. Open your IDE in the current directory with soemthing like `code .`.
4. Create a `public` folder with an `index.php` file inside it.
5. Copy the [Basic API Usage](https://twig.symfony.com/doc/3.x/api.html) code from the documentation, or use something like this in the `index.php` file:

```php
<?php
require_once __DIR__ . '/.vendor/autoload.php';

// In this example the template is created directly in the file
$loader = new Twig_Loader_Array(array(
    'index' => 'Hello {{ name }}!',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index', array('name' => 'Fabien'));
```

Then follow the [Usage](#usage) notes above to preview the page and start developing.

Check code comments for additional notes.
