var mass_1,mass_2,mass_3,error_text,Output,countmax=0;
/**
 * Функция определения корректности ввода
 */
function finderror(str)
{
    let mass=false;
    if(str.length>0) {
        mass = str.split(' ');
        for(let i=0;i<mass.length;i++){
            if(!(mass[i][0]%2==1 && (mass[i][1]>=0 && mass[i][1]<=9) && mass[i][2]%2==0 && (mass[i][3]>='A' && mass[i][3]<='z')&& mass[i].length==4))
            {
                error_text='Ошибка в вводе элемента множества: '+mass[i]+'. Правильный формат ввода jcib';
                mass=false;
                break;
            }
        }
    }
    else if(str.length==0)
        error_text='Поле ввода не должно быть пустым';
    return mass;
}
/**
 * Основная функция для считывания данных
 */
function init(){
    var a = document.getElementById('mass1');
    var b = document.getElementById('mass2');

    mass_1 = finderror(a.value);
    mass_2 = finderror(b.value);
    mass_3=[];
    return 0;
}
/**
 * Функция объединения
 */
function union() {
    init();
    mass_3=mass_1;
    if (mass_1 && mass_2) {
        for (let i = 0,same=false,f=mass_1.length; i<mass_2.length; i++,same=false) {
            for (let j = 0; j<mass_1.length; j++) {
                if (mass_2[i] == mass_1[j]) {
                    same = true;
                    break;
                }
            }
            if (!same){
                mass_3[f]=mass_2[i];
                f++;
            }
        }
        document.getElementById("Outputs").innerText='Объединение данных множеств: {' + mass_3 + '}';

    } else
        alert(error_text);
}
/**
 * Функция пересечения
 */
function intersect() {
    init();
    if (mass_1 && mass_2) {
        for (let i = 0,same=false,f=0; i<mass_2.length; i++,same=false) {
            for (let j = 0; j<mass_1.length; j++) {
                if (mass_2[i] == mass_1[j]) {
                    same = true;
                    break;
                }
            }
            if (same){
                mass_3[f]=mass_2[i];
                f++;
            }
        }
        document.getElementById("Outputs").innerText='Пересечение данных множеств: {' + mass_3 + '}';
    } else
        alert(error_text);
}
/**
 * Функция Дополнения А/B
 */
function additionAB() {
    init();
    if (mass_1 && mass_2) {
        for (let i = 0,same=false,f=0; i<mass_2.length; i++,same=false) {
            for (let j = 0; j<mass_1.length; j++) {
                if (mass_2[i] == mass_1[j]) {
                    same = true;
                    break;
                }
            }
            if (!same){
                mass_3[f]=mass_2[i];
                f++;
            }
        }
        document.getElementById("Outputs").innerText='Дополнение множества A множеством B: {' + mass_3 + '}';
    } else
        alert(error_text);
}
/**
 * Функция дополнения B/A
 */
function additionBA() {
    init();
    if (mass_1 && mass_2) {
        for (let i = 0,same=false,f=0; i<mass_1.length; i++,same=false) {
            for (let j = 0; j<mass_2.length; j++) {
                if (mass_2[j] == mass_1[i]) {
                    same = true;
                    break;
                }
            }
            if (!same){
                mass_3[f]=mass_1[i];
                f++;
            }
        }
        document.getElementById("Outputs").innerText='Дополнение множества B множеством A: {' + mass_3 + '}';
    } else
        alert(error_text);
}
/**
 * Функция симметрической разности
 */
function symmetric_difference() {
    init();
    if (mass_1 && mass_2) {
        for (let i = 0,same=false,f=0; i<mass_1.length; i++,same=false) {
            for (let j = 0; j<mass_2.length; j++) {
                if (mass_2[j] == mass_1[i]) {
                    same = true;
                    break;
                }
            }
            if (!same){
                mass_3[f]=mass_1[i];
                f++;
            }
        }
        for (let i = 0,same=false,f=mass_3.length; i<mass_2.length; i++,same=false) {
            for (let j = 0; j<mass_1.length; j++) {
                if (mass_2[i] == mass_1[j]) {
                    same = true;
                    break;
                }
            }
            if (!same){
                mass_3[f]=mass_2[i];
                f++;
            }
        }
        document.getElementById("Outputs").innerText='Симметрическая разность: {' + mass_3 + '}';
    } else
        alert(error_text);
}