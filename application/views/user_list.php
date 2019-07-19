<?php loadPartialView('inc/header') ?>

   <h1>User Listings</h1>
   <table class="table table-bordered table-responsive-md">
      <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($users as $user): ?>
         <tr>
            <th><?= $user->id ?></th>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td>
               <a href="<?= url('user/delete/' . $user->id) ?>" class="btn btn-danger">Delete</a>
               <a href="<?= url('user/update/' . $user->id) ?>" class="btn btn-primary">Update</a>
            </td>
         </tr>
      <?php endforeach; ?>
      </tbody>
   </table>
<?php loadPartialView('inc/footer') ?>