<?php

require 'lib/Slim/Slim.php';
require 'lib/Slim/Views/TwigView.php';
require 'lib/functions.inc';

TwigView::$twigDirectory = __DIR__ . '/lib/Twig/lib/Twig';

$app = new Slim(array(
            'view' => new TwigView,
            'views' => "TwigView"
        ));

$app->view()->setData('root_uri', $app->request()->getRootUri());
$app->view()->setData('resource_uri', $app->request()->getResourceUri());

//Home Route
$app->get('/', function () use($app) {
            $title = "XatTools";


            return $app->render("home.php", array('title' => $title));
        });

//POST route
$app->get('/conversor/', function () use($app) {
            $title = "XatTools ~ Conversor";

            return $app->render("conversor.php", array(
                        'title' => $title
                    ));
        });

$app->get('/tester/', function () use($app) {
            $title = "XatTools ~ Tester";

            return $app->render("tester.php", array(
                        'title' => $title
                    ));
        });

$app->get('/aboutme/', function () use($app) {
            $title = "XatTools ~ About Me";

            return $app->render("aboutme.php", array(
                        'title' => $title
                    ));
        });

$app->run();