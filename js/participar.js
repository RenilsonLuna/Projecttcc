function participar(idEvento){
  window.location.href = `../controle/eventoControle.php?participar=${idEvento}`
}

function cancelar(idEvento){
  window.location.href = `../controle/eventoControle.php?cancelar=${idEvento}`
}
