CSS Rule Saver
==============

CSS Rule Saver works in much the same way that a browser might. It compares a list of CSS rules (e.g. `.foo { color: white; }` ) from a CSS file against an HTML file using the CSS selector (e.g. `.foo` ) to see which rules apply and should be saved. This might be useful if you have a large Sass-generated CSS file or framework but only need the sub-set of styles that may affect a small piece of mark-up.

## Robustness

This is not a very robust solution. It appears to work well on the examples I have but your mileage may vary. Pseudo-classes are ignored and instead the base selector for a pseudo-class is compared. I may also be missing selector or at-rule methods. Feel free to drop an issue if you notice this.

At the moment, CSS Rule Saver *does not* overwrite values for specific properties. Instead, it stacks declaration blocks for a specific selector. It works but it's a little verbose. I plan on fixing that.

CSS Rule Saver has not had any optimizations for speed or memory usage.

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
