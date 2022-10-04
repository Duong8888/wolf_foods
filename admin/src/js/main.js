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
if(btnEdit){
    btnEdit.addEventListener('click',function(){
        for (const item of unlogInput) {
            item.classList.add('unlog');
        }
        boxProfile.classList.add('overlay-img');
        unlogRepass.style.display = "block";
        unlogAvatar.setAttribute('for','img');
    });
}

