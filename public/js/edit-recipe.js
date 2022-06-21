const themeGroup = document.querySelector(".create-recipe__theme-content");
const imgGroup = document.querySelector(".edit-recipe__imgs");
const videoGroup = document.querySelector(".create-recipe__video");
const stockGroup = document.querySelector(".create-recipe__stocks");
const stepGroup = document.querySelector(".create-recipe__steps");
const btnSubmit = document.querySelector(".create-recipe__btn-submit");

const postTheme = document.getElementsByClassName("post-themes-edit")[0];
const postStock = document.getElementsByClassName("post-stocks-edit")[0];
const postStep = document.getElementsByClassName("post-steps-edit")[0];

const themes_selected = [];
let imgs_array = [];
const stock_array = [
  
];
const step_array = [
  
];

if(isEdit){
  //set theme_selected
  for(let i = 0; i<recipe_themes.length;i++ ){
    themes_selected.push(Object.values(recipe_themes[i]))
  }


  
}


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
  renderThemeSelected();

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

  // handle item search result click
  function handleClickItemTheme(search_items) {
    for (var i = 0; i < search_items.length; i++) {
      search_items[i].onmousedown = function (event) {
        event.preventDefault();
        const index = event.target.dataset.themeIndex;
        if (
          !themes_selected.find((currentValue) => {
            return currentValue[0] == themes_array[index].MaChuDe;
          })
        ) {
          const arr = Object.values(themes_array[index]);
          console.log(arr);
          themes_selected.push(arr);
          console.log(themes_selected);
          renderThemeSelected();
          clearThemeSearch();
        } else {
          alert("Đã thêm chủ đề này trước đó !");
        }
      };
    }
  }
  //handle clear search theme
  function clearThemeSearch() {
    inputSearch.value = "";
    searchResult.classList.remove("active");
  }

  // handle delete theme selected
  function handleDeleteTheme() {
    const btns = themeSelected.querySelectorAll(
      ".create-recipe__btn-del-selected-theme"
    );
    for (let i = 0; i < btns.length; i++) {
      btns[i].onclick = function () {
        themes_selected.splice(i, 1);
        renderThemeSelected();
        console.log(themes_selected);
      };
    }
  }

  // render themes selected
  function renderThemeSelected() {
    const html = themes_selected
      .map((theme, index) => {
        return `<div class="create-recipe__theme-item">
            <p>${theme[1]}</p>
            <i class="create-recipe__btn-del-selected-theme fa-solid fa-xmark">
            </i>
        </div>`;
      })
      .join("");
    themeSelected.innerHTML = html;
    handleDeleteTheme();
  }

  //render result search
  function renderSearchTheme(value) {
    if (themes) {
     
      themes_array = (themes);
      
      
     
      //console.log(themes_array);
      const html = 
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
      // console.log(html)
      searchResult.innerHTML = html;
      const search_items = searchResult.querySelectorAll(
        ".create-recipe__search-theme-item"
      );

      handleClickItemTheme(search_items);
    } else {
      alert("khong nhan duoc mảng themes");
    }
  }
}

function HandleImages() {
  const inputFile = imgGroup.querySelectorAll(".create-recipe__image-input");
  const preview = imgGroup.querySelector(".create-recipe__images-preview");
  const labelView = imgGroup.querySelector(".create-recipe__image-label");
  //console.log(labelView);

  inputFile.forEach((input, i)=>{
    input.onchange = function () {
            const ViewLabel = input.parentNode.querySelector("label");
            while(ViewLabel.firstChild){
                ViewLabel.removeChild(ViewLabel.firstChild);
            }
            const img = document.createElement('img');
            img.className = "active"
            img.src = URL.createObjectURL(input.files[0]);
            ViewLabel.appendChild(img);
            input.parentNode.classList.add("active");
            ViewLabel.classList.add("active");
            console.log(img);
        }
      });
    
    }
  

function HandleVideo() {
  const labelView = imgGroup.querySelector(".create-recipe__image-label");
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

function HandleStock() {
  const stockList = stockGroup.querySelector(".create-recipe__stock-list");
  const btnAddStock = stockGroup.querySelector(".create-recipe__stock-btn-add");
  const defaultLength = setArrayStock();

  renderStock(defaultLength);
  function setArrayStock(){
    const stockNode = stockGroup.querySelectorAll(".create-recipe__stock");
    console.log(stockNode);
    for(let i=0 ;i< stockNode.length; i++){
        const name = stockNode[i].querySelector(".create-recipe__stock-name").value  
        const quantity= stockNode[i].querySelector(".create-recipe__stock-quantity").value
        const unit = stockNode[i].querySelector(".create-recipe__stock-unit").value
        stock_array.push({name,quantity,unit})
    }
    return stockNode.length;
  }

  function renderStock(init = 0) {
    for (let stock = init; stock < stock_array.length; stock++) {
      const stockNode = document.createElement("div");
      stockNode.innerHTML = `<input required type="text" name=""   value = "${stock_array[stock].name}" placeholder="Tên nguyên liệu "  class="create-recipe__stock-name">  
        <input required min=1  type="number" name="" value = "${stock_array[stock].quantity}" placeholder="Số lượng "  class="create-recipe__stock-quantity">  
        <input  required type="text" name="" value = "${stock_array[stock].unit}" placeholder="Đơn vị "  class="create-recipe__stock-unit">  
        <span  class="create-recipe__stock-btn-delete">
            <i class="fa-solid fa-circle-minus"></i>
        </span>`;
      stockNode.className = `create-recipe__stock data-index-stock = ${stock}`;
      stockList.appendChild(stockNode);
    }
    handleDleStock();
    handleChangeStockItem();
  }

  function handleDleStock() {
    const btnsDleStock = stockGroup.querySelectorAll(".create-recipe__stock-btn-delete");
    for (let i = 0; i < btnsDleStock.length; i++) {
      btnsDleStock[i].onclick = function () {
        stock_array.splice(i, 1);
        stockList.removeChild(btnsDleStock[i].parentNode);
        handleDleStock();
        handleChangeStockItem();
      };
    }
  }

  function handleChangeStockItem() {
    const stocks = stockGroup.querySelectorAll(".create-recipe__stock");
    for (let i = 0; i < stocks.length; i++) {
      stocks[i].oninput = function (e) {
        console.log(e.target);
        const node = e.target;
        switch (node) {
          case stocks[i].querySelector(".create-recipe__stock-name"): {
            console.log("name", i);
            stock_array[i].name = e.target.value;
            break;
          }
          case stocks[i].querySelector(".create-recipe__stock-quantity"): {
            console.log("quantity");
            stock_array[i].quantity = e.target.value;
            break;
          }
          case stocks[i].querySelector(".create-recipe__stock-unit"): {
            console.log("quantity");
            stock_array[i].unit = e.target.value;
            break;
          }
        }
        console.log(stock_array);
      };
    }
  }

  btnAddStock.onclick = function () {
    console.log("lll");
    stock_array.push({
      name: "",
      quantity: "",
      unit: "",
    });
    renderStock(stock_array.length-1);
  };
}
function HandleStep() {
   
  
    const stepList = stepGroup.querySelector(".create-recipe__step-list");
    const btnAddStep = stepGroup.querySelector(".create-recipe__step-btn-add");
    const defaultLength = setArrayStep();
    function setArrayStep(){
      const stepNode = stepGroup.querySelectorAll(".create-recipe__step");
      console.log(stepNode);
      for(let i=0 ;i< stepNode.length; i++){
          const content = stepNode[i].querySelector(".create-recipe__step-content").value  
          const hour= stepNode[i].querySelector(".create-recipe__step-hour").value
          const minute = stepNode[i].querySelector(".create-recipe__step-minute").value
          const second = stepNode[i].querySelector(".create-recipe__step-second").value
          step_array.push({content,hour,minute,second})
      }
      return stepNode.length;
    }
    renderStep(defaultLength);
    function renderStep(init = 0) {
      console.log("init" + init);
      for (let step = init; step < step_array.length; step++) {
        const stepNode = document.createElement("div");
        stepNode.innerHTML = `
          <input required type="text"  name=""   value ="${step_array[step].content}" placeholder="Nội dung "  class="create-recipe__step-content">  
          <input required type="number" min=1  name="" value = "${step_array[step].hour  }" placeholder="Giờ "  class="create-recipe__step-hour">  
          <input required type="number" min=1  name="" value = "${step_array[step].minute}" placeholder="Phút"  class="create-recipe__step-minute">  
          <input required type="number" min=1 name="" value = "${step_array[step].second}" placeholder="Giây"  class="create-recipe__step-second">  
          <span  class="create-recipe__step-btn-delete">
              <i class="fa-solid fa-circle-minus"></i>
          </span>`;
        stepNode.className = `create-recipe__step data-index-step = ${step}`;
        stepList.appendChild(stepNode);
      }
      handleDleStep();
      handleChangeStepItem();
    }
  
    function handleDleStep() {
      const btnsDleStep = stepGroup.querySelectorAll(
        ".create-recipe__step-btn-delete"
      );
      for (let i = 0; i < btnsDleStep.length; i++) {
        btnsDleStep[i].onclick = function () {
          step_array.splice(i, 1);
          stepList.removeChild(btnsDleStep[i].parentNode);
        };
      }
    }
  
    function handleChangeStepItem() {
      const steps = stepGroup.querySelectorAll(".create-recipe__step");
      for (let i = 0; i < steps.length; i++) {
        steps[i].oninput = function (e) {
          console.log(e.target);
          const node = e.target;
          switch (node) {
            case steps[i].querySelector(".create-recipe__step-content"): {
              step_array[i].content = e.target.value;
              break;
            }
            case steps[i].querySelector(".create-recipe__step-hour"): {
             
              step_array[i].hour = e.target.value;
              break;
            }
            case steps[i].querySelector(".create-recipe__step-minute"): {
              step_array[i].minute = e.target.value;
              break;
            }
            case steps[i].querySelector(".create-recipe__step-second"): {
              step_array[i].second = e.target.value;
              break;
            }
          }
          console.log(step_array);
        };
      }
    }
  
    btnAddStep.onclick = function () {
      console.log("lll");
      step_array.push({
        content: "",
        hour: "",
        minute: "",
        second : ""
      });
      renderStep(step_array.length - 1);
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
  

HandleImages();
HandleThemes();
HandleVideo();
HandleStock();
HandleStep();
