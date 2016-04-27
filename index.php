<?php require_once('inc/header.php'); ?>
<style type='text/css'>
	div.page {
		border:1px solid #000;
	}
	
	#ieltsLPT{
		
		font-family: Arial !important;
		
	}
	
	
</style>

</head>
<body id="ieltsLPT">
<?php
	$lti->requirevalid();
	require_once('model.php');
?>
<div class='header'>
<!-- <h1>Listening Practice Test</h1> -->

<audio id="audiofile">
  <source src="audiofile.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>

<?php
	require_once('quiz.php');
?>
<ul class='pagination pagination-lg'>
	<li>
      <a class='page_prev' aria-label="Previous" href="javascript:loadPage('prev')">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php
	$pgnum = 1;
	foreach($quiz as $page) {
		$pgnumtext = $pgnum-1;
		if($pgnum == 1) {
			$pgnumtext = 'Start';
		}
		else if($pgnum == sizeOf($quiz)) {
			$pgnumtext = 'Answer Sheet';
		}
		echo '<li><a class="page_'.$pgnum.'" href="javascript:loadPage('.$pgnum.');">'.$pgnumtext.'</a></li>';
		$pgnum += 1;
	}	
?>
	<li>
      <a class='page_next' aria-label="Next" href="javascript:loadPage('next')">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
</ul>
</div>


<script type='text/javascript' src="https://tools.ceit.uq.edu.au/audioplayer/load.js"></script>





<div id='testme' class="toggleButtons">
		<div id="myAudioContainer" style="height: 50px !important;" class="audioplayer" data-audiofile="tools.ceit.uq.edu.au/ielts_ltis/listening_practice_test/1.7.2.3-Listening_Practice_Test_V2.mp3" data-hidetimeline="false" data-showsubtitles="false"></div>
		<br>
		<input class="timer_button" value="Show Timer" data-duration="600" style="text-align: center;" type="button" />

		
</div>

<style>
	
	div.toggleButtons {
    text-align:center;
  }
  div.toggleButtons a {
    border:1px solid #19A0E3;
    padding:10px;
    margin:5px;
    display:inline-block;
    text-decoration: none;

  }
  div.toggleButtons a:hover {
/*     border:1px solid #BC963A; */
    background:#19A0E3;
    color:white;

  }
  div.toggleButtons a.selected {
    background:#19A0E3;
    color:#fff;
  }
	
</style>

<script type='text/javascript' src="https://tools.ceit.uq.edu.au/timer/timer2.0.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
    setTimeout(function(){
     close_timer(closecall);
    },500);
  });
  $('.timer_button').on('click', function(event) {
    if($(event.target).attr('data-timershown') == 0){
  		opentimer(event.target);
    }else{
    	close_timer(closecall);
    }
     
  });
  function opentimer(timerbutton){
    $('.timer_button').attr('value','Show Timer');
    $('.timer_button').attr('data-timershown', '0');
    duration = $(timerbutton).attr('data-duration'); //set Duration in seconds
    countdown = false //MUST HAVE duration set to use countdown - set to true if you want the timer to count down and stop 
    pausable = true; //set false to disable pause button
    closeable = true; //set false to remove close button
    container = null; //set to the id of a container e.g. 'timercontainer'
    alarm_bell = "bell.mp3"; //url of alarm tone on duration, leave black if alarm is not needed
  	createTimer(pausable, closeable, duration, alarm_bell, countdown, timecall, null, closecall, container);
   $(timerbutton).attr('value','Hide Timer');
    $(timerbutton).attr('data-timershown', '1');
  }
  function timecall(){
    //$('#timerdisplay').css({'color':'red'});
  } 
  function closecall(){   
   	$('.timer_button').attr('value','Show Timer');
    $('.timer_button').attr('data-timershown', '0');
  }
</script>



<!--
<script type='text/javascript' src="https://tools.ceit.uq.edu.au/timer/timer2.0.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
    setTimeout(function(){
	    close_timer(closecall);
    },100);
  });
  function opentimer(){
	console.log('running');
   	duration = 600;
    countdown = false;
    pausable = true;
    closeable = true;
  	createTimer(pausable, closeable, duration, countdown, timecall, null, closecall, null);
  	$('#timer-button').attr('value','Hide Timer');
    $('#timer-button').attr('onclick', 'close_timer('+closecall+');');
    //createTimer(pausable, closeable, duration, countdown, time_callback, start_callback, close_callback, containerID)
  }
  function timecall(){
    //$('#timerdisplay').css({'color':'red'});
  }  
  function closecall(){   
  	$('#timer-button').attr('value','Show Timer');
    $('#timer-button').attr('onclick', 'opentimer();');
  }
</script>
	
-->
	
<style>
	
	
	div.quizWidgets{
		
		text-align: center;
		color:#19A0E3;
	}
	div.toggleButtons{
		
		display:none;
		text-align: center;
		font-size: medium;
	}
	
</style>

<div class='form'>
	<div class='pagescroller'>
	<div class='pagecontainer'>
<?php
	foreach($quiz as $page) {
		echo '<div class="page">';
		echo $page['content'];
		echo '</div>';
	}	
?>
	</div></div>
</div>


<div class='header'>
<ul class='pagination pagination-lg'>
	<li>
      <a class='page_prev' aria-label="Previous" href="javascript:loadPage('prev')">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php
	$pgnum = 1;
	foreach($quiz as $page) {
		$pgnumtext = $pgnum-1;
		if($pgnum == 1) {
			$pgnumtext = 'Start';
		}
		else if($pgnum == sizeOf($quiz)) {
			$pgnumtext = 'Answer Sheet';
		}
		echo '<li><a class="page_'.$pgnum.'" href="javascript:loadPage('.$pgnum.');">'.$pgnumtext.'</a></li>';
		$pgnum += 1;
	}	
?>
	<li>
      <a class='page_next' aria-label="Next" href="javascript:loadPage('next')">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
</ul>
</div>


<script type='text/javascript'>
		var finishedTest = false;
		var startedAnswer = false;
		var showanswerInterval;
		var editedIncorrect = false;
		var saverequest;
		var saveinterval;


	$('document').ready(function() {
    setInterval(function() {
		if($('#handinbutton').text() == 'Thank you for your answers'){
			finishedTest = true;
			
		}else{
			finishedTest = false;
		}
		//console.log('Finished Test: '+finishedTest);
    },1000);
    
   
    
  });
	
	var currentpage = 1;
	var pages = <?php echo sizeOf($quiz); ?>;
	var fullwidth, pagewidth;

	function startTest() {
		$(".toggleButtons").css("display","block");
		//$('#audiofile').trigger("play");

		$('p.finishedhint').css({'display':'none'});
		$('.pagination').css({'visibility':'visible'});
		//loadPage(2);
		$('.startbutton').prop('disabled',true);
		$('.startbutton').text('Test started...');
		
		play('myAudioContainer');
	
		
	}
	
	

	function resetTest() {
		$('.form input').val('');
		$('.form input').css({'background-color':'white', 'color':'black'});
		$('#showanswerbutton').css({'display':'none'});
		$('.pagination').css({'visibility':'hidden'});
		$(".toggleButtons").css("display","none");


		//saveGrades();
		
		
		
		$('.resetbutton').prop('disabled',true);
		$('.startbutton').html('Resetting Test... <i class="fa fa-spinner fa-pulse"></i>');
		$('i.fa-close').removeClass('fa-close');
		$('i.fa-check').removeClass('fa-check');
		$('#handinbutton').prop('disabled',false);
	  	$('#handinbutton').text('Hand in answer sheet');
	  	$('.form input').prop('disabled',false);
	  	finishedTest = false;
	  	startedAnswer = false;
	  	clearInterval(showanswerInterval);
		
		
		var data = {'data':{}};
		$('.form input').each(function() {
			data['data'][$(this).attr('id')] = $(this).val().trim();
		});
		data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
		data['user_id'] = '<?php echo $lti->user_id(); ?>';
		if(saverequest){
			//saverequest.abort();
		}
		saverequest = $.ajax({
		  type: "POST",
		  url: "savedata.php",
		  data: data,
		  success: function(response) {
		  	$('.startbutton').prop('disabled',false);
		  	$('.startbutton').html('START TEST');

		  }
		});
		
		
		
	}
	function loadPage(page) {
		
		if(!finishedTest){
			if(!startedAnswer){
				saveGrades();
			}
		}
		
		if(page == 'next') {
			page = currentpage + 1;
		}
		if(page == 'prev') {
			page = currentpage - 1;
		}
		if(page < 1 || page > pages) {
			return false;
		}
		$('ul.pagination li').removeClass('active');
		$('.page_'+page).parent().addClass('active');
		if(page == 1) {
			$('.page_prev').parent().addClass('disabled');
		} else {
			$('.page_prev').parent().removeClass('disabled');
		}
		if(page == pages) {
			$('.page_next').parent().addClass('disabled');
		} else {
			$('.page_next').parent().removeClass('disabled');
		}
		currentpage = page;
		var newMLeft = (pagewidth+182)*(page-1)*-1;
		$( ".pagecontainer" ).animate({
		    marginLeft: newMLeft,
		}, 400);
		
		//console.log(finishedTest);
		if(!finishedTest){
			switch (page) {
			    case 1:
					playaudio(0);
			        break;
			    case 2:
					playaudio(36);
			        break;
			    case 3:
					playaudio(459);
			        break;
			    case 4:
					playaudio(656);
			        break;
			    case 5:
					playaudio(848);
			        break;
			    case 6:
					playaudio(1037);
			        break;
			    case 7:
					playaudio(1373);
			        break;
			    case 8:
					playaudio(1691);
					startedAnswer = true;
			        break;
			}
		}

	}
	function playaudio(time){
		//console.log(time);
		if(!startedAnswer){
			play('myAudioContainer');
			skipTo('myAudioContainer',time);
		}
	}
	$('document').ready(function() {
		$('.resetbutton').prop('disabled',true);
		$('.page_1').parent().addClass('active');
		resize();
		$('.form input').blur(function() {
			//saveGrades();
		});
		<?php if($finished) { ?>
		$('.resetbutton').prop('disabled',false);
		startTest();
		//handIn();
		<?php } ?>
	});
	$( window ).resize(function() {
		resize();
	});
	function resize() {
		fullwidth = $('body').width()-40;
		$('div.pagescroller').width(fullwidth);
		pagewidth = fullwidth-180;
		$('div.page').width(pagewidth);
		loadPage(currentpage);
	}
	function saveGrades() {
		var data = {'data':{}};
		$('.form input').each(function() {
			data['data'][$(this).attr('id')] = $(this).val().trim();
		});
		data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
		data['user_id'] = '<?php echo $lti->user_id(); ?>';
		if(saverequest){
			//saverequest.abort();
		}
		saverequest = $.ajax({
		  type: "POST",
		  url: "savedata.php",
		  data: data,
		  success: function(response) {
		  
		  }
		});
	}
	

	$(".answersInputField").closest("p").click(function () {
		finishedTest = false;
		editedIncorrect = true;
		removeShowAnswers();
		$(this).find("i.fa-close").removeClass('fa-close');
		$(this).find("i.fa-check").removeClass('fa-check');
		$('#handinbutton').prop('disabled',false);
		$('#showanswerbutton').prop('disabled',true);
	  	$('#handinbutton').text('Hand In Answer Sheet');
		$(this).find(".answersInputField").prop("disabled", false).focus();
   	});
   	
   	function showanswers(){
		populateAnswers();
		if(!showanswerInterval || (editedIncorrect == true)){
			showanswerInterval = setInterval(function(){
				populateAnswers();
			}, 2000);
		}
		
	}
	
	function removeShowAnswers(){
		clearInterval(showanswerInterval);
		$('.answersInputField').each(function(){
			if($(this).attr('answerShown') == 'true'){
				$(this).val('');
				$(this).attr('answerShown','false');
				$(this).css({'color':'black', 'background-color':'white'});

			}
		});
	}
	
	function populateAnswers(){
		
		var answers = <?php echo json_encode($results) ?>;
		var displayAnswers = <?php echo json_encode($results) ?>;

		
		for(var key in answers){
			for(var ans in answers[key]){
				answers[key][ans] = answers[key][ans].toLowerCase();
			}
			
			//if the value of this input is wrong, display a random answer
			var input = $('#'+key);
			var inputval = input.val();
			
			
			if(!($.inArray(inputval.toLowerCase(), answers[key]) !== -1)){
				
				//console.log("Incorrect ** "+inputval.toLowerCase());
				var random = Math.floor(Math.random() * (displayAnswers[key].length -1));
				input.attr('answerShown','true');
				input.val(displayAnswers[key][random]);
				input.css({'color':'white', 'background-color':'#05BA00'});
			}
			//console.log(input.attr('answerShown'));
			if(input.attr('answerShown') == 'true'){
				var random = Math.floor(Math.random() * (displayAnswers[key].length));
				input.val(displayAnswers[key][random]);
			}
		}
	}

   	
	function handIn() {
		
		if(saverequest){
			saverequest.abort();
		}
		removeShowAnswers();
		$('#checkingAnswers').css({"display":"block"});
		$('#showanswerbutton').prop('disabled',true);
		$('#handinbutton').prop('disabled',true);

		
		var data = {'data':{}};
		//$('#audiofile').trigger("pause");
		//$('#audiofile').prop('currentTime','0');
		$('.form input').each(function() {
			data['data'][$(this).attr('id')] = $(this).val().trim();
		});
		data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
		data['user_id'] = '<?php echo $lti->user_id(); ?>';
		$.ajax({
		  type: "POST",
		  url: "savedata.php",
		  data: data,
		  success: function(response) {
			  		var data = {'data':{}};

			  $('.form input').each(function() {
					data['data'][$(this).attr('id')] = $(this).val().trim();
			  });
			  data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
			  data['user_id'] = '<?php echo $lti->user_id(); ?>';
			  data['lis_outcome_service_url'] = '<?php echo $lti->grade_url(); ?>';
			  data['lis_result_sourcedid'] = '<?php echo $lti->result_sourcedid(); ?>';
			  $.ajax({
			      type: "POST",
			      dataType: "json",
				  url: "checkdata.php",
					  data: data,
					  success: function(response) {
						
						$('#checkingAnswers').css({"display":"none"});
						console.log(response);  
					  	for(var key in response) {
						  //	console.log(key);
						   if(key != 'answers'){
						  	var el = 'i.'+key;
						  	if(response[key] == 'correct') {
							  	$(el).removeClass('fa fa-close');
							  	$(el).addClass('fa fa-check').css({'color':'green'});
						  	} else if(response[key] == 'incorrect') {
							  	$(el).removeClass('fa fa-check');
							  	$(el).addClass('fa fa-close').css({'color':'red'});
						  	}
						  	}
					  	}
					  	//$('#handinbutton').prop('disabled',true);
					  			$('#showanswerbutton').prop('disabled',false);

					  	$('#handinbutton').text('Thank you for your answers');
					  	$('.form input').prop('disabled',true);
					  	$('.resetbutton').prop('disabled',false);
					  	$('p.finishedhint').css({'display':'block'});
					  	finishedTest = true;
					  	startedAnswer = false;
					  	$('#showanswerbutton').css({'display':'inline'});
					  	window.parent.postMessage('Hello Parent Frame!', '*');
					  },
					  error: function (error){
						$('#checkingAnswers').css({"display":"none"});
					  	for(var key in error) {
						  	if(key === 'responseText'){
						  		//console.log(key+": "+error[key]);
						  	}
						  
					  	}

						  
						  console.log("ERROR: "+error);
						  
					  }
		  		});
		  }
		});
	}
	

</script>
<style>
	div.header {
		text-align:center;
	}
	div.pagescroller {
		width:720px;
		overflow:hidden;
		margin-left:20px;
	}
	div.pagecontainer {
		width:99999px;
	}
	div.page {
		font-family:Arial,Times New Roman, serif;
		font-size:120%;
		padding:80px;
		margin:10px;
/* 		height:1200px; */
		width:700px;
		float:left;
	}
	div.page h2 {
		font-size:160%;
		font-weight:bold;
		text-align: center;
	}
	div.page h3 {
		font-weight:bold;
		font-size:120%;
	}
	div.page h4 {
		font-style:italic;
		font-weight:bold;
	}
	div.page table {
		border:1px solid #000;
		border-bottom:0;
		border-right:0;
	}
	div.page table td {
		min-width:100px;
		border-right:1px solid #000;
		border-bottom:1px solid #000;
		padding:3px;
	}
	div.page div.gray {
		background:#C0C0C0;
		margin:30px 0;
	}
	div.page i.tab {
		width:80px;
		display:inline-block;
	}
	.pagination {
		margin: 0 auto;
		visibility:hidden;
	}
	div.page .box {
		border:1px solid #000;
		padding:10px;
		margin-top:20px;
	}
	div.sect {
		width:50%;
		float:left;
	}
	p.finishedhint {
		display:none;
	}
	#checkingAnswers{
		display:none;
	}
	#showanswerbutton{
		display:none;
	}
</style>


</body>
</html>