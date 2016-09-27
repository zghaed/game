$(document).ready(function(){
	var errors = ['list.length;', 'element,list', '>'];
	var scores = 0;
	/*This function is called when the user presses start  button
	After clicking on the start button, the user can click on different words on the code section.
	If the clicked word is one of the errors in the program, the background of that word turns green and it shows an appropriate notification
	Otherwise, the word becomes red and a div element with sorry message will be added to the page
	After clicking on each error, one star will be added to the page
	If the user finds all three errors in the page, an alert with YOU WON! message will pop up.*/
	$('#start-button').click(function(){
		$('#start-button').css('display','none');
		var code = $('#code').text();
		var words = code.split(' ');
 	 	var text = words.join('</span> <span>');

 	 	console.log(text);
  		$('#code').html('<span>' + text + '</span>');

  		$('span').click(function ()
  		{	
  			var selectedWord = $(this).text();
  			var numOfErrors = errors.length;
  			var isError = false;
  			var index = 0;
  			var message;
  			var notification;
  			var newScores;
  			for (; index < numOfErrors; index++)
	        {
	        	if(errors[index] === selectedWord)
	        	{
	        		isError = true;
	         	}
	        }
	        if (isError === true)
	        {
	        	$(this).css('background-color','green');
	        	message = 'You found one error, ' + selectedWord;
	        	notification = $('<div>' + message + '</div>');
	        	$(notification).css('background-color', '#305020');
	        	scores = scores + 1;
	        }
	        else {
	        	$(this).css('background-color','red');
	        	message = 'Sorry, ' + selectedWord + ' is not an error.';
	        	notification = $('<div>' + message + '</div>');
	        	$(notification).css('background-color', '#4C0000');
	        }
	        console.log(scores);
	       	if (scores==1) {
	        	document.getElementById("first-score").classList.add("full");
	        }
	        if (scores==2) {
	        	document.getElementById("second-score").classList.add("full");
	        }
	        if (scores==3) {
	        	document.getElementById("third-score").classList.add("full");
	        	alert('YOU WON!')
	        }
	        $(notification).css('padding', '20px');
	        $(notification).css('margin', '20px');
	        $(notification).css('color', 'white');
	        $('#code-content').prepend(newScores);
	        $('#code-content').append(notification);
	        $(notification).fadeOut(5000);
  		});

	});


});
