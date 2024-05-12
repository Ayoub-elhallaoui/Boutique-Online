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
