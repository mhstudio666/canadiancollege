/*
Read time
*/
$(function() {

	$('article').readingTime({
		readingTimeAsNumber: true,
		wordsPerMinute: 275,
		round: false,
		lang: 'es',
		success: function(data) {
			console.log(data);
		},
		error: function(data) {
			console.log(data.error);
			$('.reading-time').remove();
		}
	});
});
