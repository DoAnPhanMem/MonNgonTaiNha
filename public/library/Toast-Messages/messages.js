function toast ({title='', message='',type ='info', duration = 3000}) {
    const main = document.querySelector('#toast-group');
    if(main){
        const toast = document.createElement('div');
        const autoRemoveID = setTimeout(() => {
            main.removeChild(toast);
        }, duration + 1000);
        toast.onclick = function(e){
            if(e.target.closest('.toast__close')){
                main.removeChild(toast);
                clearTimeout(autoRemoveID);
            }
        }
         const icons = {
            success : 'fa-circle-check',
            info : 'fa-circle-info',
            warning : 'fa-triangle-exclamation',
            error : 'fa-bomb'
        }
        const icon = icons[type];
        const delay = (duration/1000).toFixed(2);
        toast.classList.add('toast-group__toast' , `toast--${type}`);
        toast.style.animation = `slideInLeft  1s ease-in-out, fadeOut linear ${delay}s forwards ;`;
      
        toast.innerHTML =`<div class="toast__icon">
                <i class="fa-solid ${icon}" ></i></div>
            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <p class="toast__message">${message}</p>
            </div>
            <div class="toast__close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            `;
        main.appendChild(toast);
            
    }
}
 
function showRegisterSusses(){
    toast(
        {
        title: 'Success',
        message: 'Đăng ký thành công, Mời bạn đăng nhập !',
        type : 'success',
        duration : 5000,
    
    });
};

function showSuccessInsert(){
    toast({
        title: 'Success',
        message: 'Bạn đã đăng bài thành công !',
        type : 'success',
        duration : 3000,
    
    });
};
function showSuccessApproval(){
    toast({
        title: 'Success',
        message: 'Duyệt bài thành công !',
        type : 'success',
        duration : 3000,
    
    });
};
function showSuccessEject(){
    toast({
        title: 'Success',
        message: 'Đã từ chối bài viết!',
        type : 'success',
        duration : 3000,
    
    });
};
function showSuccessUpdate(){
    toast({
        title: 'Success',
        message: 'Bạn đã cập nhật thành công !',
        type : 'success',
        duration : 3000,
    
    });
};
function showSuccessDelete(){
    toast({
        title: 'Success',
        message: 'Bạn đã xóa thành công !',
        type : 'success',
        duration : 3000,
    
    });
};
function showError(){
    toast({
        title: 'Error',
        message: 'Bạn đã xâm nhập thành công !',
        type : 'error',
        duration : 3000,
    
    });
};

 
function showLoginError(){
    toast(
        {
        title: 'Error',
        message: 'Đăng nhập không thành cônng !',
        type : 'error',
        duration : 3000,
    });
};