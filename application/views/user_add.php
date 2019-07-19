<?php loadPartialView('inc/header') ?>

   <h1>Add New User</h1>

   <form action="<?= url('user/add_post') ?>" method="post">

      <div class="form-group">
         <label for="exampleInputEmail1">Name</label>
         <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1">Email</label>
         <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
      </div>
      <button type="submit" class="btn btn-primary">Add User</button>
   </form>
<?php loadPartialView('inc/footer') ?>