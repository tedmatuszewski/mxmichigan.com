$(document).ready(function() {
	// Priming reads.
	getTracks(makeTracksGrid); 
	getUsers();
	getSchedules();
	
	$(".date").pikaday({
        firstDay: 1,
        minDate: new Date('2014-01-01'),
        maxDate: new Date('2016-12-31'),
        yearRange: [2014,2016],
		 format: 'YYYY-MM-DD'
    });
	
	$(".time").timepicker({ minTime: '8:00', maxTime: '20:00' });
	
	$("#btnSaveSchedule").click(function() {
		var id = $("#scheduleModal").data("id");
		var trackid = $("#trackid").val();
		var starttime = convertTo24Hour($("#starttime").val()) + ":00";
		var startdate = $("#startdate").val() + " ";
		var endtime = convertTo24Hour($("#endtime").val()) + ":00";
		var enddate = $("#enddate").val() + " ";
		var comments = $("#comments").val();
		var race = $("input[name='type']:checked").val() == "race" ? 1 : 0; 
		var practice = $("input[name='type']:checked").val() == "practice" ? 1 : 0;  
		
		if(id == 0) {
			addSchedule({ trackId: trackid, start: startdate+starttime, end: enddate+endtime, comments: comments, race: race, practice: practice, table: "schedule" });
		}
		else {
			editSchedule({ id: id, trackId: trackid, start: startdate+starttime, end: enddate+endtime, comments: comments, race: race, practice: practice, table: "schedule" });	
		}
	});
	
	$(document).on("click", ".btnDeleteSchedule", function() {
		var id = $(this).closest("tr").data("id");
		deleteSchedule(id);
	});
	$(document).on('click', ".btnEditSchedule", function() {
		var row = $(this).closest("tr");
		var trackid = row.data("trackid"); 
		var startdatetime = row.data("start");
		var enddatetime = row.data("end");
		var comments = row.data("comments");
		var practice = row.data("practice");
		var race = row.data("race");
		var id = row.data("id");
		var startdate = startdatetime.split(" ")[0];
		var starttime = startdatetime.split(" ")[1];
		var enddate = enddatetime.split(" ")[0];
		var endtime = enddatetime.split(" ")[1];
		
		$("#scheduleModal").data("id", id);
		$("#trackid").val(trackid);
		$("#starttime").val(starttime);
		$("#startdate").val(startdate);
		$("#endtime").val(endtime);
		$("#enddate").val(enddate);
		$("#comments").val(comments);
		
		if(race == 1) {
			$("input[value='race']").click();	
		}
		else {
			$("input[value='practice']").click();
		}
	});
		
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CRUD Track Manangement Events ~~~~~~~~~~~~~~~
	$("#btnSaveTrack").click(function() {
		var trackId = $("#trackModal").data("id");
		var trackName = $("#inputTrackName").val(); 
		 
		if(trackName !== "") {
			if(trackId == 0) {
				addTrack(trackName)
			}
			else {
				editTrack(trackId, $("#inputTrackName").val());
			}
		}
	});
	
	$(document).on("click", ".btnEditTrack", function() {
		var self = $(this).closest("tr"); 
		$("#trackModal").data("id", self.data("id"));
		
		$("#inputTrackName").val(self.data("name"));  
	});
	
	$(document).on("click", ".btnDeleteTrack", function() {
		var self = $(this).closest("tr"); 
		deleteTrack(self.data("id"));
	});
	
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~CRUD User Manangement Events ~~~~~~~~~~~~~~~
	$(document).on("click", ".btnEditUser", function() {
		var row = $(this).closest("tr");
		$("#username").val(row.data("username"));
		$("#password").val(row.data("password"));
		$("input[name='type'][value='" + row.data("type") + "']").click();
		$("#userModal").data("id", row.data("id"));
	});
	
	$("#btnSaveUser").click(function() {
		var userId = $("#userModal").data("id");
		var username = $("#username").val(); 
		var password = $('#password').val();
		var type = $("input[name='type']:checked").val();
		 
		if(username !== "") {
			if(userId == 0) {
				addUser(userId, username, password, type);
			}
			else {
				editUser(userId, username, password, type);
			}
		}
	});
	
	$(document).on("click", ".btnDeleteUser", function() {
		var self = $(this).closest("tr"); 
		deleteUser(self.data("id"));
	});
	
	$('#scheduleModal').on("show.bs.modal", function() {
		if($("#scheduleModal").find("option").length == 0) getTracks(makeTracksSelect);
	});
	
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Reseting all Modal Events ~~~~~~~~~~~~~~~
	$('.modal').on('shown.bs.modal', function (e) {
		$(this).find("input").first().focus();
	}).on('hidden.bs.modal', function (e) {
		$(this).find("input[type='text']").val("");
		$(this).find("input[type='radio']").first().click();
		$(this).find("textarea").val("");
		$(".modal").data("id", 0);
	});
	
	// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Global AJAX Setup ~~~~~~~~~~~~~~
	$.ajaxSetup({
		dataType: "json",
		type:"GET",
		error: function(error) {
			console.log("error:", error);	
			var message = '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong>' +  error.responseText + '</div>';
			$(".main").prepend(message);
		}
	});
});

function makeTracksGrid(result) {
	if(result.DATA == undefined) result = jQuery.parseJSON( result );
	$("#tracksList").empty();
	
	for(i=0; i<result.DATA.length; i++) {
		var row = $("<tr></tr>");
		$("<td></td>").text(result.DATA[i].name).appendTo(row);
		$("<td><button data-toggle='modal' href='#trackModal' class='btn btn-xs btn-warning btnEditTrack'><i class='icon-edit'></i></button>&nbsp;" + 
				   "<button class='btn btn-xs btn-danger btnDeleteTrack'><i class='icon-remove'></i></button></td>").appendTo(row);
				   
		row.data('id', result.DATA[i].id);
		row.data('name', result.DATA[i].name);
		
		row.appendTo("#tracksList");
	}
}
		
function makeTracksSelect(result) {
	var dropdown = $("#scheduleModal").find("select");
	dropdown.empty();
	
	for(i=0; i<result.DATA.length; i++) {
		var option = $("<option></option>").text(result.DATA[i].name).val(result.DATA[i].id); 
		
		option.appendTo(dropdown);
	}
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Schedult crud ajax
function deleteSchedule(id) {
	$.ajax({
		url: "../json/generic/edit.php", 
		data:{ id: id, table: "schedule", deleted: 1 },
		success: function(result) {
			getSchedules();	
		}
	});	
}
function addSchedule(json) {
	$.ajax({
		url: "../json/generic/add.php",
		data: json,
		success: function(result) { 
			getSchedules();	
			$('#scheduleModal').modal('hide');
		}
	});	
}
function editSchedule(json) {
	$.ajax({
		url: "../json/generic/edit.php",
		data: json,
		success: function(result) { 
			getSchedules();	
			$('#scheduleModal').modal('hide');
		}
	});	
}

function getSchedules() {
	$.ajax({
		url: "../json/generic/get.php",
		data: {table: "schedule", column: "deleted", value: 1},
		success: function(result) {
			if(result.DATA == undefined) result = jQuery.parseJSON( result );
			$("#scheduleList").empty();
			for(i=0;i<result.DATA.length; i++) {
				var row = $("<tr></tr>");
				$("<td></td>").text(result.DATA[i].trackid).appendTo(row); 
				$("<td></td>").text(result.DATA[i].start).appendTo(row);
				$("<td></td>").text(result.DATA[i].end).appendTo(row);
				$("<td></td>").text(result.DATA[i].comments).appendTo(row);
				$("<td></td>").text(result.DATA[i].practice).appendTo(row);
				$("<td></td>").text(result.DATA[i].race).appendTo(row);
				
				row.attr("data-trackid", result.DATA[i].trackid); 
				row.attr("data-start", result.DATA[i].start);
				row.attr("data-end", result.DATA[i].end);
				row.attr("data-comments", result.DATA[i].comments);
				row.attr("data-practice", result.DATA[i].practice);
				row.attr("data-race", result.DATA[i].race);
				row.attr("data-id", result.DATA[i].id);
				
				$("<td><button data-toggle='modal' href='#scheduleModal' class='btn btn-xs btn-warning btnEditSchedule'><i class='icon-edit'></i></button>&nbsp;" + 
						   "<button class='btn btn-xs btn-danger btnDeleteSchedule'><i class='icon-remove'></i></button></td>").appendTo(row); 
				
				row.appendTo("#scheduleList");
			}
		}
	});	
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Track crud ajax
function deleteTrack(id) {
	$.ajax({
		url: "../json/generic/edit.php", 
		data:{ id: id, table: "tracks", deleted: 1 },
		success: function(result) {
			getTracks(makeTracksGrid(result));
		}
	});	
} 
function editTrack(id, name) {
	$.ajax({
		url: "../json/generic/edit.php", 
		data:{ id: id, name: name, table: "tracks" },
		success: function(result) {
			$('#trackModal').modal('hide');
			getTracks(makeTracksGrid(result));
		} 
	});	
}

function addTrack(name) { 
	$.ajax({
		url: "../json/generic/add.php", 
		data:{ name: name, table: "tracks" },
		success: function(result) {
			$('#trackModal').modal('hide');
			getTracks(makeTracksGrid(result));
		}
	});	
} 
function getTracks(f) {
	$.ajax({
		url: "../json/generic/get.php",
		data: {table: "tracks", column: "deleted", value: 1 },
		success: f,
		complete: getHistory
	});	
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Get history ajax
function getHistory() {
	$.ajax({
		url: "../json/generic/get.php",
		data: {table: "history", orderbycol: "id", orderbydirection: "DESC" },
		success: function(result) {
			$("#historyList").empty();
			
			for(i=0; i<result.DATA.length; i++) {
				var row = $("<tr></tr>");
				$("<td></td>").text(result.DATA[i].text).appendTo(row);
				$("<td></td>").text(result.DATA[i].datetime).appendTo(row);
				row.appendTo("#historyList");
			}
		}
	});	 
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Users crud ajax
function deleteUser(id) {
	$.ajax({
		url: "../json/generic/edit.php",
		data:{ id: id, table: "users", deleted: 1 },
		success: function(result) {
			getUsers();
		}
	});	
} 
function editUser(id, username, password, type) {
	$.ajax({
		url: "../json/generic/edit.php",
		data:{ id: id, username: username, password: password, type: type, table: "users" },
		success: function(result) {
			$('#userModal').modal('hide');
			getUsers();
		}
	});	
} 
function addUser(id, username, password, type) { 
	$.ajax({
		url: "../json/generic/add.php",
		data: {
			table: "users",
			username: username,
			password: password,
			type: type	
		},
		success: function(result) {
			$('#userModal').modal('hide');
			getUsers();
		}
	});	
}
function getUsers() {
	$.ajax({
		url: "../json/generic/get.php",
		data: {table: "users", column: "deleted", value: 1 },
		success: function(result) {
			$("#userList").empty();
			if(result.DATA == undefined) result = jQuery.parseJSON( result );
			
			for(i=0; i<result.DATA.length; i++) {
				var row = $("<tr></tr>");
				$("<td></td>").text(result.DATA[i].username).appendTo(row);
				$("<td></td>").text(result.DATA[i].password).appendTo(row);
				$("<td></td>").text(result.DATA[i].type).appendTo(row);
				$("<td><button data-toggle='modal' href='#userModal' class='btn btn-xs btn-warning btnEditUser'><i class='icon-edit'></i></button>&nbsp;" + 
						   "<button class='btn btn-xs btn-danger btnDeleteUser'><i class='icon-remove'></i></button></td>").appendTo(row);
						   
				row.data('id', result.DATA[i].id);
				row.data('username', result.DATA[i].username);
				row.data('type', result.DATA[i].type);
				row.data('password', result.DATA[i].password);
				
				row.appendTo("#userList");
			}
		},
		complete: getHistory
	});	
}

function formatMySqlDate(date) {
	// In: 02/14/2014 8:37 PM
	// Out: YYYY-MM-DD HH:MM:SS	
	
}
function convertTo24Hour(time) {
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('am') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('pm')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(am|pm)/, '');
}