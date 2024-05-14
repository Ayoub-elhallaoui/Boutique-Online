function afficherRes(term){
    const res = document.querySelector('#afficher')
    console.log(res)
    res.innerHTML = `<p>${term}<?>`
    return res
}

const search = document.getElementById('search')
console.log(search)
search.addEventListener('change',(e)=>{
    e.preventDefault()
    e.stopPropagation()
    console.log(e.target.value)
    const searchTerme = e.target.value
    afficherRes(searchTerme)
})


const checkout = document.querySelector('#checkout').value
checkout.addEventListener('click',(e)=>{
    console.log(e.preventDefault())
    e.stopPropagation()
})

const sortPrice = document.querySelector('#sort').value
sortPrice.addEventListener(
    'click',
    (e)=>{
        console.log(e.target.value)
        e.preventDefault();
        e.stopPropagation();
    }

) ;