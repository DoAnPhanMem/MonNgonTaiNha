const themeGroup = document.querySelector(".create-recipe__theme-content");
const videoGroup = document.querySelector(".create-recipe__video");
const btnSubmit = document.querySelector(".create-recipe__btn-submit");
const postTheme = document.getElementsByName("post-themes")[0];


function removeVietnameseTones(str) {
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
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
  str = str.replace(/ + /g, " ");
  str = str.trim();
  // Remove punctuations
  // Bỏ dấu câu, kí tự đặc biệt
  str = str.replace(
    /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
    " "
  );
  return str;
}
function HandleThemes() {
  
  const inputSearch = themeGroup.querySelector(".create-recipe__theme-input");
  const searchResult = themeGroup.querySelector( ".create-recipe__theme-results");
  const themeSelected = themeGroup.querySelector(".create-recipe__themes-selected");
  let themes_array = [];

  //handle input change
  inputSearch.oninput = function (e) {
    searchResult.classList.add("active");
    renderSearchTheme(e.target.value);
  };
  inputSearch.onblur = function (e) {
    if (searchResult.classList.contains("active")) {
      searchResult.classList.remove("active");
    }
  };
  //render result search
  function renderSearchTheme(value) {
    if (themes) {
     
      themes_array = (themes);
      //console.log(themes_array);
      let html = 
      themes_array.map((theme, index) => {
          if (
               theme.TenChuDe.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase()
              .indexOf( value.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase()) 
              != -1
          ) {
            return `<div data-theme-id =${theme.MaChuDe} data-theme-index = ${index} class="create-recipe__search-theme-item"> ${theme.TenChuDe} </div>`;
          }
        })
        .join("");
        if(html == ''){
          html = '<p onclick = "(e)=>{e.preventDefault()}"  class ="create-recipe__search-theme-item create-recipe__search-theme-add"> Chủ đề hợp lệ</p>'
        }
        searchResult.innerHTML = html ;
        const search_items = searchResult.querySelectorAll(
          ".create-recipe__search-theme-item"
        );

    } else {
      alert("khong nhan duoc mảng themes");
    }
  }
}


function HandleVideo() {
 
  const inputVideo = videoGroup.querySelector("#create-recipe__video-input");
  const video_element = videoGroup.querySelector(".create-recipe__video-tag");
  const place_play = videoGroup.querySelector(".create-recipe__video-group");
  inputVideo.onchange = function () {
    place_play.classList.add("create-recipe__video--play");
    const file = inputVideo.files[0];
    const fileUrl = URL.createObjectURL(file);

    console.log(file);
    video_element.src = fileUrl;
  };
}




btnSubmit.onclick = function(e){
  if(themes_selected.length == 0){
    alert("Vui lòng chọn ít nhất một chủ đề");
    e.preventDefault();
  }

    postTheme.value = JSON.stringify(themes_selected);
    postStock.value = JSON.stringify(stock_array);
    postStep.value = JSON.stringify(step_array);
}
 


HandleThemes();
HandleVideo();


