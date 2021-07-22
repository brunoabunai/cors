<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body>
    <noscript>Para continuar habilite o JavaScript</noscript>
    <button class="bt-ops" onclick="CreateBoxInit(0)">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0269 5.088C16.2739 5.23081 16.5126 5.38739 16.7419 5.557L18.5799 4.972C19.0276 4.82967 19.514 5.01816 19.7489 5.425L21.5689 8.578C21.8013 8.98548 21.7213 9.49951 21.3759 9.817L19.9509 11.117C20.0157 11.7059 20.0157 12.3001 19.9509 12.889L21.3759 14.189C21.7213 14.5065 21.8013 15.0205 21.5689 15.428L19.7489 18.581C19.514 18.9878 19.0276 19.1763 18.5799 19.034L16.7419 18.449C16.5093 18.6203 16.2677 18.7789 16.0179 18.924C15.7557 19.0759 15.4853 19.2131 15.2079 19.335L14.7959 21.214C14.6954 21.6726 14.2894 21.9996 13.8199 22ZM7.61992 16.229L8.43992 16.829C8.62477 16.9652 8.81743 17.0904 9.01692 17.204C9.20462 17.3127 9.39788 17.4115 9.59592 17.5L10.5289 17.909L10.9859 20H13.0159L13.4729 17.908L14.4059 17.499C14.8132 17.3194 15.1998 17.0961 15.5589 16.833L16.3799 16.233L18.4209 16.883L19.4359 15.125L17.8529 13.682L17.9649 12.67C18.0141 12.2274 18.0141 11.7806 17.9649 11.338L17.8529 10.326L19.4369 8.88L18.4209 7.121L16.3799 7.771L15.5589 7.171C15.1997 6.90671 14.8132 6.68175 14.4059 6.5L13.4729 6.091L13.0159 4H10.9859L10.5269 6.092L9.59592 6.5C9.39772 6.58704 9.20444 6.68486 9.01692 6.793C8.81866 6.90633 8.62701 7.03086 8.44292 7.166L7.62192 7.766L5.58192 7.116L4.56492 8.88L6.14792 10.321L6.03592 11.334C5.98672 11.7766 5.98672 12.2234 6.03592 12.666L6.14792 13.678L4.56492 15.121L5.57992 16.879L7.61992 16.229ZM11.9959 16C9.78678 16 7.99592 14.2091 7.99592 12C7.99592 9.79086 9.78678 8 11.9959 8C14.2051 8 15.9959 9.79086 15.9959 12C15.9932 14.208 14.2039 15.9972 11.9959 16ZM11.9959 10C10.9033 10.0011 10.0138 10.8788 9.99815 11.9713C9.98249 13.0638 10.8465 13.9667 11.9386 13.9991C13.0307 14.0315 13.9468 13.1815 13.9959 12.09V12.49V12C13.9959 10.8954 13.1005 10 11.9959 10Z" fill="#343434"></path>
        </svg>
    </button>
    <div class="portable-page">
        <a class="anc-back" href="./index.php?p=menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 16V13L22 13V11L6 11L6 8L2 12L6 16Z" fill="#343434"></path>
            </svg>
        </a>
        <div class="landing">
            <h2 class="title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8971 21.968C12.366 21.9696 11.8565 21.7586 11.4821 21.382L3.64805 13.547C3.23464 13.1348 3.02266 12.5621 3.06805 11.98L3.56805 5.41401C3.63935 4.4264 4.42625 3.64163 5.41405 3.57301L11.9801 3.07301C12.0311 3.06201 12.0831 3.06201 12.1341 3.06201C12.6639 3.06337 13.1718 3.27399 13.5471 3.64801L21.3821 11.482C21.7573 11.8571 21.9681 12.3659 21.9681 12.8965C21.9681 13.4271 21.7573 13.9359 21.3821 14.311L14.3111 21.382C13.9369 21.7583 13.4277 21.9693 12.8971 21.968ZM12.1331 5.06201L5.56205 5.56201L5.06205 12.133L12.8971 19.968L19.9671 12.898L12.1331 5.06201ZM8.65405 10.654C7.69989 10.6542 6.87847 9.98037 6.69213 9.04458C6.5058 8.10879 7.00646 7.17169 7.88792 6.80639C8.76939 6.44109 9.78615 6.74933 10.3164 7.54259C10.8466 8.33586 10.7426 9.39322 10.0681 10.068C9.69388 10.4443 9.18473 10.6553 8.65405 10.654Z" fill="#1D263B"></path>
                </svg>

                Editar Admin
            </h2>

            <span class="subtitle">
                Pesquise o Admin e edite seus dados
            </span>
        </div>

        <div class="main">
            <div>
                <div id="WicthUserBox">
                    <span>
                        Usuário em Edição: <span id="WicthUser">Nenhum!</span>
                    </span>
                </div>
                <div onclick="CreateBoxInit(1)" class="search">
                    <span class="opacty-button">Pesquisar Admin</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.577 19L12.81 14.234C10.6539 15.6564 7.77106 15.2164 6.13737 13.2156C4.50369 11.2147 4.64914 8.30214 6.47405 6.474C8.30186 4.6484 11.2148 4.50231 13.216 6.13589C15.2173 7.76946 15.6576 10.6526 14.235 12.809L19 17.577L17.577 19ZM10.034 7.014C8.5933 7.01309 7.35253 8.03002 7.07053 9.44291C6.78854 10.8558 7.54386 12.2711 8.87457 12.8234C10.2053 13.3756 11.7408 12.9109 12.542 11.7135C13.3433 10.5161 13.1871 8.91947 12.169 7.9C11.6043 7.33135 10.8355 7.0123 10.034 7.014Z" fill="#8D80AD"></path>
                    </svg>
                </div>
            </div>


            <form action="./../portable/portable.html">
                <input class="user" id="user" type="text" placeholder="Usuário" readonly>
                <input class="password" id="password" type="password" placeholder="Senha" readonly>
                <input id="sub" type="submit" class="btn-register opacty-button" value="Concluir Edição">
                <input id="res" type="reset" class="btn-reset opacty-button" value="Resetar">
            </form>

        </div>
    </div>

    <script>
        var userSearched = {
            name: "Nenhum!",
            password: "",
            founded: false
        };

        function SearchInit(op) {
            const admins = [{
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
            const {
                name,
                password,
                founded
            } = user;
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
    </script>

</body>

</html>