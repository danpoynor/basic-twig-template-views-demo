<?php
// Include the Composer's autoloader script
require_once __DIR__ . '/../vendor/autoload.php';

// Create an instance of the ArrayLoader class from the Twig library.
// The ArrayLoader class loads templates from an associative array, 
// where the keys are the template names and the values are the template contents.
// In this case, a template named 'index' is being created with the content 
// 'Hello {{ name }}!'. The {{ name }} part is a placeholder that will be 
// replaced with a real value when the template is rendered.
// $loader = new \Twig\Loader\ArrayLoader([
//     'index' => 'Hello {{ name }}!',
// ]);

// Create an instance of the FilesystemLoader class with the path to the
// templates directory as an argument. The FilesystemLoader class loads
// templates from the filesystem, where the template names are the file paths.
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');

// Create a new instance of the Environment class from the Twig library, 
// passing the previously created loader as an argument.
// The Environment class is the main entry point of the Twig library. 
// It's responsible for storing the configuration and environment variables, 
// and for rendering templates.
$twig = new Twig\Environment($loader);

// Finally, the `render` method of the `Environment` class is being called to 
// render the 'index' template. The second argument to the `render` method is 
// an associative array that provides the values for the placeholders in the 
// template. In this case, the 'name' placeholder will be replaced with the 
// string 'Fabien'. The rendered template is then outputted with the 
// `echo` statement.
// echo $twig->render('index', ['name' => 'Fabien']);

// Define the navigation links with their respective URLs and captions
$nav = [
    'home' => [
        'href' => '/',
        'caption' => 'Welcome',
        'status' => false,
    ],
    'about' => [
        'href' => '/about',
        'caption' => 'About Us',
        'status' => false,
    ],
    'services' => [
        'href' => '/services',
        'caption' => 'Our Services',
        'status' => false,
    ],
    'contact' => [
        'href' => '/contact',
        'caption' => 'Contact Us',
        'status' => false,
    ],
];

// Not a proper routing solution and not the most robust conditional, 
// but this works for this simple example.
if (substr($_SERVER['REQUEST_URI'], 0, 8) ==  '/contact') {
    $nav['contact']['status'] = 'active';
    echo $twig->render('pages/contact.twig', array('nav' => $nav, 'post' => $_POST));
} elseif (substr($_SERVER['REQUEST_URI'], 0, 6) ==  '/about') {
    $nav['about']['status'] = 'active';
    echo $twig->render('pages/about.twig', array('nav' => $nav));
} elseif (substr($_SERVER['REQUEST_URI'], 0, 9) ==  '/services') {
    $nav['services']['status'] = 'active';
    echo $twig->render('pages/services.twig', array('nav' => $nav));
} else {
    $nav['home']['status'] = 'active';
    echo $twig->render('pages/home.twig', array('name' => 'fabien', 'nav' => $nav));
}
