<?php
namespace Johnbillion\DocsStandards\Tests;

/**
 * @requires PHP 7.0
 */
class TestCase extends \PHPUnit\Framework\TestCase {

	/**
	 * Perform a test that is expected to fail.
	 *
	 * @param  string|array $target_function The function name, or array of class name and method name.
	 * @param  string       $test_method     The TestCase method to perform the test.
	 * @param  string       $fail_message    The failure message to use if the test unexpectedly passes.
	 * @param  string       $expected_error  The expected error message.
	 * @return null
	 */
	protected function doFailTest( $target_function, $test_method, $fail_message, $expected_error ) {

		$case = new Stub_TestCase;

		try {

			call_user_func( array( $case, $test_method ), $target_function );

		} catch ( \PHPUnit\Framework\ExpectationFailedException $e ) {

			$expected = sprintf(
				$expected_error,
				$target_function . '()'
			);
			$this->assertContains( $expected, $e->getMessage() );

			return;

		}

		$this->fail( $fail_message );

	}

	/**
	 * Perform a test that is expected to pass.
	 *
	 * @param  string|array $target_function The function name, or array of class name and method name.
	 * @param  string       $test_method     The TestCase method to perform the test.
	 * @param  string       $fail_message    The failure message to use if the test unexpectedly fails.
	 * @return null
	 */
	protected function doPassTest( $target_function, $test_method, $fail_message ) {

		$case = new Stub_TestCase;

		try {

			call_user_func( array( $case, $test_method ), $target_function );

		} catch ( \PHPUnit_Framework_ExpectationFailedException $e ) {

			$this->fail( sprintf(
				"%s: Unexpected failure with message '%s'",
				$fail_message,
				$e->getMessage()
			) );

		}

	}

}
