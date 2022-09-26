// sử lý chọn tất cả danh sách
var btn = document.querySelector('.check-all');
var inputCheck = document.querySelectorAll('.checknow');
if(btn){
    var countClick = 0;
    btn.addEventListener('click', function(){
        console.log(btn.innerText);
        for (let item of inputCheck) {
            if(countClick%2==0){
                item.checked = true;
                btn.innerText = "Bỏ chọn tất cả";
            }else{
                item.checked = false;
                btn.innerText = "Chọn tất cả";
            }
        }
        countClick++;
    });
}

// sử lý hiển thị ảnh khi tải file 

var imgDisplay = document.querySelector('.form-right>label>img');
var fileImg = document.querySelector('#img');
if(fileImg){
    fileImg.addEventListener('change',function(){
        console.log(URL.createObjectURL(fileImg.files[0]));
        imgDisplay.src = URL.createObjectURL(fileImg.files[0]);
        imgDisplay.style.zIndex = '11';
    });
}

var menu = document.querySelectorAll('.sidebar__menu--item');
function active(){
    var nameUrl = new URLSearchParams(window.location.search).get('action');
    // menu.forEach(element => {
    //     element.classList.remove("active");
    // });
    menu.forEach(element => {
        console.log(element.id);
        if(nameUrl == element.id){
            element.classList.add("active");
        }
        
    });
    // item.classList.add("active");
}
active();