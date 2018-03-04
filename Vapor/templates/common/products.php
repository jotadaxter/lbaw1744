<div id="myDIV" class="container">

	<script src="./js/products_page.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<div class="container-full">
	  <div class="row">
		<div class="col-xs-8">
		  <form class="form-inline">
			<div class="form-group">
			  <input type="text" class="form-control" id="txtQuery" placeholder="Search...">
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

    <!-- Image Gallery -->
    <div class="container gallery" >
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title"></h1>
            </div>

            <div align="center">
                <button class="btn btn-default filter-button" data-filter="all">Popular</button>
                <button class="btn btn-default filter-button" data-filter="new">Novidades</button>
                <button class="btn btn-default filter-button" data-filter="promo">Promoções</button>
            </div>
            <br/>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter new">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter new">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter new">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                <img src="res/images/product.png" class="img-responsive">
                <figcaption class="figure-caption text-right product-description">Product Description</figcaption>
            </div>
        </div>
    </div>
    </section>

</div>