<?php
$dictionary = [
	'selector' => [
		// Give 'foo' selector 'FOO' name.
		'foo' => 'FOO'
	],
	'validator_error' => [
		// Translate the \gajus\vlad\validator\not_empty is_empty error message.
		'gajus\vlad\validator\not_empty' => [
			'is_empty' => [
				'{vlad.subject.name} laukelis negali būti paliktas tuščias.',
				'Laukelis negali būti paliktas tuščias.'
			]
		]
	],
	'validator_error_selector' => [
		// Replace the default not_empty is_empty error message for a specific selector.
		'gajus\vlad\validator\not_empty is_empty baz' => 'BAZ is the most important input. You absolutely cannot leave it empty.'
	]
];

$translator = new \gajus\vlad\Translator($dictionary);

$vlad = new \gajus\vlad\Vlad($translator);

$_POST = [
	'bar' => '',
	'baz' => '',
	'qux' => ''
];

$test = $vlad->test([
	[
		['foo', 'bar', 'baz'],
		['not_empty']
	]
]);

$result = $test->assess(); // If no $input parameter provided, assess will use $_POST.
?>
<pre><code><?php var_dump($result->getFailed())?></code></pre>