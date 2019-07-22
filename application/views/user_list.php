<?php loadPartialView('inc/header') ?>

   <h1>User Listings</h1>
   <table class="table table-bordered table-responsive-md">
      <thead>
      <tr>
         <th >ID</th>
         <th>Name</th>
         <th>Age</th>
         <th>Country</th>
         <th>Education</th>
         <th>Email</th>
         <th>Action</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach ($users as $user): ?>
         <tr>
            <th><?= $user->id ?></th>
            <td><?= $user->name ?></td>
            <td><?= $user->age.' Years' ?></td>
            <td><?= $user->country ?></td>
            <td><?= $user->education ?></td>
            <td><?= $user->email ?></td>
            <td>
               <a href="<?= base_url('user/delete/' . $user->id) ?>" class="btn btn-danger">Delete</a>
               <a href="<?= base_url('user/update/' . $user->id) ?>" class="btn btn-primary">Update</a>
            </td>
         </tr>
      <?php endforeach; ?>
      </tbody>
   </table>
<?php loadPartialView('inc/footer') ?>