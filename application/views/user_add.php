<?php loadPartialView('inc/header') ?>

   <h1>Add New User</h1>

   <form action="<?= base_url('user/add_post') ?>" method="post">

      <div class="form-group">
         <label for="name">Name</label>
         <input type="text" name="username" class="form-control" id="name" placeholder="Enter name">
      </div>
      <div class="form-group">
         <label for="name">Age</label>
         <input type="number" name="age" class="form-control" id="age" placeholder="Enter age">
      </div>
      <div class="form-group">
         <label for="name">Country</label>
         <input type="text" name="country" class="form-control" id="country" placeholder="Enter country">
      </div>
      <div class="form-group">
         <label for="name">Education</label>
         <input type="text" name="education" class="form-control" id="education" placeholder="Enter education">
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <button type="submit" class="btn btn-primary">Add User</button>
   </form>
<?php loadPartialView('inc/footer') ?>