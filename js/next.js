/*
 * Next Project Parser
 */
 
( function( $ ) {
	var brik = $("#nextProject");
	var windowSize = $(window).width();
	var current = $("div.tt").text();
	var nx;
	var list;
		
	function nxt(){
		var sata = JSON.parse($("#sata").html());
		
		list = sata.data.length - 1;
		
		for (var i = 0; i < sata.data.length; i++){
			if (sata.data[i].name == current){
				console.log( 'viewing ' + current );
				nx = i + 1;
			}
		}
		if (nx <= list) {
			console.log( sata.data[nx].name );
			$("#nextProject .container h1").html('<a href="' + sata.data[nx].url + '">' + sata.data[nx].name + '</a>');
			$("#nextProject .container h2").html('&mdash;' + sata.data[nx].category );
			$("#nextProject .container").addClass( sata.data[nx].color );
			if (windowSize <= 751) {
				brik.backstretch( sata.data[nx].small);
			}
			else if (windowSize <= 1024) {
				brik.backstretch( sata.data[nx].medium);
			}
			else if (windowSize >= 1025) {
				brik.backstretch( sata.data[nx].large);
			}
		} else {
			console.log( sata.data[0].name );
			$("#nextProject .container h1").html('<a href="' + sata.data[0].url + '">' + sata.data[0].name + '</a>');
			$("#nextProject .container h2").html('&mdash;' + sata.data[0].category );
			$("#nextProject .container").addClass( sata.data[0].color );
			if (windowSize <= 751) {
				brik.backstretch( sata.data[0].small);
			}
			else if (windowSize <= 1024) {
				brik.backstretch( sata.data[0].medium);
			}
			else if (windowSize >= 1025) {
				brik.backstretch( sata.data[0].large);
			}
		};
			
		/*for (var i in sata.data) {
			
			
			$('<li class="' + sata.data[i].color + '"><a href="' + sata.data[i].url + '"><h1>' + sata.data[i].name + '</h1></a></li>').appendTo(titles);
			$('<li class="' + sata.data[i].color + '"><h2>&mdash;' + sata.data[i].category + '</h2></li>').appendTo(subtitles);
			if (windowSize <= 751) {
				$('<li class="sheet">').backstretch( sata.data[i].small).appendTo(carousel);
			}
			else if (windowSize <= 1024) {
				$('<li class="sheet">').backstretch( sata.data[i].medium).appendTo(carousel);
			}
			else if (windowSize >= 1025) {
				$('<li class="sheet">').backstretch( sata.data[i].large).appendTo(carousel);
			}
		};*/
	}
	nxt();
} )( jQuery );