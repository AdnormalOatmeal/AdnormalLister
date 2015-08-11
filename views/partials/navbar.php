<style>

.search-form {
	margin-top: 10px;
	border-bottom: 1px solid #C6C6C6;
	padding-bottom: 10px;
}
.links {
	position: absolute;
	bottom: 10px;
	text-align: center;
	width: 90%;
}
.login {
	margin: 10px 0px;
}

</style>

<!-- MODALS -->
<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">FAQ</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			 FAQ
			<!-- END OF PAGE MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">About</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			About
			<!-- END OF PAGE MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">About</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			About
			<!-- END OF PAGE MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- NAVBAR -->
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm container">
	<a class="navmenu-brand visible-md visible-lg" href="http://adnormallister.dev">Adnormal Oatmeal</a>
	<form class="form-inline search-form">
		<div class="form-group">
			<input type="text" class="form-control" id="search" placeholder="Search..." style="width: 225px;">
		</div>
		<div class="form-group">
			<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		</div>
	</form>

	<div class="login">
		<button class="btn btn-default">Login</button>
	</div>


	<div class="links">
		<a href="#" data-toggle="modal" data-target="#faqModal">FAQ</a>
		 - 
		<a href="#" data-toggle="modal" data-target="#aboutModal">About</a>
		 - 
		<a href="#" data-toggle="modal" data-target="#contactModal">Contact</a>
	</div>
</div>
<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
	<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="#">Adnormal Oatmeal</a>
</div>