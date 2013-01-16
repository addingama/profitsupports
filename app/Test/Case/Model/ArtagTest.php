<?php
App::uses('Artag', 'Model');

/**
 * Artag Test Case
 *
 */
class ArtagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.artag',
		'app.article',
		'app.user',
		'app.category',
		'app.comment',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Artag = ClassRegistry::init('Artag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Artag);

		parent::tearDown();
	}

}
