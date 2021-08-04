var globalStateBox = [false, false];

function CreateBoxInit(op) {
  return (conditionBox()) ? makeBox(op) : removeBox(op)
}

function makeBox(op) {
  const box = constructorBox(op);
  addInPage(box);
  changeStateBox(op);
}

function removeBox(op) {
  const box = [localizeID('box'), localizeID('boxInput')];
  box[op].remove();
  changeStateBox(op);
}

function changeStateBox(op) {
  globalStateBox[op] = !globalStateBox[op];
}

function conditionBox() {
  return (!globalStateBox[0] && !globalStateBox[1]);
}

function constructorBox(op) {
  let box = { name: "", content: "" };
  switch (op) {
    case 0:
      box.name = "box of config";
      box.content =
        `
                <div id='box'>
                    <a class="btn-account opacity-button" href="oi.html"> minha conta </a>
                    <a class="btn-leave opacity-button" onclick="logOff()" href="#"> sair </a>
                </div>
            `;
      break;
    case 1:
      box.name = "box of search";
      box.content =
        `
                <div id='boxInput'>
                    <div>
                        <svg class="opacty-button" onclick="removeBox(1)" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.59 7L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41L15.59 7Z" fill="#fff"></path>
                        </svg>
    
                    </div>
                    <h3>Digite o Nome:</h3>
                    <input id="searchInput2" type='text'/>
                    <button class="opacty-button" onclick="SearchInit(1)"> Buscar </button>
                </div>
            `;
      break;
    default:
      box.name = "null";
      box.content = "";
  }
  return box.content;
}
