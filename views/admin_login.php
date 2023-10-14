<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>| Admin Login ।</title>
  <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css') ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url('/assets/images/favicon') ?>">
  <style>
    .responce{
        display: block
    }

    @media only screen and (max-width: 425px) {
        .responce {
          width: 344px;
          padding-left: 0px;
        }
    }
  </style>
</head>

<body>
  <div class="container-scroller ">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-6 mx-auto responce">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo d-flex justify-content-center">
                <img src="<?php echo base_url('assets/images/slogo.png') ?>">
              </div>
              <h4 class="text-uppercase font-bold m-b-0 text-center mb-4" style="color: #700e12;font-family: 'Poppins',Helvetica,Arial,Lucida,sans-serif;">ADMIN LOGIN</h4>

              <!-- <p class="text-center mt-3">Enter your account details for administrator access.</p> -->
              <form class="pt-3" method="post" action="<?php echo base_url(); ?>" id="form">
                <div class="form-group">
                  <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg mb-4" placeholder="Please Enter Email" />
                  <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg my-3" placeholder="Please Enter Password" />
                  <div class="d-flex justify-content-end mt-4 mb-3">
                    <button name="submit" type="submit" class="btn btn-info btn-flat m-b-30 m-t-30 w-100">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
    jQuery('#form').validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6,
          maxlength: 6
        }
      },
      messages: {
        email: {
          required: "<p class='text-danger'>Please enter your email*</p>",
          email: "<p class='text-danger'>Please enter your valid email*</p>",
        },
        password: {
          required: "<p class='text-danger'>Please enter your password*</p>",
          minlength: "<p class='text-danger'>Please enter minimum 6 Digit your password</p>",
          maxlength: "<p class='text-danger'>Please enter maximum 6 Digit your password</p>"
        }
      }
    });
  </script>
</body>

</html>