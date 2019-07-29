<?php loadPartialView('inc/header') ?>

   <form class="form-signin" action="<?= base_url('login-post') ?>" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
         <label for="email">Password</label>
         <input type="password" name="password" class="form-control" id="email" placeholder="Enter password">
      </div>
      <button class="btn btn-primary btn-block" type="submit">Sign in</button>
   </form>

<?php loadPartialView('inc/footer') ?>