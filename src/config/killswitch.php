<?php

/**
 * Add the URL that will return either true  or false in the body
 *
 * true  = kill switch activated and Laravel App will be put into maintenance mode
 * false = kill switch not activated and Laravel App will continue as normal.
 */
return [
    'url' => 'http://foo'
];