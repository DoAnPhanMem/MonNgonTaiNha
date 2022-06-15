const themeGroup = document.querySelector(".create-recipe__theme-content");
const imgGroup = document.querySelector(".create-recipe__images");
const videoGroup = document.querySelector(".create-recipe__video");
const stockGroup = document.querySelector(".create-recipe__stocks");
const stepGroup = document.querySelector(".create-recipe__steps");
const btnSubmit = document.querySelector(".create-recipe__btn-submit");
const postTheme = document.getElementsByName("post-themes")[0];
const postStock = document.getElementsByName("post-stocks")[0];
const postStep = document.getElementsByName("post-steps")[0];
const themes_selected = [];
let imgs_array = [];
const stock_array = [
  {
    name: "",
    quantity: "",
    unit: "",
  },
];
const step_array = [
  {
    content: "",
    time: "",
    unit: "",
  }
];

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
  const searchResult = themeGroup.querySelector(
    ".create-recipe__theme-results"
  );
  const themeSelected = themeGroup.querySelector(
    ".create-recipe__themes-selected"
  );
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

  // handle item search result click
  function handleClickItemTheme(search_items) {
    for (var i = 0; i < search_items.length; i++) {
      search_items[i].onmousedown = function (event) {
        event.preventDefault();
        const index = event.target.dataset.themeIndex;
        if (
          !themes_selected.find((currentValue) => {
            return currentValue[0] == themes_array[index][0];
          })
        ) {
          themes_selected.push(themes_array[index]);
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
      console.log(themes)
      themes_array = Object.entries(themes);
      
      
      console.log(themes_array)
      //console.log(themes_array);
      const html = themes_array
        .map((theme, index) => {
         
          console.log(theme)
          if (
            theme[1]
              .normalize("NFD")
              .replace(/[\u0300-\u036f]/g, "")
              .indexOf(
                value.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
              ) != -1
          ) {
            return `<div data-theme-id =${theme[0]} data-theme-index = ${index} class="create-recipe__search-theme-item"> ${theme[1]} </div>`;
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
  
  const inputFile = imgGroup.querySelector("#create-recipe__image-input");
  const preview = imgGroup.querySelector(".create-recipe__images-preview");
  const labelView = imgGroup.querySelector(".create-recipe__image-label");
  //console.log(labelView);
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
    "image/x-icon",
  ];

  function validFileType(file) {
    return fileTypes.includes(file.type);
  }

  inputFile.onchange = function () {
    const itemsView = imgGroup.querySelectorAll(".create-recipe__image-item");

    if (imgGroup.querySelector(".create-recipe__images-preview p")) {
      preview.removeChild(
        imgGroup.querySelector(".create-recipe__images-preview p")
      ); // delete i
    }
    for (let j = 0; j < itemsView.length; j++) {
      console.log(itemsView[j]);
      preview.removeChild(itemsView[j]);
    }
    while (labelView.firstElementChild) {
      labelView.removeChild(labelView.firstElementChild);
    }
    const curFiles = Array.from(inputFile.files);
    if (imgs_array.length == 4) {
      imgs_array = [...curFiles];
    } else {
      imgs_array = imgs_array.concat(curFiles);
    }
    const imgsLength = imgs_array.length;

    if (imgsLength === 0) {
      const para = document.createElement("p");
      para.textContent = "No files currently selected for upload";
      preview.appendChild(para);
    } else {
      if (imgsLength > 4) {
        alert("Only select 4 images");
        imgs_array.splice(4, imgsLength - 1);
        preview.classList.remove("more");
      } else if (imgsLength < 4) {
        preview.classList.add("more");
      } else {
        preview.classList.remove("more");
      }


      let list = new DataTransfer(); // chuỷen dổi để set a new input file
      imgs_array.forEach((file, i) => {
        if (validFileType(file)) {
          preview.classList.add("active");
          const image = document.createElement("img");
          image.setAttribute("data-img-index", i);
          image.classList.add("create-recipe__image-item");
          image.onclick = function (e) {
            const imgsBig = labelView.querySelectorAll("img");
            for (let j = 0; j < imgsBig.length; j++) {
              imgsBig[j].classList.contains("active") &&
                imgsBig[j].classList.remove("active");
              console.log("i : " + e.target.dataset.imgIndex, "j : " + j);
              if (e.target.dataset.imgIndex == j) {
                imgsBig[j].classList.add("active");
              }
            }
          };
          image.src = URL.createObjectURL(file);
          preview.appendChild(image);
          labelView.innerHTML += `<img src="${image.src} "/>`;

          //add inputfile to list
          list.items.add(file);
 
        } else {
          const para = document.createElement("i");
          para.textContent = "No files is not validateFile";
          preview.appendChild(para);
        }
      });

      // set input file
      let listImgsFile = list.files;
      inputFile.files  = listImgsFile;
      //
      const viewBig = labelView.querySelectorAll("img")[0];
      viewBig.classList.add("active");
    }
   
    //console.log(imgs_array);
  };
  
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
  renderStock();
  function renderStock(init = 0) {
    console.log("init" + init);
    for (let stock = init; stock < stock_array.length; stock++) {
      const stockNode = document.createElement("div");
      stockNode.innerHTML = `<input  type="text" name=""   value = "${stock_array[stock].name}" placeholder="Tên nguyên liệu "  class="create-recipe__stock-name">  
        <input  type="number" name="" value = "${stock_array[stock].quantity}" placeholder="Số lượng "  class="create-recipe__stock-quantity">  
        <input  type="text" name="" value = "${stock_array[stock].unit}" placeholder="Đơn vị "  class="create-recipe__stock-unit">  
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
    const btnsDleStock = stockGroup.querySelectorAll(
      ".create-recipe__stock-btn-delete"
    );
    for (let i = 0; i < btnsDleStock.length; i++) {
      btnsDleStock[i].onclick = function () {
        stock_array.splice(i, 1);
        stockList.removeChild(btnsDleStock[i].parentNode);
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
    renderStock(stock_array.length - 1);
  };
}
function HandleStep() {
   
  
    const stepList = stepGroup.querySelector(".create-recipe__step-list");
    const btnAddStep = stepGroup.querySelector(".create-recipe__step-btn-add");
    renderStep();
    function renderStep(init = 0) {
      console.log("init" + init);
      for (let step = init; step < step_array.length; step++) {
        const stepNode = document.createElement("div");
        stepNode.innerHTML = `
          <input  type="text" name=""   value ="${step_array[step].content}" placeholder="Nội dung "  class="create-recipe__step-content">  
          <input  type="number" name="" value = "${step_array[step].time}" placeholder="Thời gian "  class="create-recipe__step-time">  
          <input  type="text" name="" value = "${step_array[step].unit}" placeholder="Đơn vị thời gian"  class="create-recipe__step-unit">  
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
              console.log("name", i);
              step_array[i].content = e.target.value;
              break;
            }
            case steps[i].querySelector(".create-recipe__step-time"): {
              console.log("quantity");
              step_array[i].time = e.target.value;
              break;
            }
            case steps[i].querySelector(".create-recipe__step-unit"): {
              console.log("quantity");
              step_array[i].unit = e.target.value;
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
        time: "",
        unit: "",
      });
      renderStep(step_array.length - 1);
    };
  }


btnSubmit.onclick = function(){
    postTheme.value = JSON.stringify(themes_selected);
    postStock.value = JSON.stringify(stock_array);
    postStep.value = JSON.stringify(step_array);
    alert("có");
}
 

HandleImages();
HandleThemes();
HandleVideo();
HandleStock();
HandleStep();
