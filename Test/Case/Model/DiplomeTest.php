<?php
App::uses('Diplome', 'Model');

/**
 * Diplome Test Case
 *
 */
class DiplomeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diplome',
		'app.user',
		'app.diplomes_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Diplome = ClassRegistry::init('Diplome');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Diplome);

		parent::tearDown();
	}

}
