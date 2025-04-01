// получаем статистику персонажей из бд
let hero_health = 0
let hero_power = 0
let hero_armor = 0
get_stats_hero()

let health_monster = 0
let power_monster = 0
get_stats_monster()

function get_stats_hero(){
    let xhr = new XMLHttpRequest()
    xhr.open('POST', '../hanglers/get_stats_h.php', true)
    xhr.send()

    xhr.onreadystatechange = function(){
        if(xhr.readyState != 4){
            return
        }
        if(xhr.status == 200){
            let stats = JSON.parse(xhr.responseText)
            console.log(stats);
            stats.forEach(function(sts) {
                hero_health = sts.health
                hero_power = sts.power
                hero_armor = sts.armor
            })
        }
        console.log(hero_health, hero_power, hero_armor);
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve("Данные загружены");
            }, 1000); // Имитация задержки в 1 секунду
        });
    }
}

function get_stats_monster(){
    let xhr = new XMLHttpRequest()
    xhr.open('POST', '../hanglers/get_stats_m.php', true)
    xhr.send()

    xhr.onreadystatechange = function(){
        if(xhr.readyState != 4){
            return
        }
        if(xhr.status == 200){
            stats_m = JSON.parse(xhr.responseText)
            console.log(stats_m);
            stats_m.forEach(function(sts) {
                health_monster = sts.health
                power_monster = sts.power
            })
        }
        console.log(health_monster, power_monster);
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve("Данные загружены");
            }, 1000); // Имитация задержки в 1 секунду
        });
    }
}


// Функция для отображения экрана загрузки
function showLoadingScreen() {
    document.getElementById('loadingScreen').style.display = 'flex';
}

// Функция для скрытия экрана загрузки и отображения контента
function hideLoadingScreen() {
    document.getElementById('loadingScreen').style.display = 'none';
    document.querySelector('#game').style.display = 'block';
}

// Основная функция
async function main() {
    showLoadingScreen();

    // Задержка на 2 секунды перед выполнением AJAX-запроса
    await new Promise(resolve => setTimeout(resolve, 2000));

    // Выполнение AJAX-запроса (имитация)
    const result = await get_stats_hero() 
    const result2 = await get_stats_monster();
    console.log(result, result2); // Вывод результата в консоль

    // Скрытие экрана загрузки и отображение контента
    hideLoadingScreen();
}

// Запуск основной функции
main();

setTimeout(function(){
    class Character {
        constructor(element, health, position, armor, power) {
            this.element = element;
            this.health = health;
            this.position = position;
            this.armor = armor;
            this.power = power;
            this.updatePosition();
        }

        updatePosition() {
            this.element.style.left = `${this.position.x}px`;
            this.element.style.top = `${this.position.y}px`;
        }
    }

    class Hero extends Character {
        constructor(element) {
            super(element, hero_health, { x: 50, y: 50 }, hero_armor, hero_power);
            this.element.className = 'character hero';
            this.addMovementControls()
            this.updateHealthDisplay()
        }

        isNear(monster) {
            const dx = this.position.x - monster.position.x;
            // alert(monster.position.y);
            const dy = this.position.y - monster.position.y;
            return (Math.sqrt(dx * dx + dy * dy) <= 100); // расстояние для атаки
        }
        updateHealthDisplay() {
            const healthElement = document.querySelector('.health');
            healthElement.innerHTML = this.health;
        }    
        attack(monsters) {
            const targetMonster = monsters.find(monster => this.isNear(monster));
            if (targetMonster) {
                targetMonster.health -= hero_power; // урон
                // alert("Герой бьет и наносит " + this.power + " у противника осталось " + targetMonster.health + " хп");
                if (targetMonster.health <= 0) {
                    targetMonster.element.remove(); // убиваем монстра
                    monsters.splice(monsters.indexOf(targetMonster), 1);
                }
            }
        }
        addMovementControls() {
            document.addEventListener('keydown', (event) => {
                let newX = this.position.x;
                let newY = this.position.y;

                switch(event.key) {
                    case 'ц':
                    case 'w': // Вверх
                        newY -= 30;
                        break;
                    case 'ы':
                    case 's': // Вниз
                        newY += 30;
                        break;
                    case 'ф':
                    case 'a': // Влево
                        newX -= 30;
                        break;
                    case 'в':
                    case 'd': // Вправо
                        newX += 30;
                        break;
                }

                // Ограничение по игровому полю
                const gameAreaRect = this.element.parentElement.getBoundingClientRect();
                const elementRect = this.element.getBoundingClientRect();

                if (newX >= 0 && newX <= gameAreaRect.width - elementRect.width) {
                    this.position.x = newX;
                }
                if (newY >= 0 && newY <= gameAreaRect.height - elementRect.height) {
                    this.position.y = newY;
                }

                // Проверка пересечения с exitLoc
                const exitLoc = document.querySelector('.exitloc');
                if (exitLoc) {
                    const exitRect = exitLoc.getBoundingClientRect();
                    
                    if (elementRect.left < exitRect.right &&
                        elementRect.right > exitRect.left &&
                        elementRect.top < exitRect.bottom &&
                        elementRect.bottom > exitRect.top) {
                            console.log("Вы вышли!");
                            window.location.href = '../hanglers/total.php'
                    }
                }
                this.updatePosition();
            });
        }
        // getItem(items){
        //     const targetItem = items.find(item => this.isNear(item));
        //     if(targetItem){
        //         alert(targetItem.position)
        //         targetItem.toBackPack();
        //         targetItem.element.remove();
        //         return targetItem;
        //     }
        // }
    }

    class Monster extends Character {
        constructor(element) {
            const position = {
                x: Math.random() * (gameArea.clientWidth - 50),
                y: Math.random() * (gameArea.clientHeight - 50),
            };
            super(element, health_monster, position, power_monster)
            this.element.className = 'character monster';
        }

        move(gameArea) {
            this.position.x += (Math.random() - 0.5) * 40; // случайное движение по X
            this.position.y += (Math.random() - 0.5) * 40; // случайное движение по Y

            // Ограничение движения в пределах игрового поля
            this.position.x = Math.max(0, Math.min(gameArea.clientWidth - 50, this.position.x));
            this.position.y = Math.max(0, Math.min(gameArea.clientHeight - 50, this.position.y));

            this.updatePosition();
        }
        isNear(hero) {
            const distance = Math.sqrt(
                Math.pow(this.position.x - hero.position.x, 2) +
                Math.pow(this.position.y - hero.position.y, 2)
            );
            return distance < 50; // Порог расстояния для атаки
        }
        attack(){
            game.hero.health -= power_monster;// Наносим урон герою
            game.hero.updateHealthDisplay(); // Обновляем отображение здоровья героя
            if(game.hero.health <= 0){
                document.querySelector('.death').style.display = 'block'
                document.querySelector('.overlay').style.display = 'block';
            }
        }
    }

    // class Item{
    //     constructor(element){
    //         const position = {
    //             x: Math.random() * (gameArea.clientWidth - 50),
    //             y: Math.random() * (gameArea.clientHeight - 50),
    //         };
    //         this.element = element;
    //         this.position = position;
    //         this.element.className = 'item';
    //         // this.toBackPack()
    //     }
    //     toBackPack(targetItem){
    //         let xhr = new XMLHttpRequest()

    //         let data = {
    //             item: targetItem
    //         }
    //         data = JSON.stringify(data)

    //         xhr.open('POST', '../hanglers/toBackpack.php', false)
    //         xhr.setRequestHeader('Content-type','application/json')
    //         xhr.send(data)

    //         xhr.onreadystatechange = function(){
    //             if(xhr.readyState != 4){
    //                 return
    //             }
    //             if(xhr.status == 200){
    //                 alert('Вы подобради ', xhr.responseText);
    //             }
    //         }
    //     }
    // }
    
    class Game {
        constructor(gameAreaElement) {
            this.gameArea = gameAreaElement;
            this.hero = new Hero(document.getElementById('hero'));
            this.monsters = [];
            // this.items = [];
            // alert(""+ this.items + " ");
            
            this.init();
        }
        
        init() {
            this.gameArea.appendChild(this.hero.element);
            
            for (let i = 0; i < 5; i++) {
                const monsterElement = document.getElementById('enemy');
                const monster = new Monster(monsterElement);
                this.monsters.push(monster);
                this.gameArea.appendChild(monster.element);
            }
            
            // for(let i = 0; i < 1; i++){
            //     const itemElement = document.getElementById('item')
            //     const item = new Item(itemElement);
            //     this.items.push(item);
            //     //alert(this.items.length)
            //     this.gameArea.appendChild(item.element);
            // }
            
            document.addEventListener('keydown', (event) => {
                if (event.key === 'e' || event.key === 'у') {
                    this.hero.attack(this.monsters);
                }
                // if(event.key === 'g' || event.key === 'п'){
                //     this.hero.getItem(this.items)
                // }
            });
            
            setInterval(() => this.moveMonsters(), 1000);
        }
        
        moveMonsters() {
            this.monsters.forEach(monster => {
                monster.move(this.gameArea);
                if (monster.isNear(this.hero)) {
                    //alert(this.hero.health);
                    monster.attack(); // Монстр атакует героя, если он близко
                }
            })
        }
    }
    // Инициализация игры
    const gameArea = document.getElementById('game');
    const game = new Game(gameArea);
    
}, 1000)
