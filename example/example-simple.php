<?php

/*!
 * CSS Rule Saver Example - v0.1.0
 *
 * Copyright (c) 2013 Dave Olsen, http://dmolsen.com
 * Licensed under the MIT license
 *
 */

require "css-rule-saver.php";

// initialize the class
$crs = new cssRuleSaver;

// load the CSS & HTML files to compare
$crs->loadCSS("example-data/example.css");
$crs->loadHTML("example-data/example.html");

// save only the CSS rules that affect the given piece of mark-up
$results = $crs->saveRules();

print $results;
