<?php
session_start();
include("../checklogin.php");
check_login();	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>e-Book Manager</title>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
	
	<link rel="stylesheet" href="cdn/bootstrap3.3.7.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="cdn/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="cdn/bootstrap3.3.7.min.js"></script>

	<script type="text/javascript" src="pdfjs/build/pdf.js"></script>
	<script type="text/javascript" src="pdfjs/build/pdf.worker.js"></script>
	
	<link rel="stylesheet" type="text/css" href="styles/dashboard.css">
	<link rel="stylesheet" type="text/css" href="styles/systemviewer.css">
	<link rel="stylesheet" href="styles/pdfviewer.css" type="text/css">

	<script type="text/javascript" src="scripts/index.js"></script>
	<script type="text/javascript" src="scripts/pdfviewer.js"></script>
	<script type="text/javascript" src="scripts/systemviewer.js"></script>
	
	<!--<base target="iframe_fileview">-->
</head>
<body id="main_body">
	
	<div id="system-viewer">

		<div id="system-header">
			e-book Manager
			<div class="dropdown">
				<img id="settings" src="icons/gear.png" type="button" aria-haspopup="true" aria-expanded="true"
					class="floating-action-button dropdown-toggle" data-toggle="dropdown" ><!--dropdown-->
				<ul id="settings-dropdown" class="dropdown-menu" aria-labelledby="settings">
				    <li><a href="#"><span id="settings-username"><?php echo $_SESSION['name'];?></span></a></li>
					<li><a href="#"><span id="settings-changePassword">Change Password</span></a></li>
				    <li><a href="../logout.php"><span id="settings-logout">Logout</span></a></li>
				    <li role="separator" class="divider"></li>
				    <li><a href="#"><span id="settings-help">Help</span></a></li>
				    <li><a href="#"><span id="settings-exit">Exit</span></a></li>
			  	</ul>
			</div>
		</div>

		<div class="tab">
		  <button id="files-tab" class="tablinks">FILES</button>
		  <button id="catalogues-tab" class="tablinks">CATALOGUES</button>
		</div>
		<div id="tabview">
			<div id="files" class="tabcontent">
				<div id="files-search" class="input-group" style="padding-bottom: 7px;">
		      		<input type="text" class="form-control" placeholder="Search files">
		      		<span class="input-group-btn">
		        		<button class="btn btn-default" type="button">
		        			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		        		</button>
		      		</span>
		    	</div>
		    	<div id="files-show">
					<div class="list-group"><!--jQuery add and remove list-group-item-success class-->
					  	<a id="file-holder-no-1" href="javascript:void(0)" value="files/gw.pdf" 
					  		class="list-group-item list-group-item-success">
							<img src="icons/file.png" class="file-icon">
					  		<span id="file-no-1">File that is open</span>
						</a>
						<a href="#" class="list-group-item">
							<img src="icons/file.png" class="file-icon">
							<span id="file-no-2">Clicking on one  of the files sholud change the pdf view call displayDocument() with proper params</span>
						</a>
						<a href="#" class="list-group-item">
							<img src="icons/file.png" class="file-icon">
							<span id="file-no-3">remove list-group-item-success class from all anchors and add to the one clicked</span>
						</a>
						<a href="#" class="list-group-item">
							<img src="icons/file.png" class="file-icon">
							<span id="file-no-4">File name here</span>
						</a>
						<a href="#" class="list-group-item">
							<img src="icons/file.png" class="file-icon">
							<span id="file-no-5">other files</span>
						</a>
					</div>
		    	</div>
			</div>
			<div id="catalogues" class="tabcontent">
				<div id="catalogues-search" class="input-group" style="padding-bottom: 7px;">
		      		<input type="text" class="form-control" placeholder="Search catalogues">
		      		<span class="input-group-btn">
		        		<button class="btn btn-default" type="button">
		        			<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		        		</button>
		      		</span>
		    	</div>
				<div id="catalogues-show">
					<div id="catalogues-no-1" class="panel-group">
		                <div class="panel panel-default panel-success">
		                    <div  data-toggle="collapse" href="#catalogues-1-contents" class="panel-heading">
		                        <h5 class="panel-title">
									<img src="icons/folder.png" class="folder-icon">
		                        	<span id="catalogue-no-1">Catalogue name1</span> &nbsp; <span class="caret"></span>
		                        </h5>
		                    </div>
		                    <div id="catalogues-1-contents" class="panel-collapse collapse">
		                        <ul class="list-group">
		                            <li class="list-group-item">
										<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-1">Bookmark name1</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-2">Bookmark No. 2</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-3">Remove panel-success class from all cateloges only with one that is currently open on click</span>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            <div id="catalogues-no-2" class="panel-group">
		                <div class="panel panel-default">
		                    <div  data-toggle="collapse" href="#catalogues-2-contents" class="panel-heading">
		                        <h5 class="panel-title">
		                        	<img src="icons/folder.png" class="folder-icon">
		                        	<span id="catalogue-no-2">Catalogue name 2</span> &nbsp; <span class="caret"></span>
		                        </h5>
		                    </div>
		                    <div id="catalogues-2-contents" class="panel-collapse collapse">
		                        <ul class="list-group">
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-4">Bookmark name1</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-5">Bookmark No. 2</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-6">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-7">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-8">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-9">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-10">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-11">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-12">Other</span>
		                            </li>
		                            <li class="list-group-item">
		                            	<img src="icons/bookmark.png" class="folder-icon">
		                            	<span id="bookmark-no-13">Other</span>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
				</div>
			</div>
		</div>
		
		<div class="dropup">
			<img id="new-file-catalogue" class="floating-action-button dropdown-toggle" src="icons/add.png"  type="button"  		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  	<ul id="file-catalogue-modal" class="dropdown-menu" aria-labelledby="new-file-catalogue">
		  		<form action = "upload.php" method="post" enctype="multipart/form-data" id="new-file-catalogue-form">
		  			<div id="file-modal-contents">
			  			<h4>Upload e-books</h4>
			  			<input type="file" id="fileToUpload" name="fileToUpload" multiple style="width: 240px;" /><!--see notes-->
			  		</div>
			  		<div id="catalogue-modal-contents">
			  			<h4>Create a new Catalogue</h4>
			  			<input type="text" id="new-catalogue-name" name="new-catalogue-name" placeholder="Catalogue name" style="width: 250px;"><br/>
			  			<br/>
			  			<textarea id="new-catalogue-desc" name="new-catalogue-desc" placeholder="Description ..." 	 	style="width: 250px;"></textarea>
			  		</div><br/>
			  		<button type="submit"  value="Upload Image" name="submit" class="btn btn-success" style="float: right;">Done</button>
		  		</form>
		  	</ul>
		</div>
	</div>

	<div id="pdf-viewer">
		<img id="zoom-in"   class="floating-action-button" src="icons/plus.png">
		<img id="zoom-out"  class="floating-action-button" src="icons/minu.png">
		<img id="make-note" class="floating-action-button" src="icons/pen.png">
		<img id="rotate"    class="floating-action-button" src="icons/rotate.png">
	</div>

	<div id="notes-drawer" class="sidenav">
	  	<a href="javascript:void(0)" class="closebtn" id="notes-close">&times;</a>
	  	<!-- do it -->
	</div>

</body>
</html>

