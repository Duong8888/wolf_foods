
<main>
    <div class="content-box">
        <form action="">
            <div class="profile">
                <div class="profile-left">
                    <div class="animation-box"></div>
                    <div class="box-profile">
                        <label class="profile-avatar">
                            <img src="./src/img/img-11.png" alt="">
                        </label>
                        <input type="file" id="img" hidden>
                        <p class="profile-name">Nguyễn Ánh Dương</p>
                        <span class="position">Quản lý</span>
                    </div>
                </div>
                <div class="profile-right">
                    <div class="box-form">

                        <div class="row">
                            <label class="lable-profile" for="profiel-username">UserName : </label>
                            <input autocomplete="off" id="profiel-username" type="text" name="username" value="" class=" input-profile">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-email">Email : </label>
                            <input autocomplete="off" id="profile-email" type="text" name="email" value="" class=" input-profile">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-password">Password : </label>
                            <input type="password" id="profile-password" name="password" value="" class=" input-profile">
                            <span class="material-symbols-outlined eye">
                                visibility
                            </span>
                        </div>
                        <div class="row repass">
                            <label class="lable-profile" for="profile-repassword">Re-Password : </label>
                            <input type="password" id="profile-repassword" name="re-password" value="" class=" input-profile">
                            <span class="material-symbols-outlined eye">
                                visibility
                            </span>
                        </div>
                        <button type="button" name="" class="profile-edit">Edit</button>
                        <button type="button">Save as</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</main>