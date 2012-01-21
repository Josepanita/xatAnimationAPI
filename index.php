<?php

require 'lib/Slim/Slim.php';
require 'lib/Slim/Views/TwigView.php';

TwigView::$twigDirectory = __DIR__ . '/lib/Twig/lib/Twig';

$app = new Slim(array(
            'view' => new TwigView,
            'views' => "TwigView"
        ));


//Home Route
$app->get('/', function () use($app) {
            $title = "XatTools";

            return $app->render("home.html", array(
                        'title' => $title
                    ));
        });

//POST route
$app->get('/conversor/', function () use($app) {
            $title = "XatTools ~ Conversor";

            return $app->render("conversor.html", array(
                        'title' => $title
                    ));
        });

$app->post('/convert/:url', function ($url) use($app) {
            
});

$app->run();