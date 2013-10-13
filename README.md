CSS Rule Saver
==============

CSS Rule Saver compares a list of CSS rules against an HTML file to see which rules apply and should be saved. Useful if you require only a subset of CSS rules for a page or project.

## Robustness

I'm not positive this is the most robust solution yet. It works for the examples I'm working with but your mileage may vary. If something is missing or if selectors aren't recognized let me know. I also haven't optimized for memory usage or speed.

## Usage

A simple example shows how CSS Rule Saver can be used to compare the rules from one CSS file against one HTML file.

```php
require "css-rule-saver.php";

// initialize the class
$crs = new cssRuleSaver;

// load the CSS & HTML files to compare
$crs->loadCSS("example.css");
$crs->loadHTML("example.html");

// save only the CSS rules that affect the given piece of mark-up
$results = $crs->saveRules();

print $results;
```

The `loadHTML()` and `saveRules()` methods can be called multiple times even while loading only one CSS file via the `loadCSS()` method. For example, the following would compare the rules in `example.css` against each HTML document and print the results for each.

```php
require "css-rule-saver.php";

// initialize the class
$crs = new cssRuleSaver;

// load the CSS file to compare
$crs->loadCSS("example.css");

// loop over a list of files & print out the matching rules
$files = array("1.html","2.html","3.html");
foreach ($files as $file) {
	$crs->loadHTML($file);
	$results = $crs->saveRules();
	print "Results for ".$file.":\n";
	print $results;
	print "\n\n";
}
```

## Credits

This library relies on php-selector developed by TJ Holowaychuk and improved by others.
