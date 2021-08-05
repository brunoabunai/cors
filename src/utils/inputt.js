const allInputs = document.querySelectorAll('input');
const allTextareas = document.querySelectorAll('textarea');

allInputs.forEach((input,index)=>{
    input.onkeyup = () => UserDigited(input);
})

allTextareas.forEach((textarea,index)=>{
    textarea.onkeyup = () => UserDigited(textarea);
})

function UserDigited(input) {
    const exception = (input.title == "true"); // to use, have that a attribute called title in input with value false
    const inputArray = toArray(input.value);
    const [haveDoubleSpace, areEmpty, haveSpaceInBegin, haveSpaceInEnd, havePoorCharacter] = getValidations();
    makeValidations();

    function getValidations() {
        return [
            (inputArray[inputArray.length - 1] == inputArray[inputArray.length - 2] && inputArray[inputArray.length - 1] == " "), // if doubleSpace
            (inputArray.length < 1), // if are empty
            (inputArray[0] == " "), // if space in begin
            (inputArray[inputArray.length - 1] == " "), //if space in end
            (exception) ? (inputArray.length > 0 && inputArray.length < 3) : false //if have a few characters
        ]
    };
    function makeValidations() {
        if(input.type=="password"){
            if((areEmpty || havePoorCharacter)){
                addErr(input);
            }else{
                removeErr(input);
            }
        }
        
        if(input.type=="text"){
            if (haveDoubleSpace || areEmpty || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
                addErr(input);
                console.log(haveDoubleSpace)
                console.log(areEmpty)
                console.log(haveSpaceInBegin)
                console.log(haveSpaceInEnd)
                console.log(havePoorCharacter)
            } else {
                removeErr(input);
            }
        }

        if(input.nodeName=="TEXTAREA"){
            if (haveDoubleSpace || areEmpty || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
                addErr(input);
            } else {
                removeErr(input);
            }
        }
        
    }

    function addErr(element){
        addClass(element, "errInputValidation");
    }
    function removeErr(element){
        removeClass(element, "errInputValidation");
    }
}

//  <input title="false"> //to use exeption
//  <input title="false"> //to not use exeption
//  <input> //not use exeption

