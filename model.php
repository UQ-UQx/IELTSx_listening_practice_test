<?php
	function addAnswer($qid,$answer) {
		global $lti;
		$db = Db::instance();
		$modified = date('Y-m-d H:i:s');
		$existing = getAnswer($qid);
		if(!$existing) {
			$db->create('answers', array('lti_id'=>$lti->lti_id(),'user_id'=>$lti->user_id(),'question_id'=>$qid,'answer'=>$answer,'created'=>$modified,'updated'=>$modified));
		} else {
 			//$db->update('answers', 'answer', $answer, $existing->id);
 			$db->update('answers', array('answer'=>$answer,'updated'=>$modified), $existing->id);
		}
	}
	
	function getAnswer($qid) {
		global $lti;
		$db = Db::instance();
		$select = $db->query( 'SELECT * FROM answers WHERE user_id = :user_id AND lti_id = :lti_id AND question_id = :question_id', array( 'user_id' => $lti->user_id(), 'lti_id' => $lti->lti_id(), 'question_id' => $qid ) );
		while ( $row = $select->fetch() ) {
			return $row;
		}
		return null;
	}
	
	function getAllAnswers() {
		global $lti;
		$db = Db::instance();
		$select = $db->query( 'SELECT * FROM answers WHERE user_id = :user_id AND lti_id = :lti_id', array( 'user_id' => $lti->user_id(), 'lti_id' => $lti->lti_id() ) );
		$results = array();
		while ( $row = $select->fetch() ) {
			$results[$row->question_id] = $row->answer;
		}
		return $results;
	}
?>