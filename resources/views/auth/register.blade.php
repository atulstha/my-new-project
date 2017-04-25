<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('registration/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('registration/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Get yourself registered</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{asset('registration/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('registration/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('registration/css/demo.css')}}" rel="stylesheet" />
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('{{asset('registration/img/wizard.jpg')}}">
    <!--   Creative Tim Branding   -->
   <!--  <a href="http://creative-tim.com">
         <div class="logo-container">
            <div class="logo">
                <img src="assets/img/new_logo.png">
            </div>
            <div class="brand">
                Creative Tim
            </div>
        </div>
    </a>-->

    <!--  Made With Get Shit Done Kit  -->
        <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
            <div class="brand">GK</div>
            <div class="made-with">Made with <strong>GSDK</strong></div>
        </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="blue" id="wizardProfile">
                    <form role="form" method="POST" action="{{ url('/registeruser') }}" enctype="multipart/form-data">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                      {{ csrf_field() }}
                        <div class="wizard-header">
                            <h3>
                               <b>BUILD</b> YOUR PROFILE <br>
                               <small>This information will let us know more about you.</small>
                            </h3>
                        </div>

                        <div class="wizard-navigation">
                            <ul>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                                <li><a href="#account" data-toggle="tab">Account</a></li>
                                <li><a href="#address" data-toggle="tab">Address</a></li>
                            </ul>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> Let's start with the basic information </h4>
                                      <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="{{asset('registration/img/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file"  name="image" id="wizard-picture">
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>First Name <small>(required)</small></label>
                                        <input id="firstname" name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name <small>(required)</small></label>
                                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Smith...">
                                      </div>
                                  </div>

                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input id="email" name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                      </div>
                                  </div>
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Password <small>(required)</small></label>
                                        <input id="password" name="password" type="password" class="form-control"  required>
                                      </div>
                                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                 
                                 </div>

                                    <div class="col-sm-5 ">
                                      <div class="form-group">
                                        <label>Confirm-Password <small>(required)</small></label>
                                        <input id="password-confirm" name="password-confirm" type="password" class="form-control" required>
                                      </div>
                                  </div>

                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> What are you doing? (checkboxes) </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Student">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>Student</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Employeed">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Employeed</h6>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Others">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Others</h6>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <h4 class="info-text"> COOK LEVEL </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="cooklevel" value="Home">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>HOME COOK</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="cooklevel" value="Intermediate">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Intermediate</h6>
                                            </div>

                                        </div>
                      
                                     <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="cooklevel" value="Professional">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Professional</h6>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Are you living in a nice area? </h4>
                                    </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Country</label><br>
                                             <select name="country" class="form-control">
                                                <option value="Afghanistan"> Afghanistan </option>
                                                <option value="Albania"> Albania </option>
                                                <option value="Algeria"> Algeria </option>
                                                <option value="American Samoa"> American Samoa </option>
                                                <option value="Andorra"> Andorra </option>
                                                <option value="Angola"> Angola </option>
                                                <option value="Anguilla"> Anguilla </option>
                                                <option value="Antarctica"> Antarctica </option>
                                                <option value="...">...</option>
                                            </select>
                                          </div>
                                    </div>
                                     <div class="col-sm-3 ">
                                         <div class="form-group">
                                            <label>City</label>
                                            <input name="city" id="city" type="text" class="form-control" placeholder="New York...">
                                          </div>
                                    </div>


                                    <div class="col-sm-5  col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Gender</label><br>
                                             <select name="gender" id="gender" class="form-control">
                                                <option value="Male"> Male </option>
                                                <option value="Female"> Female </option>
                                                <option value="Other"> Other </option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Birthday</label>
                                            <input type="date" name="dob" id="dob" class="form-control" placeholder="5h Avenue">
                                          </div>
                                    </div>
                                    <div class="col-sm-10  col-sm-offset-1">
                                         <div class="form-group">
                                            <label>About Yourself</label>
                                            <textarea name="about" id="about" class="form-control" placeholder="242"> Describe Yoursellf...</textarea>
                                          </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                
                                <button type="submit" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm">
                                    Register
                                </button>
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
        </div>
    </div>

</div>

</body>

    <!--   Core JS Files   -->
    <script src="{{asset('registration/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('registration/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('registration/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{asset('registration/js/gsdk-bootstrap-wizard.js')}}"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="{{asset('registration/js/jquery.validate.min.js')}}"></script>

</html>
