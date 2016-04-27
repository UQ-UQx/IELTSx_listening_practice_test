<?php
	header('Content-Type: application/json');
	require_once('config.php');
	require_once('lib/lti.php');
	require_once('lib/grade.php');
	$lti = new Lti($config,true);
	if(isset($config['use_db']) && $config['use_db']) {
		require_once('lib/db.php');
		Db::config( 'driver',   'mysql' );
		Db::config( 'host',     $config['db']['hostname'] );
		Db::config( 'database', $config['db']['dbname'] );
		Db::config( 'user',     $config['db']['username'] );
		Db::config( 'password', $config['db']['password'] );
	}
	$vars = array('user_id'=>$_POST['user_id'],'oauth_consumer_key'=>$_POST['lti_id'], 'lis_outcome_service_url'=>$_POST['lis_outcome_service_url'], 'lis_result_sourcedid'=>$_POST['lis_result_sourcedid']);
	$lti->setltivars($vars);
	require_once('model.php');
	
	require_once('quiz.php');
	$data = array();
	//$answers = getAllAnswers();
	$answers = $_POST['data'];
	$numberCorrect = 0;
	
	foreach($answers as $key=>$answer) {
		if(array_key_exists($key, $results)) {
			
			if($key == 'a_32'){
				$data[$key] = 'incorrect';
				
				if((strtolower($answer) == 'australia') && (strtolower($answers['a_31']) != 'australia')){
					
					$data[$key] = 'correct';
					$numberCorrect++;

				}elseif((strtolower($answer) != 'australia') && (strtolower($answers['a_31']) == 'australia')){
					
					$data[$key] = 'correct';
					$numberCorrect++;
				}
				
				
			}else{
				$data[$key] = 'incorrect';
				if(in_array(strtolower($answer), array_map('strtolower',$results[$key]))) {
					$data[$key] = 'correct';
					$numberCorrect++;
				}
			}
		}
	}
	$data["answers"] = $answers;
	//echo json_encode($answers);
	echo json_encode($data);
	$grade = $numberCorrect/40;
	//$gradeResponse;
	if($lti->grade_url() != 'No Grade URL'){
	
		send_grade($grade,$lti);
	}
	die();
?>