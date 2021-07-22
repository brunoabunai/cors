var globalStateBox = [false, false];
var userSearched = {
    name: "Nenhum!",
    password: "",
    founded: false
};

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

function localizeID(item) {
    return document.getElementById(item);
}

function changeStateBox(op) {
    globalStateBox[op] = !globalStateBox[op];
}

function conditionBox() {
    return (!globalStateBox[0] && !globalStateBox[1]);
}

function addInPage(content) {
    document.querySelector('body').innerHTML += content;
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
                    <a class="btn-leave opacity-button" href="./../landing/index.html"> sair </a>
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
                    <input id="search" type='text'/>
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

function SearchInit(op) {
    const admins = [
        {
            name: "Carlos",
            password: 123
        },
        {
            name: "Bruno",
            password: 445
        }
    ]

    makeSearch(admins);

    if (userSearched.founded) {
        whenMakedSearch(document.querySelector('#boxInput'), op);
    } else {
        whenNotMakedSearch(document.querySelector('#boxInput'), op);
    }
}

function whenMakedSearch(input, op) {
    input.remove();
    changeStateBox(op);
    updateUserSpan(userSearched);
    updateInput(userSearched);
}

function updateUserSpan() {
    const span = document.querySelector('#WicthUser');
    span.innerHTML = `${userSearched.name}...`;
}

function whenNotMakedSearch(input, op) {
    alert("Administrador não encontrado");
}

function makeSearch(admins) {
    const search = localizeID('search').value;

    for (let i = 0; i < admins.length; i++) {
        if (admins[i].name == search) {
            changeUserState(admins[i].name, admins[i].password, true);
            break;
        }
    }
}

function changeUserState(name, password, founded) {
    userSearched.name = name;
    userSearched.password = password;
    userSearched.founded = founded;
}

function updateInput() {
    const [name, password, inputUser, inputPassword] = getValuesToUpdate(userSearched);
    changeValue(inputUser, name);
    changeValue(inputPassword, password);
    changeBackground(inputUser, "#fff");
    changeBackground(inputPassword, "#fff");
    removeReadOnly(inputUser);
    removeReadOnly(inputPassword);
}

function getValuesToUpdate(user) {
    const { name, password, founded } = user;
    const [inputUser, inputPassword] = [localizeID('user'), localizeID('password')];
    return [name, password, inputUser, inputPassword];
}

function changeBG(element, background) {
    element.style.backgroundColor = background;
}

function changeValue(element, value) {
    element.value = value;
}

function changeColor(element, color) {
    element.style.Color = color;
}

function removeReadOnly(element) {
    element.removeAttribute('readonly')
}