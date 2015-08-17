<?php 


require_once '../bootstrap.php';

// check if logged in
if (Auth::check()) {
	$isLoggedIn = true;
}

if (!isset($_SESSION["isLoggedIn"])) {
	$_SESSION["isLoggedIn"] = false;
}


//toggles the login/logout button
if ($_SESSION["isLoggedIn"]) {
	$isLoggedIn = true;
} else {
	$isLoggedIn = false;
}

?>

<style>

.navbarFormat {
	margin: 10px 0px;
	border-bottom: 1px solid #C6C6C6;
	padding-bottom: 10px;
}
.links {
	position: absolute;
	bottom: 10px;
	text-align: center;
	width: 90%;
}
dt {
	font-weight: bold; 
}
dd {
	margin-bottom: 5px;
}
#timothy {
	float: left;
	width: 50%;
}
#tarek {
	float: left;
	width: 50%;
}

</style>

<!-- MODALS -->
<div class="modal fade" id="aSearchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Advanced Search</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			<form action="http://adnormallister.dev/ads">
				<div class="form-group">
					<select class="form-control" name="column">
						<option>Search By</option>
						<option value="title">Title</option>
						<option value="price">Price</option>
						<option value="catagories">Catagories</option>
						<option value="description">Desciption</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="q" class="form-control" id="search" placeholder="Search...">
				</div>
				<div class="form-group searchBtn">
					<button class="btn btn-default theBtn"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</form>
			<!-- END OF MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
				<form method="POST" action="auth.login.php">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" autofocus>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<button class="btn btn-default">Login</button>
					</div>
				</form>
			<!-- END OF MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">FAQ</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			 <dl>
				<dt>Q. What is this?</dt>
				<dd>A. A craigslist clone.... For food</dd>
				<dt>Q. Why?</dt>
				<dd>A. Becuase we didn't have a choice. It was an assignment.</dd>
				<dt>Q. No... Why food?</dt>
				<dd>A. The world needed an online food ordering service. I mean, who doesn't want to get a squashed pie three weeks after you bought it? Or a homemade bowl of chicken noodle soup thats cold?</dd>
				<dt>Q. Oh. How do I sell food?</dt>
				<dd>A. Create a user if you have not already. Then click the "Create Ad" button in the sidebar.</dd>
				<dt>Q. Can I host a bakesale for my school/scout troop/theater club?</dt>
				<dd>A. Yes. When you register, you have the option to add an organization. This enables the searching of ads by organization.</dd>
				<dt>Q. On a different note, who are the sexy beasts who made this wonderful addition to humanity?</dt>
				<dd>A. If you click the Contact link right next to the FAQ link you clicked to get here, you can find out everything about us.</dd>
				<dt>Q. What if I have a question that is not covered here?</dt>
				<dd>A. You suck it up. Like that glorious milkshake you are about to buy.</dd>
				<dt>Q. No really...</dt>
				<dd>A. You can hit us up using the info in the contact modal.</dd>
			</dl>
			<!-- END OF MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
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
			<p>
				It was like any other day. Birds flew, dogs barked, and people living in first world nations complained about the 20 foot walk to the refrigerator. But on this normal day, something extraordinary was about to happen. Two students from Codeup were told they had to make a craigslist clone. From this simple assignment came the greatest thing since sliced bread, the ablity to buy sliced bread from complete strangers! After drawing on a whiteboard for about three and a half days, they figured out what they were doing and crafted this gift from above that you see before you. It was great. It still is great. Stop reading and go check it out. No really, go. If you don't know how, click on the FAQ link that was right beside the one that brought you here.
			</p>
			<!-- END OF MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
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
				<h4 class="modal-title" id="myModalLabel">Contact</h4>
			</div>
			<div class="modal-body">
			<!-- BEGINNING OF MODAL BODY. DO NOT PUT CUSTOM CODE BEFORE HERE -->
			<div class="container">
				<div id="timothy">
					<h4>Lead Developer</h4>
					<h5>Timothy Birrell</h5>
					tbirrell@mastersolutions.biz
				</div>
				<div id="tarek">
					<h4>Other Lead Developer</h4>
					<h5>Tarek Hafec</h5>
					thafez@ymail.com
				</div>
			</div>
			<!-- END OF MODAL. DO NOT PUT CUSTOM CODE AFTER HERE -->
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
	<form class="form-inline navbarFormat" method="GET" action="/ads">
		<div class="form-group">
			<input type="text" name="q" class="form-control" id="search" placeholder="Search..." style="width: 225px;">
		</div>
		<div class="form-group">
			<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		</div>
	</form>
	<!-- <div class="aSearch navbarFormat">
		<button class="btn btn-default" data-toggle="modal" data-target="#aSearchModal">Advanced Search</button>
	</div> -->
	<div class="newAdd navbarFormat">
	<?php if ($isLoggedIn): ?>
		<a href="http://adnormallister.dev/ads/create"><button class="btn btn-default">Create New Ad</button></a>
	<?php else: ?>
		<a href="http://adnormallister.dev/login"><button class="btn btn-default">Create New Ad</button></a>
	<?php endif; ?>
	</div>
	<?php if (!$isLoggedIn): ?>
	<div class="login navbarFormat">
		<button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
		<a href="http://adnormallister.dev/signup"><button class="btn btn-default">Sign up</button></a>
	</div>	
	<?php else: ?>
	<div class="login navbarFormat">
		<a href="http://adnormallister.dev/logout"><button class="btn btn-default">Logout</button></a>
		<a href="http://adnormallister.dev/users/show?id=<?= $_SESSION["id"] ?>"><button class="btn btn-default">Veiw Profile</button></a>
	</div>
	<?php endif; ?>


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
	<a class="navbar-brand" href="http://adnormallister.dev">Adnormal Oatmeal</a>
</div>