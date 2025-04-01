let namesI = ['','','','','','','','']

let icon = document.getElementsByClassName('icon')
for(let i = 0; i<icon.length;i++){
    icon[i].addEventListener('mouseover', function(){
        document.querySelector('img').style.display = 'none'
        icon[i].innerHTML = namesI[i]
    })
    // icon[i].addEventListener('mouseover', function(){
    //     document.querySelector('img').style.display = 'block'
    // })
}