<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?= assets('css/main.css') ?>">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <title>First Smart MVC Application</title>
</head>

<body>
<nav style="margin-bottom: 50px" class="navbar navbar-expand-md navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand <?= \Core\Route::is('list') ? 'active' : '' ?>" href="<?= url('/') ?>">Smart MVC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
              aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= \Core\Route::is('user/list') ? 'active' : '' ?>">
               <a class="nav-link" href="<?= url('user/list') ?>">List</a>
            </li>
            <li class="nav-item <?= \Core\Route::is('user/add') ? 'active' : '' ?>">
               <a class="nav-link" href="<?= url('user/add') ?>">Add New</a>
            </li>
         </ul>
      </div>
   </div>
</nav>
<div class="container">



