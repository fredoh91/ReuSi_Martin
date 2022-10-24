
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

tab = document.querySelector("#" + id_a_activer)
tab.classList.remove('btn-header')
tab.classList.add('btn-header-actif')
