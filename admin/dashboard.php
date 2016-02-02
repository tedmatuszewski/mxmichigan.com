<?php
	include_once("../json/session/security.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Admin Dashboard</title>
    
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"  />
        <link href="../css/site.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/pikaday.css">
        <link rel="stylesheet" href="../css/jquery.timepicker.css" />
        
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    </head>
  
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-brand" src="../images/Mx-Michigan-Logo.png" alt="Mx Michigan" />
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../json/session/logout.php">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
     
        <div class="container main">  
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Tracks</h3>
                            <button data-toggle="modal" href="#trackModal" id="btnShowAddTrackModal" class="btn btn-xs btn-success pull-right"><i class="icon-plus"></i>&nbsp;Add</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body"> 
                            <div class="table-responsive space-top scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                	<thead><tr><th class="col-xs-9">Name</th><th class="col-xs-3"></th></tr></thead>
                                    <tbody id="tracksList"></tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end panel -->
                </div> 
                
                 <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">History</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive space-top scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                	<thead><tr><th>Text</th><th></th></tr></thead>
                                    <tbody id="historyList"></tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end panel -->
                </div> 
        	</div><!-- end row -->
            
            <div class="row">
            	<div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Users</h3>
                            <button data-toggle="modal" href="#userModal" id="btnAddUser" class="btn btn-xs btn-success pull-right"><i class="icon-plus"></i>&nbsp;Add</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive space-top scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                	<thead><tr><th>Username</th><th>Password</th><th>Rights</th><th></th></tr></thead>
                                    <tbody id="userList"></tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end panel -->
                </div> 
            </div><!-- end row -->
            
             <div class="row">
            	<div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Schedule</h3>
                            <button data-toggle="modal" href="#scheduleModal" id="btnAddSchedule" class="btn btn-xs btn-success pull-right"><i class="icon-plus"></i>&nbsp;Add</button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive space-top scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                	<thead><tr><th>Track ID</th><th>Start</th><th>End</th><th>Comments</th><th>Practice</th><th>Race</th></tr></thead>
                                    <tbody id="scheduleList"></tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end panel -->
                </div> 
            </div><!-- end row -->
    	</div> <!-- /container -->
        
        <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			<div class="modal-dialog">
   				<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title">Track</h4>
      				</div>
      				<div class="modal-body form-horizontal">
                        <div class="form-group">
                            <label for="trackid" class="col-sm-2 control-label">Track ID</label>
                            <div class="col-sm-10"><select id="trackid" class="form-control"></select></div>
                        </div>
                        <div class="form-group">
                            <label for="trackid" class="col-sm-2 control-label">Start</label>
                            <div class="col-sm-5"><input type="text" class="form-control date" id="startdate" placeholder="start date"></div>
                            <div class="col-sm-5"><input type="text" class="form-control time" id="starttime" placeholder="start time"></div>
                        </div>       
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label">End</label>
                            <div class="col-sm-5"><input type="text" class="form-control date" id="enddate" placeholder="end date"></div>
                            <div class="col-sm-5"><input type="text" class="form-control time" id="endtime" placeholder="end time"></div>
                        </div>          
                        <div class="form-group">
                            <label for="comments" class="col-sm-2 control-label">Comments</label>
                            <div class="col-sm-10"><textarea class="form-control" id="comments" placeholder="comments"></textarea></div>
                        </div>         
						<div class="radio col-sm-offset-2">
                            <label><input type="radio" name="type" value="practice" checked>Practice</label>
                        </div>
                        <div class="radio col-sm-offset-2">
                            <label><input type="radio" name="type" value="race">Race</label>
                        </div>
      				</div>
      				<div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnSaveSchedule">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        
        <div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			<div class="modal-dialog">
   				<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title">Track</h4>
      				</div>
      				<div class="modal-body">
                    	<div class="row">
                        	<div class="col-xs-12">
                            	<label>Track Name:</label>
                            	<input type="text" class="form-control" id="inputTrackName" />
                            </div>
                        </div>
      				</div>
      				<div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnSaveTrack">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  			<div class="modal-dialog">
   				<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title">User</h4>
      				</div>
      				<div class="modal-body">
                    	<div class="row">
                        	<div class="col-xs-12">
                            	<div class="form-group">
                                	<label for="username">Username</label>
    								<input type="text" class="form-control input-sm" id="username" />
                              	</div>
                                
                                <div class="form-group">
                                	<label for="password">Password</label>
    								<input type="text" class="form-control input-sm" id="password" />
                              	</div>
                                
                                <div class="radio">
                                    <label>
                                    	<input type="radio" name="type" value="2" checked>&nbsp;User
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                    	<input type="radio" name="type" value="1" >&nbsp;Admin
                                    </label>
                                </div>
                            </div>
                        </div>
      				</div>
      				<div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnSaveUser">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
  	</body>
	<script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/pikaday.js"></script>
    <script type="text/javascript" src="../js/pikaday.jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="../js/mx.js"></script>
</html>
