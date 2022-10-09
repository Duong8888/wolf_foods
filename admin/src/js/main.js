// sử lý chọn tất cả danh sách
var btn = document.querySelector('.check-all');
var inputCheck = document.querySelectorAll('.checknow');
var slectSave = document.querySelector('.select-save');
var overlay = document.querySelector('.overlay-btn');
if (btn) {
    var countClick = 0;
    btn.addEventListener('click', function () {
        console.log(btn.innerText);
        for (let item of inputCheck) {
            if (countClick % 2 == 0) {
                item.checked = true;
                btn.innerText = "Bỏ chọn tất cả";

            } else {
                item.checked = false;
                btn.innerText = "Chọn tất cả";
            }
        }
        countClick++;
    });
}

// xử lý hiển thị ảnh khi tải file 

var imgDisplay = document.querySelector('.form-right>label>img');
var imgDisplay2 = document.querySelector('.box-profile>label>img');
var fileImg = document.querySelector('#img');
if (fileImg) {
    if (imgDisplay) {
        fileImg.addEventListener('change', function () {
            console.log(URL.createObjectURL(fileImg.files[0]));
            imgDisplay.src = URL.createObjectURL(fileImg.files[0]);
            imgDisplay.style.zIndex = '11';
        });
    }
    if (imgDisplay2) {
        fileImg.addEventListener('change', function () {
            console.log(URL.createObjectURL(fileImg.files[0]));
            imgDisplay2.src = URL.createObjectURL(fileImg.files[0]);
            imgDisplay2.style.zIndex = '11';
        });
    }

}


// xử lý active menu
var menu = document.querySelectorAll('.sidebar__menu--item');
function active() {
    var nameUrl = new URLSearchParams(window.location.search).get('action');
    menu.forEach(element => {
        console.log(element.id);
        if (nameUrl == element.id) {
            element.classList.add("active");
        }
    });
    // item.classList.add("active");
}
active();

// profile

// sử lý khi bấm nú edit thì mở khóa để nhập liệu
var btnEdit = document.querySelector('.profile-edit');
var unlogInput = document.querySelectorAll('.input-profile');
var unlogRepass = document.querySelector('.repass');
var boxProfile = document.querySelector('.box-profile');
var unlogAvatar = document.querySelector('.profile-avatar');
if (btnEdit) {
    btnEdit.addEventListener('click', function () {
        for (const item of unlogInput) {
            item.classList.add('unlog');
        }
        boxProfile.classList.add('overlay-img');
        unlogRepass.style.display = "flex";
        unlogAvatar.setAttribute('for', 'img');
        unlogAvatar.style.backgroundColor = "red";
    });
}

// show pass profile admin 
var inputPassword = document.querySelector('#profile-password');
var inputRePassword = document.querySelector('#profile-repassword');
var eyePassword = document.querySelector('.row .eye');
var eyerePassword = document.querySelector('.repass .eye');
var countClick1 = 0;
var countClick2 = 0;
if (inputPassword) {
    eyePassword.addEventListener('click', function () {
        if (countClick1 % 2 == 0) {
            inputPassword.type = 'text';
            eyePassword.innerText = "visibility_off";
        } else {
            inputPassword.type = 'password';
            eyePassword.innerText = "visibility";
        }
        countClick1++;

    });
    eyerePassword.addEventListener('click', function () {

        if (countClick2 % 2 == 0) {
            inputRePassword.type = 'text';
            eyerePassword.innerText = "visibility_off";
        } else {
            inputRePassword.type = 'password';
            eyerePassword.innerText = "visibility";
        }
        countClick2++;

    });
}

// hiện lên modal thông báo khi người dùng chưa đăng nhập vào hệ thống
var boxComment = document.querySelector('.box-detail-bottom-main');
var modal = document.querySelector('.modal');
var btnClose = document.querySelector('.btn-close');
var btnClose2 = document.querySelector('.btn.btn-secondary');
var btnCommet = document.querySelector('.sub-btn');
if (boxComment) {
    function check() {
        modal.style.display = 'block';
    }
    function closeModal() {
        modal.style.display = 'none';
    }
    btnClose.addEventListener('click', closeModal);
    btnClose2.addEventListener('click', closeModal);
    if(btnCommet){
        btnCommet.addEventListener('click', check);
    }
}

// tăng giảm số lượng sản phẩm

let quantity = document.querySelector('#quantity');
let quantityInp = document.querySelector('.input__quantity');
if (quantity) {
    let quantityValue = quantity.value;
    function reduce() {
        if (quantityValue === 0) {
            return;
        } else {
            quantityInp.innerHTML = `<input type="text" class="prodct__cart--quantity-inp" id="quantity" readonly value="${--quantityValue}" min="1">`
        }
    }

    function raise() {
        quantityInp.innerHTML = `<input type="text" class="prodct__cart--quantity-inp" id="quantity" readonly value="${++quantityValue}" min="1">`
    }
}
