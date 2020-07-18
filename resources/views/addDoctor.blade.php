@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Add Doctor</h3>
							<!--ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">StartUI</a></li>
								<li><a href="#">Forms</a></li>
								<li class="active">Basic Inputs</li>
							</ol-->
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				
				
				<h5 class="m-t-lg with-border">Doctor Details</h5>

				<form method="post" action="{{Route('createDoctor')}}" enctype="multipart/form-data">
				{!! csrf_field() !!}
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Full Name</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="fullName" name="fullName" value="{{ !empty($user->name) ? $user->name : '' }}" placeholder="Full Name"  required ></p>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Email</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="email" class="form-control" id="fullName" name="email" value="{{ !empty($user->email) ? $user->email : '' }}" placeholder="email"  required ></p>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Gender</label>
						<div class="col-sm-10">
							<select id="exampleSelect"  required  name="gender" class="form-control">
-								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Country</label>
						<div class="col-sm-10">
							<select id="exampleSelect"  required  name="country" class="form-control">
-								<option value="0">None</option>
                                                        @foreach($countries as $country)
                                                        
                                                        
                                                        <option value="{{$country->id}}"  {{ @$user->country == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
                                                        @endforeach
								
							</select>
						</div>
					</div>
				
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Address</label>
						<div class="col-sm-10">
							<textarea rows="4" required name="address" class="form-control" placeholder="Address">{{ !empty($user->address) ? $user->address : '' }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Profile Image</label>
						<div class="col-sm-10">
							<input type="file" name="image" accept="image/jpeg">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Fee</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  required  type="number" name="fee" class="form-control" id="inputPassword" placeholder="Fee" value="{{ !empty($user->fee) ? $user->fee : '' }}"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Phone Number</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input  required  type="number" name="phoneNumber"   class="form-control" id="phoneNumber" value="{{ !empty($user->phoneNumber) ? $user->phoneNumber : '' }}" placeholder="Phone Number"></p>    
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Speciality</label>
						<div class="col-sm-10">
							<input type="Text"  required  name="tag"  class="form-control" id="tag" placeholder="Speciality" value="{{!empty($tag[0]->tagName)?$tag[0]->tagName:''}}">
							<input type="hidden"  required  name="tagid"  class="form-control" id="tag" placeholder="Speciality" value="{{!empty($tag[0]->id)?$tag[0]->id:''}}">
						</div>
					</div>
					<input type="hidden" name="id" value="{{ !empty($user->id) ? $user->id : '' }}">
					<button class="btn pull-right">Submit</button>
					<div class="clearfix"></div>
				</form>

				
				

				<!--<h5 class="m-t-lg with-border">TouchSpin</h5>

				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo1" type="text" value="55" name="demo1">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo2" type="text" value="0" name="demo2" class="col-md-8 form-control">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo_vertical" type="text" value="" name="demo_vertical">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo_vertical2" type="text" value="" name="demo_vertical2">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo3" type="text" value="" name="demo3">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo4" type="text" value="" name="demo4" class="input-sm">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group input-group-lg">
								<input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg">
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input id="demo6" type="text" value="" name="demo6">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<input id="demo5" type="text" class="form-control" name="demo5" value="50">
								<div class="input-group-btn">
									<button type="button" class="btn btn-default">Action</button>
									<button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>-->


				

			</div><!--.box-typical-->
		</div>

		<!--.container-fluid-->
	</div>
@endsection
