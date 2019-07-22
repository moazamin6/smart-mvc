<?php loadPartialView('inc/header') ?>

<?php

?>
   <h1>Update User</h1>

   <form action="<?= base_url('user/update_post') ?>" method="post">

      <div class="form-group">
         <label for="name">Name</label>
         <input type="text" name="username" class="form-control" id="name" placeholder="Enter name"
                value="<?= $data->name ?>">
      </div>
      <div class="form-group">
         <label for="name">Age</label>
         <input type="number" name="age" class="form-control" id="age" placeholder="Enter age"
                value="<?= $data->age ?>">
      </div>
      <div class="form-group">
         <label for="name">Country</label>
         <input type="text" name="country" class="form-control" id="country" placeholder="Enter country"
                value="<?= $data->country ?>">
      </div>
      <div class="form-group">
         <label for="name">Education</label>
         <input type="text" name="education" class="form-control" id="education" placeholder="Enter education"
                value="<?= $data->education ?>">
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" name="email" class="form-control" id="email" placeholder="Enter email"
                value="<?= $data->email ?>">
      </div>
      <input type="hidden" name="user_id" value="<?= $data->id ?>">
      <button type="submit" class="btn btn-primary">Update User</button>
   </form>
<?php loadPartialView('inc/footer') ?>