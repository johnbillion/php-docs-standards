# PHP Documentation Standards Tests

This abstract PHPUnit test case tests the standards and correctness of the inline documentation of your PHP functions,
classes, and methods.

## Installation

Add the package to your project's dev dependencies using Composer:

```bash
composer require johnbillion/php-docs-standards:~1.0 --dev
```

In your unit test bootstrap file, include the Composer autoloader. This will look something like this:

```php
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';
```

## Usage

Add a new test class to your test suite that extends the docs standards test case. The two abstract methods that need to
be implemented are `getTestFunctions()` and `getTestClasses()`. These methods return an array of function names and
class names, respectively, which are to be run through the test quite to test their documentation standards.

In the current version of the test case, the functions and classes must be loaded (or available for autoloading) in the
current request. A future version of this test case will use static analysis in order to remove this requirement.

```php
<?php

class TestMyDocsStandards extends \Johnbillion\DocsStandards\TestCase {

	/**
	 * Return an array of function names that will be run through the test suite.
	 *
	 * @return array Function names to test.
	 */
	protected function getTestFunctions() {
		return array(
			'my_function_1',
			'my_function_2',
		);
	}

	/**
	 * Return an array of class names whose methods will be run through the test suite.
	 *
	 * @return array Class names to test.
	 */
	protected function getTestClasses() {
		return array(
			'My_Class_1',
			'My_Class_2',
		);
	}

}
```
