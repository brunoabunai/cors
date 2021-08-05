const allInputs = document.querySelectorAll('input');
const allTextareas = document.querySelectorAll('textarea');
let tot= new Array(allInputs.length).fill(true);
let totA= new Array(allTextareas.length).fill(true);

allInputs.forEach( (input,indexOfInput) => {
    input.onkeyup = () => UserDigitedIn(input,indexOfInput,'input');
    input.onclick= () => {
        if(tot[indexOfInput]){
            addClass(input, "errInputValidation");
            tot[indexOfInput]= false;
        }
    };
})

allTextareas.forEach( (textarea,indexOfInput) => {
    textarea.onkeyup = () => UserDigitedIn(textarea,indexOfInput,'textarea');
    textarea.onclick= () => {
        if(totA[indexOfInput]){
            addClass(textarea, "errInputValidation");
            totA[indexOfInput]= false;
        }
    };
})

function UserDigitedIn(input,indexOfInput,w) {
    const exception = (input.title == "true"); // to use, have that a attribute called title in input with value false
    const inputArray = toArray(input.value);
    const [haveDoubleSpace, areEmpty, haveSpaceInBegin, haveSpaceInEnd, havePoorCharacter] = getValidations();
    makeValidations();

    function getValidations() {
        return [
            (inputArray.map(
                (x, y) => (x == " " && x == inputArray[y - 1]) || (x == " " && x == inputArray[y + 1]))).filter(
                    x => x == true)[0] || false,// if doubleSpace.
            (inputArray.length < 1), // if are empty
            (inputArray[0] == " "), // if space in begin
            (inputArray[inputArray.length - 1] == " "), //if space in end
            (exception) ? (inputArray.length > 0 && inputArray.length < 3) : false //if have a few characters
        ]
    };
    
    function makeValidations() {
        if(areEmpty){
            if(w=='input'){
                tot[indexOfInput]= true;
            }else{
                totA[indexOfInput]= true;

            }
            callNullColor();
            return;
        }
        if (input.type == "password") {
            if ((havePoorCharacter)) {
                callErrorColor();
            } else {
                callSucessColor();
            }
        }

        if (input.type == "text") {
            if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
                callErrorColor();
            } else {
                callSucessColor();
            }
        }

        if (input.nodeName == "TEXTAREA") {
            if (haveDoubleSpace || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
                callErrorColor();
            } else {
                callSucessColor();
            }
        }
    }



    function callErrorColor() {
        removeClassSucessFromInput();
        addClassErrorInInput();
    }

    function callSucessColor() {
        addClassSucessInInput();
        removeClassErrorFromInput(); 
    }

    function callNullColor() {
        removeClassSucessFromInput(); 
        removeClassErrorFromInput(); 
    }


    function addClassErrorInInput() {
        addClass(input, "errInputValidation");
    }
    function removeClassErrorFromInput() {
        removeClass(input, "errInputValidation");
    }
    
    function addClassSucessInInput() {
        addClass(input, "sucessInputValidation");
    }

    function removeClassSucessFromInput() {
        removeClass(input, "sucessInputValidation");
    }
    
}

//  <input title="false"> //to use exeption
//  <input title="false"> //to not use exeption
//  <input> //not use exeption

