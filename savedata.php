<?php
	header('Content-Type: application/json');
	require_once('config.php');
	require_once('lib/lti.php');
	$lti = new Lti($config,true);
	if(isset($config['use_db']) && $config['use_db']) {
		require_once('lib/db.php');
		Db::config( 'driver',   'mysql' );
		Db::config( 'host',     $config['db']['hostname'] );
		Db::config( 'database', $config['db']['dbname'] );
		Db::config( 'user',     $config['db']['username'] );
		Db::config( 'password', $config['db']['password'] );
	}
	$vars = array('user_id'=>$_POST['user_id'],'oauth_consumer_key'=>$_POST['lti_id']);
	$lti->setltivars($vars);
	require_once('model.php');
	foreach($_POST['data'] as $q=>$a) {
		addAnswer($q,$a);
	}
	echo '{"status":"complete"}';
?>