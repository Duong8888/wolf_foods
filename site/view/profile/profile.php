<?php

?>
<main class="main_prf">
  <form action="index.php?action=profile" method="POST">
  <div class="container">
    <div class="main-body">

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <!-- card avatar -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="<?= isset($userLogIn['avatar']) ? "../../admin/src/img/" . $userLogIn['avatar'] : "https://bootdey.com/img/Content/avatar/avatar7.png" ?>" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4><?= $userLogIn['username'] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card profile main -->
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">UserName</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input class="input" readonly type="text" name="username" value="<?=$userLogIn['username']?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input class="input" readonly type="text" name="email" value="<?= $userLogIn['email'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input class="input" readonly type="password" name="password" value="<?= $userLogIn['password'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-info new ">Chỉnh sửa</button>
                  <button type="submit" class="btn btn-info ">Lưu</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- end card prf -->
      </div>

    </div>
  </div>
  </form>
</main>