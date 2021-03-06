
    const comment_group = document.querySelector('.comment-list');
    const btnCmt = document.querySelector('.btnCmt');
    const inputUser = document.querySelector('.input-user');
    const inputRecipe = document.querySelector('.input-recipe');

    btnCmt.onclick = function(){
        const inputCmt = document.querySelector('.input-cmt');
        $.ajax({
            url : "./Models/ajax/ajax_action.php",
            type : "post",
            data : {
                action : "create",
                comment : inputCmt.value,
                maND : inputUser.value,
                MaBaiDang : inputRecipe.value
            },
            success : function (result){  
                comment_group.innerHTML =(result);
                listenEvent();
            }
        });
        inputCmt.value = "";
    };

    function removeEditClass(itemsCmt){
        itemsCmt.forEach((item)=>{
            item.classList.remove('edit');
        })
    }

    function listenEvent(){
        const itemsCmt = document.querySelectorAll('.comment-item__main');
        const options = document.querySelectorAll('.comment-item__more-options');
        options.forEach((option,index)=>{
            const id = option.dataset.idCmt;
            option.onclick = function(e){
                if(e.target.closest('.cmt-remove')){
                    ajax_delete(id);
                }
                else{ 
                    removeEditClass(itemsCmt);
                    const itemCmt =  option.closest('.comment-item').querySelector('.comment-item__main');   
                    itemCmt.classList.add('edit');
                    const inputEdit = itemCmt.querySelector('input');
                    inputEdit.focus();
                    const buttonEdit = itemCmt.querySelector('button');
                    buttonEdit.onclick = function(){
                        ajax_update(id,inputEdit);
                    }
                    
                } 
            }
        })
    }
    listenEvent();
    function ajax_delete(id){
        $.ajax({
            url : "./Models/ajax/ajax_action.php",
            type : "post",
            data : {
                action : "delete",
                commentID : id,
                MaBaiDang : inputRecipe.value
            },
            success : function (result){
                comment_group.innerHTML =(result);
                listenEvent();
            }
        });
    }
    function ajax_update(id,input){
        const value= input.value;
        $.ajax({
            url : "./Models/ajax/ajax_action.php",
            type : "post",
            data : {
                action : "update",
                commentID : id,
                comment : value,
                maND : inputUser.value,
                MaBaiDang : inputRecipe.value
            },
            success : function (result){
                comment_group.innerHTML =(result);
                listenEvent();
            }
        });
    }

