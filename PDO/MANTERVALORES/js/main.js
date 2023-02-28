function validarSenha() {
    var senha1 = document.getElementById("senha");
    var senha2 = document.getElementById("senhaComfirm");
    const diverror = document.querySelector('.errormsg');
    var s1 = senha1.value;
    var s2 = senha2.value;
    if (s1 == s2) {
      alert("Dados Cadastrados");
      return true;
    } else {
        diverror.innerHTML ("<span>Senhas não batem. Verifique o valor digitado.<span>");
      return false;
    }
  }