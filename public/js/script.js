$(document).ready(function () {
    // console.log(jQuery("table tbody tr").length);
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
    document.getElementById("nomeFuncModal").value = nomeFunc;
    document.getElementById("cpfFuncModal").value = cpfFunc;
    document.getElementById("emailFuncModal").value = emailFunc;
    document.getElementById("dtNascimentoFuncModal").value = dtNascimentoFunc;
}

function saveEmployeeUpdates() {
    var funcNome = document.getElementById("nomeFuncModal");
    var funcCpf = document.getElementById("cpfFuncModal");
    var funcCpfTratado = funcCpf.value.replace(/[^\d]+/g, "");
    var funcEmail = document.getElementById("emailFuncModal");
    var funcEstadoCivil = document.getElementById("estadoCivilFunc");
    var funcDtNascimento = document.getElementById("dtNascimentoFuncModal");
    var emailPattern =
        /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    //validar nome
    if (funcNome.value == "" || funcNome.value.length > 100) {
        document.querySelector(".msg-nome").innerHTML = "Nome inválido!";
        document.querySelector(".msg-nome").style.display = "block";
    } else {
        document.querySelector(".msg-nome").style.display = "none";
    }

    //validar cpf
    if (
        funcCpfTratado == "" ||
        funcCpfTratado.length > 11 ||
        isNaN(funcCpfTratado)
    ) {
        document.querySelector(".msg-cpf").innerHTML = "CPF inválido!";
        document.querySelector(".msg-cpf").style.display = "block";
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
    } else {
        document.querySelector(".msg-email").style.display = "none";
    }

    const now = new Date();
    var maxMonth = now.getMonth() + 1;
    var maxDay = now.getDate();
    var maxYear = now.getFullYear() - 18;
    var minyear = now.getFullYear() - 100;
    var maxDate = maxYear + "-" + maxMonth + "-" + maxDay;
    var minDate = minyear + "-" + maxMonth + "-" + maxDay;
    //validar data
    if (
        funcDtNascimento.value == "" ||
        funcDtNascimento.value.length > 50 ||
        funcDtNascimento.value <= minDate ||
        funcDtNascimento.value > maxDate
    ) {
        document.querySelector(".msg-data").innerHTML = "Data inválida!";
        document.querySelector(".msg-data").style.display = "block";
    } else {
        document.querySelector(".msg-data").style.display = "none";
    }
}
