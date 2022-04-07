var formUpdate = document.getElementById("editEmployee");
if (formUpdate.addEventListener) {
    formUpdate.addEventListener("submit", validateForm);
} else if (formUpdate.attachEvent) {
    formUpdate.attachEvent("onsubmit", validateForm);
}

$(document).ready(function () {
    var countResults = document.getElementById("count-results");
    countResults.innerHTML =
        "Mostrando <b>" +
        jQuery("table tbody tr").length +
        "</b> de <b>" +
        countResults.dataset.results +
        "</b> resultados";
});
function deleteEmployee(id) {
    $.ajax({
        method: "GET",
        url: "/remove-employee?id=" + id,
    });
}

function fillModalupdateEmployee(
    idFunc,
    nomeFunc,
    cpfFunc,
    emailFunc,
    dtNascimentoFunc
) {
    document.getElementById("idFuncModal").value = idFunc;
    document.getElementById("nomeFuncModal").value = nomeFunc;
    document.getElementById("cpfFuncModal").value = cpfFunc;
    document.getElementById("emailFuncModal").value = emailFunc;
    document.getElementById("dtNascimentoFuncModal").value = dtNascimentoFunc;
}

function teste() {
    console.log();
}

function validateForm(evt) {
    var funcNome = document.getElementById("nomeFuncModal");
    var funcCpf = document.getElementById("cpfFuncModal");
    var funcCpfTratado = funcCpf.value.replace(/[^\d]+/g, "");
    var funcEmail = document.getElementById("emailFuncModal");
    var funcDtNascimento = document.getElementById("dtNascimentoFuncModal");
    var nomePattern = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
    var emailPattern =
        /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var contErro = 0;

    //validar nome
    if (
        funcNome.value == "" ||
        funcNome.value.length > 100 ||
        !nomePattern.test(funcNome.value)
    ) {
        document.querySelector(".msg-nome").innerHTML = "Nome inválido!";
        document.querySelector(".msg-nome").style.display = "block";
        contErro += 1;
    } else {
        document.querySelector(".msg-nome").style.display = "none";
    }

    //validar cpf
    if (
        funcCpfTratado == "" ||
        funcCpfTratado.length > 11 ||
        isNaN(funcCpfTratado) ||
        funcCpfTratado == "00000000000" ||
        funcCpfTratado == "11111111111" ||
        funcCpfTratado == "22222222222" ||
        funcCpfTratado == "33333333333" ||
        funcCpfTratado == "44444444444" ||
        funcCpfTratado == "55555555555" ||
        funcCpfTratado == "66666666666" ||
        funcCpfTratado == "77777777777" ||
        funcCpfTratado == "88888888888" ||
        funcCpfTratado == "99999999999"
    ) {
        document.querySelector(".msg-cpf").innerHTML = "CPF inválido!";
        document.querySelector(".msg-cpf").style.display = "block";
        contErro += 1;
    } else {
        document.querySelector(".msg-nome").style.display = "none";
    }

    //validar email
    if (
        funcEmail.value == "" ||
        funcEmail.value.length > 50 ||
        !emailPattern.test(funcEmail.value)
    ) {
        document.querySelector(".msg-email").innerHTML = "Email inválido!";
        document.querySelector(".msg-email").style.display = "block";
        contErro += 1;
    } else {
        document.querySelector(".msg-email").style.display = "none";
    }

    const now = new Date();
    var maxMonth = now.getMonth() + 1;
    var maxDay = now.getDate();
    var maxYear = now.getFullYear() - 18;
    var minyear = now.getFullYear() - 100;
    var maxDate = new Date(maxYear + "-" + maxMonth + "-" + maxDay);
    var minDate = new Date(minyear + "-" + maxMonth + "-" + maxDay);
    var dtInput = new Date(funcDtNascimento.value);

    //validar data
    if (
        funcDtNascimento.value == "" ||
        funcDtNascimento.value.length > 10 ||
        dtInput <= minDate ||
        dtInput > maxDate
    ) {
        document.querySelector(".msg-data").innerHTML = "Data inválida!";
        document.querySelector(".msg-data").style.display = "block";
        contErro += 1;
    } else {
        document.querySelector(".msg-data").style.display = "none";
    }

    if (contErro > 0) {
        evt.preventDefault();
    }
}
