<div id="myDIV" class="container">

	<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<script src="./js/products_page.js"></script>
	<link href="css/products_page.css?v=1.0" rel="stylesheet" type="text/css">
	<!------ Include the above in your HEAD tag ---------->

	<div class="wrapper">
		<nav id="sidebar">

			<!-- Sidebar Links -->
			<ul class="list-unstyled components">
				<li class="customList"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Narrow By Tag </a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Open Source</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Freeware</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Botnet</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Bitcoin</a></li>
					</ul>
				<li class="customList"><a href="#homeSubmen" data-toggle="collapse" aria-expanded="false">Narrow By Name </a>
					<ul class="collapse list-unstyled" id="homeSubmen">
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Op. Systems</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Device Systems</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">MiddleWare</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Utility Software</a></li>
					</ul>

				<li class="customList"><!-- Link with dropdown items -->
					<a href="#homeSubme" data-toggle="collapse" aria-expanded="false">Narrow By OS </a>
					<ul class="collapse list-unstyled" id="homeSubme">
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Windows</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Mac OS</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Linux</a></li>
						<li><input type="checkbox" name="vehicle" value="Bike"><a href="#">Debian</a></li>
					</ul>

			</ul>
		</nav>
	
	

		<div class="content">
		  <div class="row">
			<div class="col-xs-8">
			  <form class="form-inline">
				<div class="form-group">
				  <input type="text" class="white-box form-control" id="txtQuery" placeholder="Search...">
				</div>
				<button id="btnSearch" type="button" class="btn btn-default">Search</button>
				<button id="btnClear" type="button" class="btn btn-default">Clear</button>
			  </form>
			</div>
			<div class="col-xs-4">
			  <button id="btnAdd" type="button" class="btn btn-default pull-right">Add New Record</button>
			</div>
		  </div>
		  <div class="row" style="margin-top: 10px">
			<div class="col-xs-12">
			  <table id="grid"></table>
			</div>
		  </div>
		</div>

		<div id="dialog" style="hidden">
		  <input type="hidden" id="ID" />
		  <form>
			<div class="form-group">
			  <label for="Name">Name</label>
			  <input type="text" class="form-control" id="Name">
			</div>
			<div class="form-group">
			  <label for="Tags">Tags</label>
			  <input type="text" class="form-control" id="Tags" />
			</div>
			<div class="form-group">
			  <label for="Rate">Rate</label>
			  <input type="text" class="form-control" id="Rate" />
			</div>
			<button type="button" id="btnSave" class="btn btn-default">Save</button>
			<button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
		  </form>
		</div>
    </section>
</div>
</div>