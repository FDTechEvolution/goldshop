<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="text-center card-box">
            <div class="member-card">
                <div class="thumb-xl member-thumb m-b-10 center-block">
                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle img-thumbnail" alt="profile-image">
                </div>

                <div class="">
                    <h5 class="m-b-5"><?= h($user->firstname . ' ' . $user->lastname) ?></h5>
                    <p class="text-muted"><?= $user->has('role') ? $user->role->name : '' ?></p>
                </div>

                <div class="text-left m-t-40">

                    <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">(123) 123 1234</span></p>

                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">coderthemes@gmail.com</span></p>

                    <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">USA</span></p>
                </div>
            </div>

        </div> <!-- end card-box -->



    </div>

    <div class="col-lg-8 col-xl-9">
        <div class="">
            <div class="card-box">
                <ul class="nav nav-tabs tabs-bordered">
                    <li class="nav-item">
                        <a href="#info" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            แก้ไขข้อมูลส่วนตัว
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#changepassword" data-toggle="tab" aria-expanded="false" class="nav-link">
                            เปลี่ยนรหัสผ่าน
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="info" aria-expanded="true">
                        <?= $this->Form->create($user, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
                        <div class="form-group">
                            <label for="firstname">ชื่อจริง</label>
                            <?= $this->Form->control('firstname', ['class' => 'form-control', 'id' => 'firstname', 'label' => false]) ?>
                        </div>
                        <div class="form-group">
                            <label for="lastname">นามสกุล</label>
                            <?= $this->Form->control('lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]) ?>
                        </div>
                        <div class="form-group">
                            <label for="email">อีเมล</label>
                            <?= $this->Form->control('email', ['class' => 'form-control', 'id' => 'email', 'label' => false]) ?>
                        </div>
                        <div class="form-group">
                            <label for="mobileno">เบอร์โทร</label>
                            <?= $this->Form->control('mobileno', ['class' => 'form-control', 'id' => 'mobileno', 'label' => false]) ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <?= $this->Form->control('username', ['class' => 'form-control', 'id' => 'username', 'label' => false]) ?>
                        </div>


                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">บันทึก</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="changepassword" aria-expanded="false">

                        <form role="form">
                            <div class="form-group">
                                <label for="Password">ระบุรหัสผ่านเก่า</label>
                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Password">ระบุรหัสผ่านใหม่</label>
                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="RePassword">ระบุรหัสผ่านใหม่อีกรอบ</label>
                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                            </div>

                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
