<?php
class First extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'articles' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
					'category_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
					'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'published' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL)
				),
				'comments' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'article_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
					'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'published' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
				),
				'categories' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
				),
				'tags' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
					'tag' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
					'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'firstname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'lastname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'articles', 'comments', 'groups', 'tags', 'users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
