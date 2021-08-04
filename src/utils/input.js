const input = document.querySelector('input');

input.onkeyup = () => UserDigited();

function UserDigited() {
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
        if (haveDoubleSpace || areEmpty || haveSpaceInBegin || haveSpaceInEnd || havePoorCharacter) {
            addClass(input, "errInputValidation");

        } else {
            removeClass(input, "errInputValidation");
        }
    }
}

//  <input title="false"> //to use exeption
//  <input title="false"> //to not use exeption
//  <input> //not use exeption

