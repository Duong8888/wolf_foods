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
var btnCommet2 = document.querySelector('.sub-btn2');
if (boxComment) {
    function check() {
        modal.style.display = 'block';
    }
    function closeModal() {
        modal.style.display = 'none';
    }
    btnClose.addEventListener('click', closeModal);
    btnClose2.addEventListener('click', closeModal);
    if (btnCommet) {
        btnCommet.addEventListener('click', check);
        btnCommet2.addEventListener('click', check);
    }
}

// tăng giảm số lượng sản phẩm và tăng tiền sản phẩm theo số lượng
let quantity = document.querySelector('#quantity');
let quantityInp = document.querySelector('.input__quantity');
// giá hiển thị
var priceProductDisplay = document.querySelector('.price-product_detail');
var discountProductDisplay = document.querySelector('.discount-product_detail');
var discountProduct2Display = document.querySelector('.discount2-product_detail');
// giá tiền bằng số lượng nhân tiền 1 sản phẩm
var mainPrice = document.querySelector('#main-price');
var mainDiscount = document.querySelector('#main-discount');
if (quantity) {
    function result() {
        let quantityValue = quantity.value;
        var discount = Math.round((mainPrice.value * quantityValue) / 100) * mainDiscount.value;
        priceProductDisplay.innerHTML = (mainPrice.value * quantityValue) - discount;
        discountProductDisplay.innerHTML = (mainPrice.value * quantityValue);
        discountProduct2Display.innerHTML = discount;
    }
}

// unlog profile user 
var btnProfile = document.querySelector('.btn.btn-info.new');
if (btnProfile) {
    var input = document.querySelectorAll('.input');
    var count = 0;
    btnProfile.addEventListener('click', function () {

        input[0].removeAttribute('readonly');
        input[0].style.backgroundColor = 'blue';
        input[0].style.color = '#fff';
        input[2].removeAttribute('readonly');
        input[2].style.backgroundColor = 'blue';
        input[2].style.color = '#fff';
    });
}
