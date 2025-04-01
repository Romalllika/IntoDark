$(document).ready(function() {

    let pers = $('.hero');
    let main = $('main');
    let exitloc = $('.exitloc'); 

    // Получаем начальные позиции
    let posTop = pers.position().top;
    let posLeft = pers.position().left;

    $(document).keypress(function(event) {

        let mainOffset = main.offset();
        let mainWidth = main.width();
        let mainHeight = main.height();
        let exitOffset = exitloc.offset();
        let exitWidth = exitloc.outerWidth();
        let exitHeight = exitloc.outerHeight();

        let persWidth = pers.outerWidth();
        let persHeight = pers.outerHeight();

        // Проверяем границы блока main
        if (posTop < mainOffset.top) {
            posTop = mainOffset.top; // Ограничиваем верхнюю границу
        } else if (posTop + persHeight > mainOffset.top + mainHeight) {
            posTop = mainOffset.top + mainHeight - persHeight; // Ограничиваем нижнюю границу
        }

        if (posLeft < mainOffset.left) {
            posLeft = mainOffset.left; // Ограничиваем левую границу
        } else if (posLeft + persWidth > mainOffset.left + mainWidth) {
            posLeft = mainOffset.left + mainWidth - persWidth; // Ограничиваем правую границу
        }

        pers.css({
            top: posTop + 'px',
            left: posLeft + 'px'
        });

        // Проверка на пересечение с exitloc
        if (posLeft < exitOffset.left + exitWidth &&
            posLeft + persWidth > exitOffset.left &&
            posTop < exitOffset.top + exitHeight &&
            posTop + persHeight > exitOffset.top) {

            let alertQuestion = confirm('Вы уверены что хотите покинуть локацию?')
            if(alertQuestion == true){
                location.href = '../views/game.php'
            }
        }
    });
    //изменение цвета здоровья
    // setInterval(function(){
    //     let health_field = $('.health')
    //     let health = +$('.health').text()
    //     let quarter = health/4
    //     let half = health/2
    //     // console.log(health);
    //     // if(health < health-((health/100)*70)){
    //     //     health_field.css({
    //     //         bacground_color: rgb(255, 180, 95),
    //     //     })
    //     // }else if(health < health-((health/100)*50)){
    //     //     health_field.css({
    //     //         bacground_color: rgb(254, 148, 0),
    //     //     })
    //     // }else if(health < health-((health/100)*30)){
    //     //     health_field.css({
    //     //         bacground_color: rgb(223, 25, 25),
    //     //     })
    //     // }

    //     if(health > quarter*3){
    //         health_field.css({
    //             bacground_color: rgb(56, 237, 62),
    //         })
    //     } 
    //     if(health < quarter*3 && health > half){
    //         health_field.css({
    //             bacground_color: rgb(255, 180, 95),
    //         })
    //     }
    //     if(health < half && health > quarter){
    //         health_field.css({
    //             bacground_color: rgb(254, 148, 0),
    //         })
    //     }
    //     if(health < quarter){
    //         health_field.css({
    //             bacground_color: rgb(223, 25, 25),
    //         })
    //     }
    //     console.log(health);
    // }, 1000)
}) 