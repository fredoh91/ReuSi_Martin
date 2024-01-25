
const testConsole = function () {
    console.log ('Salut, ça marche')
}

const IsOngletCreaNouvSign = function () {
    const finURL = ['nouv_signal_desc_signal',
                    'nouv_signal_suivi_signal',
                    'nouv_signal_list_action']
    for (URL of finURL ){
        if (window.location.href.search(URL)) {
            return true
        }
    }
}

const Onglet_a_activer = function () {

    const Tab = document.querySelectorAll('.btn-header')

    for (onglet of Tab) { 
        // console.log (window.location.href + " : " + onglet.id)
        // console.log (window.location.href.search(onglet.id))
        if (window.location.href.search(onglet.id) != -1) {
            return onglet.id
        }
    }

}

id_a_activer = Onglet_a_activer()
// console.log (id_a_activer)
tab = document.querySelector("#" + id_a_activer)
tab.classList.remove('btn-header')
tab.classList.add('btn-header-actif')


//////////////////////////////////////////////////////////////
//          Pour afficher/masquer les sous onglets          //
//////////////////////////////////////////////////////////////

console.log ("helloooooooooooooo")

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


