<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Basic <span class="text-bold">example</span></h5>
					<p>
						Individual form controls automatically receive some global styling.
					</p>
					<div class="row margin-top-30">
						<div class="col-lg-6 col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading">
									<h5 class="panel-title">Default Form</h5>
								</div>
								<div class="panel-body">
									<p class="text-small margin-bottom-20">
										All textual
										<code>
											&lt;input&gt;
										</code>
										,
										<code>
											&lt;textarea&gt;
										</code>
										, and
										<code>
											&lt;select&gt;
										</code>
										elements with
										<code>
											.form-control
										</code>
										are set to
										<code>
											width: 100%;
										</code>
										by default. Wrap labels and controls in
										<code>
											.form-group
										</code>
										for optimum spacing.
									</p>
									<form role="form">
										<div class="form-group">
											<label for="exampleInputEmail1"> Email address </label>
											<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1"> Password </label>
											<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>
										<div class="checkbox clip-check check-primary">
											<input type="checkbox" id="checkbox1" value="1">
											<label for="checkbox1"> Remember me </label>
										</div>
										<button type="submit" class="btn btn-o btn-primary">
											Submit
										</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading">
									<h5 class="panel-title">Horizontal form</h5>
								</div>
								<div class="panel-body">
									<p class="text-small margin-bottom-20">
										Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding
										<code>
											.form-horizontal
										</code>
										to the form. Doing so changes
										<code>
											.form-group
										</code>
										s to behave as grid rows, so no need for
										<code>
											.row
										</code>
										.
									</p>
									<form role="form" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputEmail3"> Email </label>
											<div class="col-sm-10">
												<input type="email" placeholder="Email" id="inputEmail3" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputPassword3"> Password </label>
											<div class="col-sm-10">
												<input type="password" placeholder="Password" id="inputPassword3" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<div class="checkbox clip-check check-primary">
													<input type="checkbox" id="checkbox2" value="1">
													<label for="checkbox2"> Remember me </label>
												</div>
											</div>
										</div>
										<div class="form-group margin-bottom-0">
											<div class="col-sm-offset-2 col-sm-10">
												<button class="btn btn-o btn-primary" type="submit">
													Sign in
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading">
									<h5 class="panel-title">Inline form</h5>
								</div>
								<div class="panel-body">
									<p class="text-small margin-bottom-20">
										Add
										<code>
											.form-inline
										</code>
										to your
										<code>
											&lt;form&gt;
										</code>
										for left-aligned and inline-block controls.
									</p>
									<form role="form" class="form-inline">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon">
													@
												</div>
												<input type="email" placeholder="Enter email" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword2" class="sr-only"> Password </label>
											<input type="password" placeholder="Password" id="exampleInputPassword2" class="form-control">
										</div>
										<div class="form-group">
											<div class="checkbox clip-check check-primary">
												<input type="checkbox" id="checkbox3" value="1">
												<label for="checkbox3"> Remember me </label>
											</div>
										</div>
										<button class="btn btn-primary" type="submit">
											Sign in
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: BASIC EXAMPLE -->
<!-- start: ALTERNATIVE EXAMPLE -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h5 class="over-title margin-bottom-15">Alternative <span class="text-bold">example</span></h5>
							<p>
								Show your text field as a line, adding the class
								<code>
									.underline
								</code>
							</p>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Default Form</h5>
								</div>
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<label for="exampleInputEmail1"> Email address </label>
											<input type="email" class="form-control underline" id="exampleInputEmail1" placeholder="Enter email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1"> Password </label>
											<input type="password" class="form-control underline" id="exampleInputPassword1" placeholder="Password">
										</div>
									</form>
								</div>
							</div>
							<h5 class="margin-bottom-15"></h5>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Horizontal Form</h5>
								</div>
								<div class="panel-body">
									<form role="form" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputEmail3"> Email </label>
											<div class="col-sm-10">
												<input type="email" placeholder="Email" id="inputEmail3" class="form-control underline">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputPassword3"> Password </label>
											<div class="col-sm-10">
												<input type="password" placeholder="Password" id="inputPassword3" class="form-control underline">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h5 class="over-title margin-bottom-15">Control <span class="text-bold">sizing</span></h5>
							<p>
								Create taller or shorter form controls that match button sizes.
							</p>
							<div class="panel panel-white no-radius">
								<div class="panel-heading">
									<h5 class="panel-title">Default field sizing</h5>
								</div>
								<div class="panel-body">
									<form role="form" class="margin-bottom-20">
										<div class="form-group">
											<input type="text" placeholder="Large Text Field" id="form-field-12" class="form-control input-lg">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Standard Text Field" id="form-field-13" class="form-control">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Small Text Field" id="form-field-13" class="form-control input-sm">
										</div>
									</form>
								</div>
							</div>
							<div class="panel panel-white no-radius">
								<div class="panel-heading">
									<h5 class="panel-title">Alternative field sizing</h5>
								</div>
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<input type="text" placeholder="Large Text Field" id="form-field-12" class="form-control underline input-lg">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Standard Text Field" id="form-field-12" class="form-control underline">
										</div>
										<div class="form-group">
											<input type="text" placeholder="Small Text Field" id="form-field-13" class="form-control underline input-sm">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: ALTERNATIVE EXAMPLE -->
<!-- start: FIELDSET -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Defining a <span class="text-bold">Fieldset</span></h5>
					<p class="margin-bottom-30">
						<code>
							&lt;fieldset&gt;
						</code>
						is used as a wrapper right inside the form element. Right after you define a fieldset, you can include a legend title by using
						<code>
							&lt;legend&gt;
						</code>
						. Here's some HTML to help make copy paste.
					</p>
					<div class="row">
						<div class="col-md-6">
							<fieldset>
								<legend>
									Your Account
								</legend>
								<div class="form-group">
									<label> E-mail <span class="symbol required"></span> </label>
									<div class="form-group">
										<input type="email" placeholder="Text Field" name="email" id="email" class="form-control">
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>
									Choose a password
								</legend>
								<div class="form-group">
									<label> Password </label>
									<input type="text" class="form-control" placeholder="Repeat Password">
								</div>
								<div class="form-group">
									<label> Repeat Password <span class="symbol required"></span> </label>
									<input type="email" placeholder="Text Field" name="email" id="email" class="form-control">
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset>
								<legend>
									Personal Information
								</legend>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label> First Name </label>
											<input type="text" name="firstName" class="form-control" placeholder="Enter your First Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label"> Last Name </label>
											<input type="text" name="lastName" class="form-control" placeholder="Enter your Last Name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="block"> Gender </label>
											<div class="clip-radio radio-primary">
												<input type="radio" id="female" name="gender" value="female">
												<label for="female"> Female </label>
												<input type="radio" id="male" name="gender" value="male" checked="checked">
												<label for="male"> Male </label>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label> Choose your country or region </label>
											<select name="country" class="form-control">
												<option value="">&nbsp;</option>
												<option value="AL">Alabama</option>
												<option value="AK">Alaska</option>
												<option value="AZ">Arizona</option>
												<option value="AR">Arkansas</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="ME">Maine</option>
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MS">Mississippi</option>
												<option value="MO">Missouri</option>
												<option value="MT">Montana</option>
												<option value="NE">Nebraska</option>
												<option value="NV">Nevada</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WA">Washington</option>
												<option value="WV">West Virginia</option>
												<option value="WI">Wisconsin</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>
									Terms &amp; Condition
								</legend>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="checkbox-inline clip-check">
												<input type="checkbox" name="newsletter">
												<i></i> I read and accept the terms and conditions </label>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: FIELDSET -->
<!-- start: INPUT OPTIONS -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Input <span class="text-bold">Options</span></h5>
					<div class="row">
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Disabled State
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Add the
										<code>
											disabled
										</code>
										boolean attribute on an input to prevent user input.
									</p>
									<div class="form-group">
										<label> Disabled Input </label>
										<input type="text" placeholder="Disabled" id="form-field-21" class="form-control" disabled="disabled">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Readonly State
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Add the
										<code>
											readonly
										</code>
										boolean attribute on an input to prevent user input.
									</p>
									<div class="form-group">
										<label> Readonly Input </label>
										<input type="text" placeholder="Readonly" value="Readonly value" id="form-field-21" class="form-control" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Required Label
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										An asterisk indicates to the user that the field is required.
									</p>
									<div class="form-group">
										<label> Required Input <span class="symbol required"></span> </label>
										<input type="text" placeholder="Required" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Success State
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Includes validation styles for success states on form controls.
									</p>
									<div class="form-group has-success">
										<label> Success Label <span class="symbol required"></span> </label>
										<input type="text" placeholder="Required" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Warning State
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Includes validation styles for warning states on form controls.
									</p>
									<div class="form-group has-warning">
										<label> Warning Label <span class="symbol required"></span> </label>
										<input type="text" placeholder="Required" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Error State
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Includes validation styles for error states on form controls.
									</p>
									<div class="form-group has-error">
										<label> Error Label <span class="symbol required"></span> </label>
										<input type="text" placeholder="Required" class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: INPUT OPTIONS -->
<!-- start: ICONS AND HELPERS -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15">Icons &amp; <span class="text-bold">Helpers</span></h5>
					<div class="row">
						<div class="col-lg-7 col-sm-6">
							<div class="panel panel-transparent">
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<label> Block Help </label>
											<input type="text" placeholder="Text Field" id="form-field-6" class="form-control">
											<span class="help-block"><i class="ti-info-alt text-primary"></i> A block of help text that breaks onto a new line and may extend beyond one line.</span>
										</div>
										<div class="form-group">
											<div class="row">
												<label class="col-sm-12"> Inline Help </label>
												<div class="col-md-8 col-sm-6">
													<input type="text" placeholder="Text Field" id="form-field-7" class="form-control">
												</div>
												<span class="help-inline col-md-4 col-sm-6"> <i class="ti-info-alt text-primary"></i> Inline help text </span>
											</div>
										</div>
										<div class="form-group">
											<label> Tooltip </label>
											<input type="text" value="Click me!" tooltip="See? Now click away..."  tooltip-trigger="focus" tooltip-placement="top" class="form-control" />
										</div>
										<div class="form-group">
											<label> Popover </label>
											<input type="text" value="Click me!" popover-title="Title" popover-placement="top" popover="Hello, World!" class="form-control" />
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-sm-6">
							<div class="panel panel-transparent">
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<label> Input with Icon </label>
																	<span class="input-icon">
																		<input type="text" placeholder="Text Field" id="form-field-14" class="form-control">
																		<i class="ti-user"></i> </span>
										</div>
										<div class="form-group">
											<label> Right Icon </label>
																	<span class="input-icon input-icon-right">
																		<input type="text" placeholder="Text Field" id="form-field-17" class="form-control">
																		<i class="ti-twitter"></i> </span>
										</div>
										<div class="form-group">
											<label> Add-on </label>
											<div class="input-group">
												<span class="input-group-addon">@</span>
												<input type="text" placeholder="Username" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control">
												<span class="input-group-addon">.00</span>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">$</span>
												<input type="text" class="form-control">
												<span class="input-group-addon">.00</span>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: ICONS AND HELPERS -->
<!-- start: CHECKBOXES -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15"><span class="text-bold">Checkboxes</span></h5>
					<p>
						Checkboxes are for selecting one or several options in a list
					</p>
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Inline Checkbox</h5>
								</div>
								<div class="panel-body">
									<p class="text-small">
										Use the
										<code>
											.checkbox-inline
										</code>
										classes on a series of checkboxes for controls that appear on the same line.
									</p>
									<div class="checkbox clip-check check-primary checkbox-inline">
										<input type="checkbox" id="checkbox4" value="1" checked="">
										<label for="checkbox4"> Checkbox 1 </label>
									</div>
									<div class="checkbox clip-check check-primary checkbox-inline">
										<input type="checkbox" id="checkbox5" value="1">
										<label for="checkbox5"> Checkbox 2 </label>
									</div>
								</div>
							</div>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Default (stacked)</h5>
								</div>
								<div class="panel-body">
									<div class="checkbox clip-check check-primary">
										<input type="checkbox" id="checkbox6" value="1">
										<label for="checkbox6"> Checkbox 1 </label>
									</div>
									<div class="checkbox clip-check check-primary">
										<input type="checkbox" id="checkbox7" value="1">
										<label for="checkbox7"> Checkbox 2 </label>
									</div>
									<div class="checkbox clip-check check-primary">
										<input type="checkbox" id="checkbox8" value="1">
										<label for="checkbox8"> Checkbox 3 </label>
									</div>
									<div class="checkbox clip-check check-primary">
										<input type="checkbox" id="checkbox9" value="1" disabled="">
										<label for="checkbox9"> Checkbox 4 (disabled) </label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Various Colours</h5>
								</div>
								<div class="panel-body">
									<div class="checkbox clip-check check-primary checkbox-inline">
										<input type="checkbox" id="checkbox10" value="1" checked="">
										<label for="checkbox10"> Checkbox 1 </label>
									</div>
									<div class="checkbox clip-check check-success checkbox-inline">
										<input type="checkbox" id="checkbox11" value="1" checked="">
										<label for="checkbox11"> Checkbox 2 </label>
									</div>
									<div class="checkbox clip-check check-warning checkbox-inline">
										<input type="checkbox" id="checkbox12" value="1" checked="">
										<label for="checkbox12"> Checkbox 3 </label>
									</div>
									<div class="checkbox clip-check check-danger checkbox-inline">
										<input type="checkbox" id="checkbox13" value="1" checked="">
										<label for="checkbox13"> Checkbox 4 </label>
									</div>
									<div class="checkbox clip-check check-info checkbox-inline">
										<input type="checkbox" id="checkbox14" value="1" checked="">
										<label for="checkbox14"> Checkbox 5 </label>
									</div>
									<div class="checkbox clip-check check-purple checkbox-inline">
										<input type="checkbox" id="checkbox15" value="1" checked="">
										<label for="checkbox15"> Checkbox 6 </label>
									</div>
								</div>
							</div>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Various Sizes</h5>
								</div>
								<div class="panel-body">
									<div class="checkbox clip-check check-primary checkbox-inline">
										<input type="checkbox" id="checkbox16" value="1">
										<label for="checkbox16"> Checkbox 1 </label>
									</div>
									<div class="checkbox clip-check check-primary check-md checkbox-inline">
										<input type="checkbox" id="checkbox17" value="1">
										<label for="checkbox17"> Checkbox 1 </label>
									</div>
									<div class="checkbox clip-check check-primary check-lg checkbox-inline">
										<input type="checkbox" id="checkbox18" value="1">
										<label for="checkbox18"> Checkbox 3 </label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Switches</h5>
								</div>
								<div class="panel-body">
									<p>
										Turn checkboxes in toggle switches.
									</p>
									<div class="checkbox">
										<input type="checkbox" class="js-switch" checked />
									</div>
								</div>
							</div>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Buttons</h5>
								</div>
								<div class="panel-body">
									<p>
										Turn checkboxes in buttons.
									</p>
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-primary active">
											<input type="checkbox" autocomplete="off" checked>
											Left </label>
										<label class="btn btn-primary">
											<input type="checkbox" autocomplete="off">
											Middle </label>
										<label class="btn btn-primary">
											<input type="checkbox" autocomplete="off">
											Right </label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: CHECKBOXES -->
<!-- start: RADIO -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title margin-bottom-15"><span class="text-bold">Radio</span></h5>
					<p>
						Radios are for selecting one option from many.
					</p>
					<div class="row">
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Inline radio</h5>
								</div>
								<div class="panel-body">
									<p class="text-small">
										Use the
										<code>
											.radio-inline
										</code>
										classes on a series of radios for controls that appear on the same line.
									</p>
									<div class="radio clip-radio radio-primary radio-inline">
										<input type="radio" id="radio1" name="inline" value="radio1">
										<label for="radio1"> Radio 1 </label>
									</div>
									<div class="radio clip-radio radio-primary radio-inline">
										<input type="radio" id="radio2" name="inline" value="radio2" checked="checked">
										<label for="radio2"> Radio 2 </label>
									</div>
								</div>
							</div>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Vertical radio</h5>
								</div>
								<div class="panel-body">
									<div class="radio clip-radio radio-primary">
										<input type="radio" id="radio3" name="vertical" value="radio3">
										<label for="radio3"> Radio 1 </label>
									</div>
									<div class="radio clip-radio radio-primary">
										<input type="radio" id="radio4" name="vertical" value="radio4">
										<label for="radio4"> Radio 2 </label>
									</div>
									<div class="radio clip-radio radio-primary">
										<input type="radio" id="radio5" name="vertical" value="radio5">
										<label for="radio5"> Radio 3 </label>
									</div>
									<div class="radio clip-radio radio-primary">
										<input type="radio" id="radio6" name="vertical" value="radio6" disabled="">
										<label for="radio6"> Radio 4 (disabled) </label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Verious Colours</h5>
								</div>
								<div class="panel-body">
									<div class="radio clip-radio radio-primary radio-inline">
										<input type="radio" id="radio7" name="radio7" value="radio7" checked="checked">
										<label for="radio7"> Radio 1 </label>
									</div>
									<div class="radio clip-radio radio-success radio-inline">
										<input type="radio" id="radio8" name="radio8" value="radio8" checked="checked">
										<label for="radio8"> Radio 2 </label>
									</div>
									<div class="radio clip-radio radio-warning radio-inline">
										<input type="radio" id="radio9" name="radio9" value="radio9" checked="checked">
										<label for="radio9"> Radio 3 </label>
									</div>
									<div class="radio clip-radio radio-danger radio-inline">
										<input type="radio" id="radio10" name="radio10" value="radio10" checked="checked">
										<label for="radio10"> Radio 4 </label>
									</div>
									<div class="radio clip-radio radio-info radio-inline">
										<input type="radio" id="radio11" name="radio11" value="radio11" checked="checked">
										<label for="radio11"> Radio 5 </label>
									</div>
									<div class="radio clip-radio radio-purple radio-inline">
										<input type="radio" id="radio12" name="radio12" value="radio12" checked="checked">
										<label for="radio12"> Radio 6 </label>
									</div>
								</div>
							</div>
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Sized</h5>
								</div>
								<div class="panel-body">
									<div class="radio clip-radio radio-primary radio-inline">
										<input type="radio" id="radio13" name="radiosize" value="radio13">
										<label for="radio13"> Radio 1 </label>
									</div>
									<div class="radio clip-radio radio-primary radio-md radio-inline">
										<input type="radio" id="radio14" name="radiosize" value="radio14">
										<label for="radio14"> Radio 2 </label>
									</div>
									<div class="radio clip-radio radio-primary radio-lg radio-inline">
										<input type="radio" id="radio15" name="radiosize" value="radio15">
										<label for="radio15"> Radio 3 </label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Buttons</h5>
								</div>
								<div class="panel-body">
									<p>
										Turn radio in buttons.
									</p>
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-primary active">
											<input type="radio" name="options" id="option1" autocomplete="off" checked>
											Left </label>
										<label class="btn btn-primary">
											<input type="radio" name="options" id="option2" autocomplete="off">
											Middle </label>
										<label class="btn btn-primary">
											<input type="radio" name="options" id="option3" autocomplete="off">
											Right </label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: RADIO -->
<!-- start: MASKED INPUT -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Masked <span class="text-bold">Input</span></h5>
					<p class="margin-bottom-30">
						Masked Input allows users to enter the data in a certain format (dates, phone numbers, etc).
					</p>
					<div class="row">
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Date - 99/99/9999
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="form-field-mask-1"> Date <small class="text-success">99/99/9999</small> </label>
										<div class="input-group">
											<input type="text" id="form-field-mask-1" class="form-control input-mask-date">
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-primary">
																			<i class="fa fa-calendar"></i>
																			Go!
																		</button> </span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Phone - (999) 999-9999
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="form-field-mask-2"> Phone <small class="text-warning">(999) 999-9999</small> </label>
										<div class="input-group">
											<span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
											<input type="text" id="form-field-mask-2" class="form-control input-mask-phone">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Product Key -A*-999-A999
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="form-field-mask-3"> Product Key <small class="text-error">A*-999-A999</small> </label>
										<div class="input-group">
											<input type="text" id="form-field-mask-3" class="form-control input-mask-product">
											<span class="input-group-addon"> <i class="fa fa-key"></i> </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: MASKED INPUT -->
<!-- start: TEXT AREA -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Text <span class="text-bold">Area</span></h5>
					<p class="margin-bottom-30">
						The
						<code>
							&lt;textarea&gt;
						</code>
						tag defines a multi-line text input control.
					</p>
					<div class="row">
						<div class="col-sm-6">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Default
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<textarea placeholder="Default Text" id="form-field-22" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										With Character Limit
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<textarea maxlength="50" id="form-field-23" class="form-control limited"></textarea>
									</div>
								</div>
							</div>
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										As a Block Note
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="note-editor">
											<textarea class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Autosize with Animation
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<textarea class="form-control autosize area-animated"></textarea>
									</div>
								</div>
							</div>
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Autosize without Animation
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<textarea class="form-control autosize"></textarea>
									</div>
								</div>
							</div>
							<div class="panel panel-white">
								<div class="panel-heading">
									<div class="panel-title">
										Autosize As a Block Note
									</div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="note-editor">
											<textarea class="form-control autosize area-animated"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: TEXT AREA -->
<!-- start: DATE/TIME Picker -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Date/Time <span class="text-bold">Picker</span></h5>
					<p class="margin-bottom-30">
						A clean, flexible, and fully customizable date picker.
						User can navigate through months and years. The datepicker shows dates that come from other than the main month being displayed. These other dates are also selectable.
					</p>
					<div class="panel panel-white no-radius">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<h5 class="text-bold margin-top-25 margin-bottom-15">Inline</h5>
									<div class="datepicker"></div>
								</div>
								<div class="col-md-6">
									<h5 class="text-bold margin-top-25 margin-bottom-15">Input</h5>
									<div class="form-group">
										<input class="form-control datepicker" type="text">
									</div>
								</div>
								<div class="col-md-6">
									<h5 class="text-bold margin-top-25 margin-bottom-15">component</h5>
									<p class="input-group input-append datepicker date">
										<input type="text" class="form-control"/>
																<span class="input-group-btn">
																	<button type="button" class="btn btn-default">
																		<i class="glyphicon glyphicon-calendar"></i>
																	</button> </span>
									</p>
									<h5 class="text-bold margin-top-25 margin-bottom-15">Format:</h5>
									<div class="form-group">
										<input class="form-control format-datepicker" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<h5 class="text-bold margin-top-25 margin-bottom-15">Timepicker</h5>
									<div class="form-group">
										<input type="text" id="timepicker-default" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<h5 class="text-bold margin-top-25 margin-bottom-15">Date Range</h5>
									<div class="input-group input-daterange datepicker">
										<input type="text" class="form-control"/>
										<span class="input-group-addon bg-primary">to</span>
										<input type="text" class="form-control" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: DATE/TIME Picker -->
<!-- start: SELECT BOXES -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Select <span class="text-bold">Box</span></h5>
					<p class="margin-bottom-30">
						The
						<code>
							&lt;select&gt;
						</code>
						element is used to create a drop-down list.
					</p>
					<div class="row">
						<div class="col-sm-6">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Default Select Boxes</span></h5>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="form-field-select-1"> Default </label>
										<select id="form-field-select-1" class="form-control">
											<option value="">&nbsp;</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-1"> Disabled </label>
										<select id="form-field-select-1" class="form-control" disabled>
											<option value="">&nbsp;</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-2"> Multiple </label>
										<select multiple="multiple" id="form-field-select-2" class="form-control">
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-2"> Multiple Disabled </label>
										<select multiple="multiple" id="form-field-select-2" class="form-control" disabled>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="panel panel-transparent">
								<div class="panel-heading">
									<h5 class="panel-title">Css3 Select Boxes</h5>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="form-field-select-1"> Skin Slide </label>
										<select class="cs-select cs-skin-slide">
											<option value=""></option>
											<option value="sightseeing">Sight Seeing</option>
											<option value="business">Business</option>
											<option value="honeymoon">Honeymoon</option>
											<option value="food">Gourmet</option>
											<option value="shopping">Shopping</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-1"> Skin Slide with Icons </label>
										<select class="cs-select cs-skin-slide">
											<option value=""></option>
											<option value="sightseeing" data-class="fa fa-apple">Sight Seeing</option>
											<option value="business" data-class="fa fa-android">Business</option>
											<option value="honeymoon" data-class="fa fa-windows">Honeymoon</option>
											<option value="food" data-class="fa fa-dropbox">Gourmet</option>
											<option value="shopping" data-class="fa fa-github">Shopping</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-1"> Skin Slide Disabled </label>
										<select class="cs-select cs-skin-slide" disabled>
											<option value=""></option>
											<option value="sightseeing">Sight Seeing</option>
											<option value="business">Business</option>
											<option value="honeymoon">Honeymoon</option>
											<option value="food">Gourmet</option>
											<option value="shopping">Shopping</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-2"> Skin Elastic </label>
										<select class="cs-select cs-skin-elastic">
											<option value="" disabled selected>Select a Country</option>
											<option value="france">France</option>
											<option value="brazil">Brazil</option>
											<option value="argentina">Argentina</option>
											<option value="south-africa">South Africa</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-2"> Skin Elastic with Icons </label>
										<select class="cs-select cs-skin-elastic">
											<option value="" disabled selected>Select a Country</option>
											<option value="france" data-class="fa fa-apple">France</option>
											<option value="brazil" data-class="fa fa-android">Brazil</option>
											<option value="argentina" data-class="fa fa-windows">Argentina</option>
											<option value="south-africa" data-class="fa fa-dropbox">South Africa</option>
											<option value="shopping" data-class="fa fa-github">Shopping</option>
										</select>
									</div>
									<div class="form-group">
										<label for="form-field-select-2"> Skin Elastic Disabled </label>
										<select class="cs-select cs-skin-elastic" disabled>
											<option value="" disabled selected>Select a Country</option>
											<option value="france">France</option>
											<option value="brazil">Brazil</option>
											<option value="argentina">Argentina</option>
											<option value="south-africa">South Africa</option>
											<option value="shopping">Shopping</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h5 class="over-title">Select2</h5>
							<p>
								Select2 gives you a customizable select box with support for searching, tagging, remote data sets, infinite scrolling, and many other highly used options.
							</p>
						</div>
						<form>
							<div class="col-sm-6">
								<div class="panel panel-transparent">
									<div class="panel-body">
										<div class="form-group">
											<label> The basics </label>
											<select class="js-example-basic-single js-states form-control">
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="IN">Indiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="OH">Ohio</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
										<div class="form-group">
											<label> Multiple select boxes </label>
											<select multiple="" class="js-example-basic-multiple js-states form-control">
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="IN">Indiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="OH">Ohio</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
										<div class="form-group">
											<label> Placeholders </label>
											<select class="js-example-placeholder-single js-states form-control">
												<option></option>
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="IN">Indiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="OH">Ohio</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="panel panel-transparent">
									<div class="panel-body">
										<div class="form-group">
											<label> Loading array data </label>
											<select class="js-example-data-array-selected form-control"></select>
										</div>
										<div class="form-group">
											<label> Hiding the search box </label>
											<select class="js-example-basic-hide-search js-states form-control">
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="IN">Indiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="OH">Ohio</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
										<div class="form-group">
											<label> Disabled mode </label>
											<select class="js-example-disabled js-states form-control" disabled>
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NM">New Mexico</option>
													<option value="ND">North Dakota</option>
													<option value="UT">Utah</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="OK">Oklahoma</option>
													<option value="SD">South Dakota</option>
													<option value="TX">Texas</option>
													<option value="TN">Tennessee</option>
													<option value="WI">Wisconsin</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="IN">Indiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="OH">Ohio</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WV">West Virginia</option>
												</optgroup>
											</select>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: SELECT BOXES -->
<!-- start: INPUT SPINNER -->
<div class="container-fluid container-fullw">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-body">
					<h5 class="over-title">Input <span class="text-bold">Spinner</span></h5>
					<p class="margin-bottom-30">
						A mobile and touch friendly input spinner component for Bootstrap. It supports the mousewheel and the up/down keys.
					</p>
					<div class="row">
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										Basic example
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										The init value is set on the input with the
										<code>
											value
										</code>
										attribute.
									</p>
									<div class="form-group">
										<label> Example: </label>
										<input id="demo1" type="text" value="55" name="demo1" touchspin data-min="0" data-max="100" data-step="0.1" data-decimals="2" data-boostat="5" data-maxboostedstep="10">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										Example with postfix
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Use the
										<code>
											data-postfix
										</code>
										attribute to add a postfix.
									</p>
									<div class="form-group">
										<label> Example with postfix: </label>
										<input id="demo1" type="text" value="55" name="demo1" touchspin data-min="0" data-max="100" data-step="0.1" data-decimals="2" data-boostat="5" data-maxboostedstep="10" data-postfix="%">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										With prefix
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Use the
										<code>
											data-prefix
										</code>
										attribute to add a prefix.
									</p>
									<div class="form-group">
										<label> With prefix </label>
										<input id="demo1" type="text" value="0" name="demo1" touchspin data-min="-1000000000" data-max="1000000000" data-stepinterval="50" data-maxboostedstep="10000000" data-prefix="$">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										Vertical buttons
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Set the
										<code>
											data-verticalbuttons
										</code>
										attribute as
										<code>
											true
										</code>.
										You can also specify the class for icons.
									</p>
									<div class="form-group">
										<label> Vertical buttons with custom icons </label>
										<input id="demo4" type="text" value="0" name="demo4" touchspin data-verticalbuttons="true" data-verticalupclass="ti-angle-up" data-verticaldownclass="ti-angle-down">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										Button postfix
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Set the
										<code>
											data-postfix
										</code>
										attribute as
										<code>
											button
										</code>.
										You can also specify the class for the button.
									</p>
									<div class="form-group">
										<label> Button postfix </label>
										<input id="demo5" type="text" value="0" name="demo5" touchspin data-postfix="button" data-postfix_extraclass="btn btn-default">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="panel panel-white min-height-270">
								<div class="panel-heading">
									<div class="panel-title">
										Sizes
									</div>
								</div>
								<div class="panel-body">
									<p class="margin-bottom-30">
										Size of the whole controller can be set with applying input-sm or input-lg class on the input
									</p>
									<div class="form-group">
										<label> Button postfix (large) </label>
										<input id="demo6" type="text" value="0" name="demo6" class="form-control input-lg" touchspin data-postfix="button" data-postfix_extraclass="btn btn-default">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: INPUT SPINNER -->