const ejectBtn = document.querySelector('.detail-recipe-btn__eject');
const tostGroup = document.querySelector('.toast-question-eject');
const tostExit = document.querySelector('.detail-recipe-btn__eject-exit');
if(ejectBtn){
    ejectBtn.onclick = function(){
        console.log(tostGroup);
        tostGroup.classList.add("active");
    }
}
if(tostExit){
    tostExit.onclick = function(e){
        e.preventDefault();
        tostGroup.classList.remove("active");
    }
}
