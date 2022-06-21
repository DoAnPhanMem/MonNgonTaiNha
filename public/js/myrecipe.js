const btn_delete = document.querySelector('.recipe-item__delete');
if(btn_delete){
  btn_delete.onclick = function(event){
    if (confirm('Bạn có chắc muốn xóa?')) {
        
        
      } else {
        event.preventDefault();
        
      }
}
}

