@extends('layouts.app')

@section('content')
	<?php $user = auth()->user();?>
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Product for Sale</h3>
                    </div>
					
					<div class="panel-body">
                        <div class="row">
<!--
							<form method="POST" action="{{ url('profile/'.Auth::id().'/products/add/') }}" id="fileForm" role="form">
-->
							<form method="POST" action="{{ url('profile/' . $user->user_id . '/products/addAction') }}" id="fileForm" role="form">

								{{ csrf_field() }}
								<fieldset>
									<div style="margin-left: 15px;"> 
										<div class="row form-group">
											<label for="product_name" class="col-lg-3 control-label">Product Name:</label>
											<div class="col-lg-8">
												<input class="form-control"  id="product_name" type="product_name" name="product_name">
												@if ($errors->has('product_name'))
													<span class="error">
														{{ $errors->first('product_name') }}
													</span>
												@endif
											</div>
										</div>
										
										</br>
										
										<div class="row form-group">
											<label for="publisher_name" class="col-lg-3 control-label">Publisher Name:</label>
											<div class="col-lg-8">
												<input class="form-control"  id="publisher_name" type="publisher_name" name="publisher_name">
												@if ($errors->has('publisher_name'))
													<span class="error">
														{{ $errors->first('publisher_name') }}
													</span>
												@endif
											</div>
										</div>
										
										</br>

										<div class="row form-group">
											<label for="developer_name" class="col-lg-3 control-label">Developer Name:</label>
											<div class="col-lg-8">
												<input class="form-control"  id="developer_name" type="developer_name" name="developer_name">
												@if ($errors->has('developer_name'))
													<span class="error">
														{{ $errors->first('developer_name') }}
													</span>
												@endif
											</div>
										</div>
										
										</br>

										<div class="row form-group">
												<label for="release_date" class="col-lg-3 control-label">Release Date:</label>
												<div class="col-lg-8">
													<input type="date" name="release_date" id="release_date">
													@if ($errors->has('release_date'))
														<span class="error">
															{{ $errors->first('release_date') }}
														</span>
													@endif
												</div>
										</div>

										<br>
										
										<div class="row form-group">
											<label for="logo" class="col-lg-5 control-label">Product Logo:</label>
											<input type="file" name="logo" >
											@if ($errors->has('logo'))
												<span class="error">
													{{ $errors->first('logo') }}
												</span>
											@endif
										</div>
										
										<div class="row form-group">
											<label for="descript" class="col-lg-3 control-label">Product Description:</label>
											<div class="col-lg-8">
												<textarea class="form-control white-box scrollbar-window" rows="10" id="descript" type="descript" name="descript"></textarea>
												@if ($errors->has('descript'))
													<span class="error">
														{{ $errors->first('descript') }}
													</span>
												@endif
											</div>
										</div>

										<br>

											<div class="row form-group" style="margin-left: 0px;">
											<label for="product_price" class="col-lg5 control-label">Product Price:</label>
												<input type="number" id="product_price" placeholder="0.00" step="0.01" min="0" name="product_price">
												@if ($errors->has('product_price'))
													<span class="error">
														{{ $errors->first('product_price') }}
													</span>
												@endif
										</div>

										<br>
										
										<div class="row form-group">
											<label for="op_sys" class="col-lg-5 control-label">Supported Systems:</label>
											<div class="col-lg-5">
												<input type="checkbox" name="op_sys" value="w">Windows
												<img src="/os_images/windows_logo.png" style="width:20px;" width="420" alt="windows_logo.png">
												&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
												<input type="checkbox" name="op_sys" value="w">Mac OS
												<img src="/os_images/ios_logo.png" style="width:20px;" width="420" alt="ios_logo.png">
												<br>
												<br>
												<input type="checkbox" name="op_sys" value="w">Linux
												<img src="/os_images/linux_logo.png" style="width:20px;" width="420" alt="linux_logo.png">
												<br>
												<br>
											</div>
											@if ($errors->has('op_sys'))
												<span class="error">
													{{ $errors->first('op_sys') }}
												</span>
											@endif
										</div>
										
										</br>
										
										<div class="row form-group">
											<label for="key_list" class="col-lg-3 control-label">Key List: (one per line)</label>
											<div class="col-lg-8">
												<textarea class="form-control white-box scrollbar-window" rows="10" id="key_list" type="key_list" name="key_list"></textarea>
												@if ($errors->has('key_list'))
													<span class="error">
														{{ $errors->first('key_list') }}
													</span>
												@endif
											</div>
										</div>

										<div class="row form-group">
											<label for="tag_list" class="col-lg-3 control-label">Tags: (one per line)</label>
											<div class="col-lg-8">
												<textarea class="form-control white-box scrollbar-window" rows="10" id="tag_list" type="tag_list" name="tag_list"></textarea>
												@if ($errors->has('tag_list'))
													<span class="error">
														{{ $errors->first('tag_list') }}
													</span>
												@endif
											</div>
										</div>

										<br>

										<div class ="row form-group">
											<div class="col-lg-5">
												<button class="btn btn-success" type="submit" id="add_product_btn">Add Product</button>
												@if ($errors->has('add_product_btn'))
													<span class="error">
														{{ $errors->first('add_product_btn') }}
													</span>
												@endif
											</div>
										</div>
										
										
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
