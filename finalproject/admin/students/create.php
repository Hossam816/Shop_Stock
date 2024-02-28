<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <?php include '../inc/head.php' ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  </head>
  <body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
      <?php include "../inc/aside.php" ?>
    </aside>
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <?php include '../inc/nav.php'?>
      </header>
      <!-- /header -->
      <!-- Header-->

      <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
          <div class="row m-0">
            <div class="col-sm-4">
              <div class="page-header float-left">
                <div class="page-title">
                  <h1>Dashboard</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Basic</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="animated fadeIn">
          <div class="container-fluid width-100">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Students</strong> Elements
                </div>
                <div class="card-body card-block">
                  <form
                    action="#"
                    method="post"
                    enctype="multipart/form-data"
                    class="form-horizontal"
                  >
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="text-input" class="form-control-label"
                          >SSN</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="text"
                          id="text-input"
                          name="text-input"
                          placeholder="SSN Here"
                          class="form-control"
                        /><small class="form-text text-muted"
                          >Enter your SSN</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="fName-input" class="form-control-label"
                          >First Name</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="text"
                          id="firstN-input"
                          name="fName-input"
                          placeholder="Enter Your First Name"
                          class="form-control"
                        /><small class="help-block form-text"
                          >Please enter your First Name</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="fName-input" class="form-control-label"
                          >Last Name</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="text"
                          id="lastN-input"
                          name="lName-input"
                          placeholder="Enter Your Last Name"
                          class="form-control"
                        /><small class="help-block form-text"
                          >Please enter your last name</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="email-input" class="form-control-label"
                          >Email Input</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="email"
                          id="email-input"
                          name="email-input"
                          placeholder="Enter Email"
                          class="form-control"
                        /><small class="help-block form-text"
                          >Please enter your email</small
                        >
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="file-input" class="form-control-label"
                          >File input</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <input
                          type="file"
                          id="file-input"
                          name="file-input"
                          class="form-control-file"
                        />
                      </div>
                    </div>
                    
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label for="select" class="form-control-label"
                          >Department</label
                        >
                      </div>
                      <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control">
                          <option value="0">Please select</option>
                          <option value="1">Option #1</option>
                          <option value="2">Option #2</option>
                          <option value="3">Option #3</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col col-md-3">
                        <label class="form-control-label">Gender</label>
                      </div>
                      <div class="col col-md-9">
                        <div class="form-check">
                          <div class="radio">
                            <label for="radio2" class="form-check-label">
                              <input
                                type="radio"
                                id="radio2"
                                name="radios"
                                value="option2"
                                class="form-check-input"
                              />Male
                            </label>
                          </div>
                          <div class="radio">
                            <label for="radio3" class="form-check-label">
                              <input
                                type="radio"
                                id="radio3"
                                name="radios"
                                value="option3"
                                class="form-check-input"
                              />Female
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                      <button type="submit" class="btn btn-success btn-sm">
                        Submit
                      </button>
                    </div>
                    
                  </form>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                  </button>
                  <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                  </button>
                </div>
              </div>
              <div class="card">
                <div class="card-header"><strong>Inline</strong> Form</div>
                <div class="card-body card-block">
                  <form action="#" method="post" class="form-inline">
                    <div class="form-group">
                      <label
                        for="exampleInputName2"
                        class="pr-1 form-control-label"
                        >Name</label
                      ><input
                        type="text"
                        id="exampleInputName2"
                        placeholder="Jane Doe"
                        required=""
                        class="form-control"
                      />
                    </div>
                    <div class="form-group">
                      <label
                        for="exampleInputEmail2"
                        class="px-1 form-control-label"
                        >Email</label
                      ><input
                        type="email"
                        id="exampleInputEmail2"
                        placeholder="jane.doe@example.com"
                        required=""
                        class="form-control"
                      />
                    </div>
                  </form>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                  </button>
                  <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                  </button>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- .animated -->
      </div>
      <!-- .content -->

      <div class="clearfix"></div>

      <footer class="site-footer">
            <?php include '../inc/footer.php' ?>
      </footer>
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <?php include '../inc/script.php' ?>
  </body>
</html>
