let item = document.querySelectorAll('.items img')
let desc = document.getElementsByClassName('desc')


for(let i = 0; i<item.length; i++){
    // console.log(item, desc);
    item[i].addEventListener('mouseover', function(){
        let position = item[i].getBoundingClientRect()
        let item_top = item[i].clientWidth
        console.log(position);
        desc[i].style.display = 'block'
        desc[i].style.position = 'absolute'
        console.log(desc[i].clientHeight);
        if(desc[i].clientHeight > 50){
            desc[i].style.top = position.top - 170 - item_top + 'px'
        }else{
            desc[i].style.top = position.top - 210 + 'px'
        }
        desc[i].style.left = position.left - 400 + 'px'
    })
    item[i].addEventListener('mouseout', function(){
        desc[i].style.display = 'none'
    })
}