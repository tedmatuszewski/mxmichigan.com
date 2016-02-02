
//Red Bud 
var redbudPracticeArray = [new Date(2013, 3, 7, 12, 00), new Date(2013, 3, 14, 12, 00), new Date(2013, 8, 2, 12, 00),
	new Date(2013, 8, 29, 12, 00), new Date(2013, 9, 12, 12, 00), new Date(2013, 9, 20, 12, 00), 
	new Date(2013, 9, 27, 12, 00)]; 
	
//Dutch
var dutchPracticeArray = [new Date(2013, 4, 11, 12, 00),  new Date(2013, 8, 28, 12, 00), new Date(2013, 7, 18, 12, 00),
	new Date(2013,9,19,12,00)];

var dutchRaceArray = [new Date(2013, 3, 27, 7, 00), new Date(2013, 3, 28, 7, 00), new Date(2013, 4, 18, 7, 00), 
	new Date(2013, 4, 19, 7, 00), new Date(2013, 5, 1, 7, 00),  new Date(2013, 5, 2, 7, 00), 
	new Date(2013, 6, 20, 7, 00), new Date(2013, 6, 21, 7, 00), new Date(2013, 7, 10, 7, 00),
	new Date(2013, 7, 11, 7, 00),
	new Date(2013, 8, 14, 7, 00),  new Date(2013, 8, 15, 7, 00), new Date(2013, 9,5,7,00), new Date(2013,9,6,7,00)]; 
	
var battlecreekPracticeArray = [new Date(2013, 3, 20, 11, 00), new Date(2013, 5, 1, 11, 00), new Date(2013, 7, 17, 11, 00)];

var battlecreekHareScrambleArray = [new Date(2013, 4, 5, 8, 00), new Date(2013, 8, 22, 8, 00)];

var battlecreekRaceArray = [new Date(2013, 5, 2, 9, 00), new Date(2013, 6, 20, 9, 00), new Date(2013, 6, 21, 9, 00),
	new Date(2013, 7, 18, 9, 00)];
	 
var portlandRaceArray = [new Date(2013, 3, 7, 7, 00), new Date(2013, 4, 5, 7,00), new Date(2013, 5, 23, 7, 00), 
	new Date(2013, 8, 15, 7, 00)];

var portlandPracticeArray = [new Date(2013, 3, 6, 10, 00), new Date(2013, 4, 4, 10, 00), new Date(2013, 5, 22, 10, 00), 
	new Date(2013, 8, 14, 10, 00)];	 

var portlandHarescrambleArray = [new Date(2013, 3, 14, 7, 00), new Date(2013, 7, 18, 7, 00), new Date(2013, 8, 29, 7, 00)];  
	 
var bigairRaceArray = [new Date(2013, 3,20), new Date(2013, 3,21), new Date(2013, 4, 18), 
	new Date(2013, 4, 19), new Date(2013, 5,8), new Date(2013, 5,9), new Date(2013, 5,22), 
	new Date(2013, 5,23), new Date(2013, 6,13), new Date(2013,6,14), new Date(2013,7,3),
	new Date(2013, 7,4), new Date(2013,8,7), new Date(2013,8,8), new Date(2013, 8,28),
	new Date(2013,8,29)]; 

var bigAirWednesdayPracticeArray = getDateRange(new Date(2013, 3, 17), new Date(2013, 8, 25), bigairRaceArray, 7); 

var bigAirSaturdayPracticeArray = getDateRange(new Date(2013, 3, 20), new Date(2013, 8, 29), bigairRaceArray, 7);

//Polka Dots
var polkadotsRaceArray = [new Date(2013, 4, 11), new Date(2013, 4,12), new Date(2013, 5, 30), new Date(2013, 6, 28), 
	new Date(2013, 8, 22)]; 

var polkadotsPracticeArray = [new Date(2013, 4, 10), new Date(2013, 8, 21)];

var polkadotsHarescrambleArray = [new Date(2013, 7, 25)]; 

// Baja 
var bajaPracticeArray = [new Date(2013, 2, 16),  new Date(2013, 2, 17), new Date(2013, 2, 23),
	new Date(2013, 2, 24), new Date(2013, 2, 29), new Date(2013, 2, 30), new Date(2013, 3, 6), 
	new Date(2013, 3, 7), new Date(2013, 3, 13),new Date(2013, 3, 14),new Date(2013, 3, 20),
	new Date(2013, 4, 4), new Date(2013, 4, 5),new Date(2013, 4, 8),new Date(2013, 4, 18),
	new Date(2013, 4, 19), new Date(2013, 4, 27), new Date(2013, 5, 2), new Date(2013, 5, 28),
	new Date(2013, 5, 9), new Date(2013, 5, 12), new Date(2013, 5, 15), new Date(2013, 5, 16),
	new Date(2013, 5, 21), new Date(2013, 5, 29), new Date(2013, 5, 30), new Date(2013, 6, 10),
	new Date(2013, 5, 24), new Date(2013, 5, 27), new Date(2013, 6, 4), new Date(2013, 6, 10),
	new Date(2013, 6, 11), new Date(2013, 6, 14), new Date(2013, 6, 17), new Date(2013, 6, 18),
	new Date(2013, 7, 8), new Date(2013, 7, 14), new Date(2013, 7, 15), new Date(2013, 7, 21),
	new Date(2013, 7, 29), new Date(2013, 8, 19), new Date(2013, 8, 20), new Date(2013, 9, 3),
	new Date(2013, 9, 10)];  
	
var bajaRaceArray = [new Date(2013, 3, 27), new Date(2013, 3, 28), new Date(2013, 4, 25), 
	new Date(2013, 4, 26), new Date(2013, 5, 22), new Date(2013, 5, 23), new Date(2013, 7, 31),
	new Date(2013, 8, 1), new Date(2013, 8, 2), new Date(2013, 9, 5), new Date(2013, 9, 6),
	new Date(2013, 9, 26), new Date(2013, 9, 27)]; 

//Bull Dogs
var bulldogsRaceArray = [new Date(2013, 3, 21), new Date(2013, 9, 13)];

//Freelin
var freelinRaceArray = [new Date(2013, 3, 13), new Date(2013, 3, 14),
	new Date(2013, 5, 8), new Date(2013, 5, 9), new Date(2013, 6, 27), new Date(2013, 6, 28),
	new Date(2013, 7, 24), new Date(2013, 7, 25), new Date(2013, 8, 28), new Date(2013, 8, 29),
	new Date(2013, 9, 19), new Date(2013, 9, 20)];

var freelinPracticeArray = [new Date(2013, 3, 21), new Date(2013, 3, 28),  new Date(2013, 4, 5),
	new Date(2013, 4, 12), new Date(2013, 4, 19), new Date(2013, 4, 26), new Date(2013, 5, 2),
	new Date(2013, 5, 16), new Date(2013, 5, 23), new Date(2013, 5, 30), new Date(2013, 6, 3),
	new Date(2013, 6, 7), new Date(2013, 6, 17), new Date(2013, 6, 21), new Date(2013, 7, 4),
	new Date(2013, 7, 11), new Date(2013, 7, 14),new Date(2013, 7, 18), new Date(2013, 8, 1),
	new Date(2013, 8, 8), new Date(2013, 8, 15), new Date(2013, 8, 22), new Date(2013, 9, 6),
	new Date(2013, 9, 13), new Date(2013, 9, 27)];
	
//Grattan
var grattanRaceArray = [new Date(2013, 3, 27), new Date(2013, 3, 28), new Date(2013, 5, 15), 
	new Date(2013, 5, 16), new Date(2013, 7, 3), new Date(2013, 7, 4), new Date(2013, 8, 28), 
	new Date(2013, 8, 29)];
	
var grattanPracticeArray = [new Date(2013, 5, 2), new Date(2013, 5, 30), new Date(2013, 6, 14),
	new Date(2013, 6, 28), new Date(2013, 7, 25), new Date(2013, 8, 15)];	

//MPX 
var mpxPracticeArray = [new Date(2013, 3, 20), 
new Date(2013, 3, 21), new Date(2013, 3, 27), new Date(2013, 4, 18), 
new Date(2013, 5, 1), new Date(2013, 6, 13), new Date(2013, 6, 27), 
new Date(2013, 7, 10), new Date(2013, 7, 24), new Date(2013, 8, 14), 
new Date(2013, 9, 5)];

var mpxRaceArray = [new Date(2013, 3, 28), new Date(2013, 4, 19), new Date(2013, 5, 2), 
new Date(2013, 6, 14), new Date(2013, 6, 28), new Date(2013, 7, 11), 
new Date(2013, 7, 25), new Date(2013, 8, 15), new Date(2013, 9, 6)];

var sandboxPracticeArray = [new Date(2013, 3, 28), new Date(2013, 4, 12), new Date(2013, 4, 26), 
new Date(2013, 5, 2), new Date(2013, 5, 16), new Date(2013, 5, 23), new Date(2013, 6, 14), 
new Date(2013, 6, 21), new Date(2013, 7, 4), new Date(2013, 7, 11), new Date(2013, 7, 25), 
new Date(2013, 8, 1), new Date(2013, 8, 15), new Date(2013, 8, 22), new Date(2013, 9, 6), 
new Date(2013, 9, 20), new Date(2013, 9, 27), new Date(2013, 10, 3), new Date(2013, 10, 10), 
new Date(2013, 10, 17)];

var cmcRaceArray = [new Date(2013, 4, 19), new Date(2013, 6, 14), new Date(2013, 7, 10),
				new Date(2013, 7, 11), new Date(2013, 8, 8)];

var tmcRaceArray = [new Date(2013, 4, 18), new Date(2013, 4, 19), new Date(2013, 6, 27), 
				new Date(2013, 6, 28), new Date(2013, 7, 17), new Date(2013, 7, 18),
				new Date(2013, 8, 7), new Date(2013, 8, 8)];
				
var tmcMondayPracticeArray = getDateRange(new Date(2013, 3, 15), new Date(2013, 8, 23), tmcRaceArray, 7);
var tmcWednesdayPracticeArray = getDateRange(new Date(2013, 3, 17), new Date(2013, 8, 25), tmcRaceArray, 7);
var tmcThursdayPracticeArray = getDateRange(new Date(2013, 3, 18), new Date(2013, 8, 26), tmcRaceArray, 7);
var tmcFridayPracticeArray = getDateRange(new Date(2013, 3, 19), new Date(2013, 8, 27), tmcRaceArray, 7);
var tmcSaturdayPracticeArray = getDateRange(new Date(2013, 3, 20), new Date(2013, 8, 28), tmcRaceArray, 7);
var tmcSundayPracticeArray = getDateRange(new Date(2013, 3, 21), new Date(2013, 8, 29), tmcRaceArray, 7);

function doCheckBox(checkboxId, title, trackArray, url)
{
	$(checkboxId).click (function ()
	{ 
		if($(this).is(':checked'))
		{    
			addTrackToCalander(title,  trackArray, url);
		}
		else
		{
			$('#calendar').fullCalendar('removeEvents', title);	
		}
	});
}

function addTrackToCalander(title, trackArray, url)
{ 	  
	for(i=0; i<trackArray.length; i++)
	{   
		addCalanderEvent(title, title, trackArray[i], trackArray[i], url); 
	} 		
}	

function addCalanderEvent(id, title, start, end, url)
{	 
	var eventObject = {
	id: id,	
	title: title,
	start: start,
	end: end,
	allDay: true, 
	url: url
	}; 
	
	$('#calendar').fullCalendar('renderEvent', eventObject, true);  
}

function getDateRange(startDate, endDate, exceptArray, interval)
{
	var newExceptArray = makeNewExecptArray(exceptArray);
	var datesArray = new Array;   
	while(startDate <= endDate)
	{ 		   
		if(newExceptArray.indexOf(startDate.valueOf()) == -1)
		{ 
        	datesArray.push(new Date(startDate.setDate(startDate.getDate())));
		}
        var startDate = new Date(startDate.setDate(startDate.getDate() + interval)); 
	} 
	return datesArray; 	
}

function makeNewExecptArray(oldExceptArray)
{
	var newExceptArray = new Array;
	for(i=0; i<oldExceptArray.length; i++)
	{
		newExceptArray.push(oldExceptArray[i].valueOf());	
	} 
	return newExceptArray;
}