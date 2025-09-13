<?php
include '../HoneyWeb/classes/components.php';
$app = require('../fatfree-core-master/base.php');
$app = Base::instance();
$app->set('DEBUG', '1');
$app->route('GET /', function () {HomePage::HomePage();});
$app->route('GET /shop', function () {ShopPage::ShopPage();} );
$app->route('GET /gallery', function () {GalleryPage::GalleryPage();} );
$app->route('GET /blog', function () {BlogPage::BlogPage();} );
$app->route('GET /buy', function(){Buy::Buy();});
$app->run();