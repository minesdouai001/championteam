
var allDestinations = [];

// ---------
// Destination
// ---------

function Destination(town1,town2,score,imgURL) {
	this.town1 = town1;
	this.town2 = town2;
	this.score = score;
	this.imgURL = imgURL;
	this.ui = $('<img class="destinationCard" src="css/imgs/DestinationCards/'+this.imgURL+'" alt="'+this.town1+'-'+this.town2+' destination card" class="img-rounded">');
	this.ui.model = this;
}

function initallDestinations(){
	allDestinations.push(new Destination( "Boston"			, "Miami",12,			 'boston-miami.png'));
	allDestinations.push(new Destination( "Calgary"		   , "Phoenix",13,		'calgary-phoenix.png'));
	allDestinations.push(new Destination( "Calgary"		   , "Salt Lake City",7,'calgary-salt_lake_city.png'));
	allDestinations.push(new Destination( "Chicago"		   , "New Orléans",7,	  'chicago-new_orleans.png'));
	allDestinations.push(new Destination( "Chicago"		   , "Santa Fe",9,		'chicago-santa_fe.png'));
	allDestinations.push(new Destination( "Dallas"			, "New York",11,		'dallas-new_york.png'));
	allDestinations.push(new Destination( "Denver"			, "El Paso",4,			'denver-el_paso.png'));
	allDestinations.push(new Destination( "Denver"			, "Pittsburgh",11,	'denver-pittsburgh.png'));
	allDestinations.push(new Destination( "Duluth"			, "El Paso",10,		'duluth-el_paso.png'));
	allDestinations.push(new Destination( "Duluth"			, "Houston",8,			'duluth-houston.png'));
	allDestinations.push(new Destination( "Helena"			, "Los Angeles",8,	'helena-los_angeles.png'));
	allDestinations.push(new Destination( "Kansas City"		, "Houston",5,		 'kansas_city-houston.png'));
	allDestinations.push(new Destination( "Los Angeles"		, "Chicago",16,		 'log_angeles-chicago.png'));
	allDestinations.push(new Destination( "Los Angeles"		, "Miami",20,			'log_angeles-miami.png'));
	allDestinations.push(new Destination( "Los Angeles"		, "New York",21,	  'log_angeles-new_york.png'));
	allDestinations.push(new Destination( "Montréal"			, "Atlanta",9,			'montreal-atlanta.png'));
	allDestinations.push(new Destination( "Montréal"			, "New Orléans",13,  'montreal-new_orleans.png'));
	allDestinations.push(new Destination( "New York"			, "Atlanta",6,			'new_york-atlanta.png'));
	allDestinations.push(new Destination( "Portland"			, "Nashville",17,		'portland-nashville.png'));
	allDestinations.push(new Destination( "Portland"			, "Phoenix",11,		'portland-phoenix.png'));
	allDestinations.push(new Destination( "Salt St Marie", "Nashville",8,		   'salt_st_marie-nashville.png'));
	allDestinations.push(new Destination( "Salt St Marie"	, "Oklahoma City",9,	'salt_st_marie-oklahoma_city.png'));
	allDestinations.push(new Destination( "San Francisco"	, "Atlanta",17,		'san_francisco-atlanta.png'));
	allDestinations.push(new Destination( "Seattle"			, "Los Angeles",9,	  'seattle-los_angeles.png'));
	allDestinations.push(new Destination( "Seattle"			, "New York",22,		'seattle-new_york.png'));
	allDestinations.push(new Destination( "Toronto"			, "Miami",10,			'toronto-miami.png'));
	allDestinations.push(new Destination( "Vancouver"		, "Montréal",20,		'vancouver-montreal.png'));
	allDestinations.push(new Destination( "Vancouver"		, "Santa Fe",13,		'vancouver-santa_fe.png'));
	allDestinations.push(new Destination( "Winnipeg"			, "Houston",12,		'winnipeg-houston.png'));
	allDestinations.push(new Destination( "Winnipeg"			, "Little Rock",11,  'winnipeg-little_rock.png'));
}

function makeallDestinationsVisibleIn(jqSelector) {
	var $objective_deck = $(jqSelector);
	// add paths to DOM
	$.each(allDestinations, function(index,dest){
		$objective_deck.append(dest.ui); 
	});
}


// ---------
// Main
// ---------

jQuery(function($) {
	// destinations
	initallDestinations();
	makeallDestinationsVisibleIn('.objective_deck');
});	
