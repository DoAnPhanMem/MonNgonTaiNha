const themeGroup = document.querySelector('.create-recipe__theme-content');
const imgGroup = document.querySelector('.create-recipe__images');
function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str = str.replace(/đ/g,"d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g," ");
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    return str;
}
function HandleThemes(){
    const inputSearch = themeGroup.querySelector('.create-recipe__theme-input');
	const searchResult = themeGroup.querySelector('.create-recipe__theme-results');
    const themeSelected = themeGroup.querySelector('.create-recipe__themes-selected');
    let themes_array = [];
    const themes_selected = [];
    //handle input change
    inputSearch.oninput = function (e){
        searchResult.classList.add('active');
        renderSearchTheme(e.target.value);

    }
    inputSearch.onblur = function(e){
        if(searchResult.classList.contains('active')){
            searchResult.classList.remove('active');
        }
    }

    // handle item search result click 
    function handleClickItemTheme(search_items){
        
        for(var i = 0 ; i< search_items.length; i++){
           
            search_items[i].onmousedown = function (event){
                event.preventDefault();
                 const index = event.target.dataset.themeIndex;
                 if(!themes_selected.find((currentValue)=>{return currentValue == themes_array[index] })){
                    themes_selected.push(themes_array[index]);
                    renderThemeSelected();
                    clearThemeSearch();
                 }
                 else {
                     alert("Đã thêm chủ đề này trước đó !");
                 }
            }
        }
   }
    //handle clear search theme 
    function clearThemeSearch (){
        inputSearch.value = '';
        searchResult.classList.remove('active');
    }

    // handle delete theme selected
    function handleDeleteTheme(){
        const btns = themeSelected.querySelectorAll('.create-recipe__btn-del-selected-theme');
        for(let i=0; i< btns.length; i++){
            btns[i].onclick = function(){
              themes_selected.splice(i, 1);
              renderThemeSelected();
              console.log(themes_selected);   
            }
        }
    }

    // render themes selected
    function renderThemeSelected(){
        const html = themes_selected.map((theme, index)=>{
            return `<div class="create-recipe__theme-item">
            <p>${theme}</p>
            <i class="create-recipe__btn-del-selected-theme fa-solid fa-xmark">
            </i>
        </div>`
        }).join('');
        themeSelected.innerHTML = html;
        handleDeleteTheme();
    }
    
    //render result search
    function renderSearchTheme(value){
        if(themes){
            themes_array = Object.values(themes);
            //console.log(themes_array);
            const html =  themes_array.map((theme,index)=>{
               if(theme.normalize("NFD").replace(/[\u0300-\u036f]/g, "").indexOf(value.normalize("NFD").replace(/[\u0300-\u036f]/g, "")) != -1){
                    return `<div data-theme-index = ${index} class="create-recipe__search-theme-item"> ${theme} </div>`
               }  
            }).join('')
           // console.log(html)
            searchResult.innerHTML = html;
            const search_items = searchResult.querySelectorAll('.create-recipe__search-theme-item');

            handleClickItemTheme(search_items);
        }
        else{
            alert("khong nhan duoc mảng themes")
        }
    }  
};

function HandleImages(){
    const inputFile = imgGroup.querySelector('#create-recipe__image-input');
    const preview  = imgGroup.querySelector('.create-recipe__images-preview');
    const fileTypes = [
        "image/apng",
        "image/bmp",
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
        "image/png",
        "image/svg+xml",
        "image/tiff",
        "image/webp",
        "image/x-icon"
      ];
      
    function validFileType(file) {
        return fileTypes.includes(file.type);
    }
    inputFile.onchange = function(){
        while(preview.firstChild){
            preview.removeChild(preview.firstChild);
        }
        const curFiles = Array.from(inputFile.files);
        console.log(curFiles)
        if(curFiles.length === 0  ){
            
            const para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        }
        else{
            if(curFiles.length > 4){
                alert("Only select 4 images");
                curFiles.pop();
            }
            for(const file of curFiles){
                if(validFileType(file)){
                    preview.classList.add('active');
                    const image = document.createElement('img');
                    image.src = URL.createObjectURL(file);
                    preview.appendChild(image);
                }
                else{
                    const para = document.createElement('p');
                    para.textContent = 'No files is not validateFile';
                    preview.appendChild(para);
                }
            }
        }
       
    }
    

};
HandleImages();
HandleThemes();



