
    console.log('hhahah');
    const fitters = 
        {
            nameRecipe : '',
            dateUpdate : '',
            timeCooking : '',
            statusRecipe : ''
        }
    

    function handleEvent(arrFitter){
        arrFitter.forEach((fitter,index)=>{
            switch (index) {
                case 0 : 
                    fitters.nameRecipe = fitter.value;
                    break;
                case 1 : 
                    fitters.dateUpdate = fitter.options[fitter.selectedIndex].dataset.timeSort;
                    break;
                case 2 : 
                    fitters.timeCooking =   fitter.options[fitter.selectedIndex].dataset.timeCooking 
                                            == "Tất cả"? "ThoiGian" : fitter.options[fitter.selectedIndex].dataset.timeCooking;
                    break;
                case 3 : 
                    fitters.statusRecipe =  fitter.value == "Tất cả"? "TrangThai" : fitter.value ;
                    break;
            }
        })
    }   
    (function getElement(){
        const myRecipe = document.querySelector('.my-recipe__content');
        const search =  myRecipe.querySelector('.my-recipe__search-input');
        const dateUpdate = myRecipe.querySelector('.my-recipe-fitter__time-update');
        const timeCooking = myRecipe.querySelector('.my-recipe-fitter__time-cooking');
        const statusRecipe = myRecipe.querySelector('.my-recipe-fitter__theme');
        const resultDropdown = myRecipe.querySelector('.my-recipes .row');
        console.log(resultDropdown);
        const arrFitter = [search, dateUpdate, timeCooking , statusRecipe ];
        arrFitter.forEach((fitter) => {
            fitter.oninput =  function(){
                handleEvent(arrFitter);
                ajaxAction(resultDropdown);
            }
        })
    })();

    function ajaxAction(resultDropdown){
        $.ajax({
            url : "./Models/ajax/ajax_action.php",
            type : "post",
            data : fitters,
            success : function (result){
                resultDropdown.innerHTML =(result);
            }
        });
    }
   /*  $('.search-box-action input[type="text"]').on("keyup input", function(){
        var inputVal= $(this).val();
        var resultDropdown= $(".search-results");
        if(inputVal.length){

            $.get("Views/backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
                
            });
        }else{
            resultDropdown.empty();
        }
    });
    $(document).on("click", ".search-results p", function(){
        $(this).parents(".search-box-action").find('input[type="text"]').val($(this).text());
        $(this).parent(".search-results").empty();
    });
 */
