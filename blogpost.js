$(function(){$("article").readingTime({readingTimeAsNumber:!0,wordsPerMinute:275,round:!1,lang:"es",success:function(e){console.log(e)},error:function(e){console.log(e.error),$(".reading-time").remove()}})});
