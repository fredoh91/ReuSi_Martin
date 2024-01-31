
/////////////////////////////////////////////////////////////////////////////////////
//         Pour afficher/masquer les onglets de creation de nouveau signal         //
/////////////////////////////////////////////////////////////////////////////////////

const div = []

div[1] = document.getElementById("onglet_1")
div[2] = document.getElementById("onglet_2")
div[3] = document.getElementById("onglet_3")


const btn = []

btn[1] = document.getElementById("btn-1")
btn[2] = document.getElementById("btn-2")
btn[3] = document.getElementById("btn-3")

const affMask = (event) => {
  
  event.preventDefault()
  var btnName = event.target.getAttribute('id')
  var numBtn = btnName.substring(btnName.length - 1,btnName.length)
  
  for (var i = 1; i <= 3; i++) {
    if (numBtn == i) {
      div[i].className = "onglet-aff"
      btn[i].className = "btn-header-CreaSignal-actif"
    } else {
      div[i].className = "onglet-mask"
      btn[i].className = "btn-header-CreaSignal-inactif"
    }
  }
} 

btn[1].addEventListener("click", affMask)
btn[2].addEventListener("click", affMask)
btn[3].addEventListener("click", affMask)


