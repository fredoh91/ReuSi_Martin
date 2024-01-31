
/////////////////////////////////////////////////////////////////////////////////////
//                       pour ajouter des sous formulaires                         //
/////////////////////////////////////////////////////////////////////////////////////









const newItem = (e) => {
    const collectionHolder = document.querySelector(e.currentTarget.dataset.collection)

    const item = document.createElement("div")

    item.classList.add("col-4")
    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        )
    item.querySelector(".btn-remove").addEventListener("click",()=>item.remove())

    collectionHolder.appendChild(item)

    collectionHolder.dataset.index++
}

document
    .querySelectorAll('.btn-remove')
    .forEach(btn => btn.addEventListener("click", (e) => e.currentTarget.closest('.item').remove()))

document
    .querySelectorAll('.btn-new')
    .forEach(btn => btn.addEventListener("click", newItem))











// const suiviCollectionHolder = document.querySelector("#Signal_desc_form_suivis")

// // let indexSuivis = suiviCollectionHolder.querySelectorAll("#Signal_desc_form_suivis*").length
// let indexSuivis = suiviCollectionHolder.querySelectorAll('[id^="Signal_desc_form_suivis"]').length
// // let indexSuivis = suiviCollectionHolder.querySelectorAll('[id^="Signal_desc_form_suivis___name___description"]').length

// const newSuivi = () => {
//     // e.preventdefaut
//     console.log (indexSuivis)
    
//     suiviCollectionHolder.innerHTML += suiviCollectionHolder.dataset.prototype.replace(/__name__/g,indexSuivis)
//     indexSuivis++
//     // console.log (suiviCollectionHolder.dataset.prototype)
// }


// document.querySelector("#nouveau-suivi").addEventListener('click', newSuivi)




