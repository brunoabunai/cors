let globalStateBox=false;
function makeBox(){
  const page = document.querySelector('body');

  !globalStateBox ? page.innerHTML+=constructorBox() : (
    document.querySelectorAll('#box').forEach( x => {
      x.remove();
    })
  );
  globalStateBox = !globalStateBox;
}

function constructorBox() {
  return (
    `<div id='box'>
      <a class="btn-account opacity-button" href="#"> minha conta </a>
      <a class="btn-leave opacity-button" onclick="logOff()" href="#"> sair </a>
    </div>`
  );
}
