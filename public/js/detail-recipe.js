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

// img 

const imgs = document.querySelectorAll('.recipe-detail__img-item');
const views = document.querySelectorAll('.recipe-detail__img-view img');
//console.log(views);
// destruct active view 
function destructActive(){
    views.forEach((img)=>{
        img.classList.remove('active');
    })
}

imgs.forEach((img,index)=>{
    img.onclick = function(){
        destructActive();
        views[index].classList.add('active');
    }
})
