
// colocando foto no input

const input = document.getElementById("img_perfil")
const img = document.getElementById("img_usuario")
const img2 = document.getElementById("img_usuario2")
const img3 = document.getElementById("img_usuario3")
const alert = document.getElementById('alerta')

setTimeout(function(){
  if (alert) {
    alert.style = "display: none"
  }
}, 3000)

input.addEventListener('change', function() {

  const file = this.files[0]
  const fileReader = new FileReader()

  fileReader.onloadend = () => {
    img.setAttribute('src', fileReader.result)
    img2.setAttribute('src', fileReader.result)
    img3.setAttribute('src', fileReader.result)
  }
  fileReader.readAsDataURL(file)
})

// requisicao ajax com o cep

function getDadosCep(cep){

  const url = `https://viacep.com.br/ws/${cep}/json/unicode/`;
  const ajax = new XMLHttpRequest();
  ajax.open('GET', url);
  ajax.onreadystatechange = () => {

    if (ajax.readyState == 4 && ajax.status == 200) {
      const dadosText = ajax.responseText;
      const dadosJson = JSON.parse(dadosText);

      document.getElementById('cidade').value = dadosJson.localidade;
      document.getElementById('estado').value = dadosJson.uf;
      document.getElementById('bairro').value = dadosJson.bairro;
      document.getElementById('logadouro').value = dadosJson.logradouro;
    }
  }
  ajax.send();
}
