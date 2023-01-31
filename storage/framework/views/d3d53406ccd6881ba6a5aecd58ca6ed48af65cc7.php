<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>500 - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/pages/error.css" />
    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="assets/images/logo/favicon.png"
      type="image/png"
    />
  </head>

  <body>
    <div id="error">
      <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
          <div class="text-center">
            <img
              class="img-error"
              src="assets/images/samples/error-500.svg"
              alt="Not Found"
            />
            <h1 class="error-title">System Error</h1>
            <p class="fs-5 text-gray-600">
              The website is currently unaivailable. Try again later or contact
              the developer.
            </p>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-lg btn-outline-primary mt-3"
              >Go Home</a
            >
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\TriCoba\resources\views\errors\500.blade.php ENDPATH**/ ?>