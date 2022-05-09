let error_text = ""; 
// Функция проверки валидости
function finderror(str) {
    error_text = ""; 
    if (str=="") {
        error_text = "Поле ввода не должно быть пустым";
    }
    else if (str.length != 4) { 
            error_text = "Матрица должна содержать 4 строки";
        }
    else{
        for(let i = 0; i < str.length; i++) {
            if(str[i].length != 4) {  
                error_text = "Ошибка в вводе "+(i+1)+"-й строки. Строка должна содержать 4 элемента";
            }        
            for(let j = 0; j < str[i].length; j++) {
                if (str[i][j] != '1' && str[i][j] != '0') {
                    error_text = "Матрица должна состоять из 0 и 1";
                }
        }
    }
    }
    if (error_text) {
        return false; 
    }else {
        return true; 
    }
}
/**
 * Основная функция для проверки свойств отношений
 */
function main() {  

    let mass = document.getElementById('mass').value.split("\n");
    for(let i = 0; i < mass.length; i++) {
        mass[i] = mass[i].replace(/ +/g, ' ').trim();
        mass[i] = mass[i].split(" ");
    }
    if (finderror(mass)) {
        var refl="";
        var sym="";
        var cosym="";
        var trans="";
        refl=reflect(mass);
        sym=symmetr(mass);
        cosym=cosymmetr(mass);
        trans=transit(mass);
        document.getElementById("Outputs").innerText=refl+'.\n'+sym+'.\n'+cosym+'.\n'+trans+'.\n';

    }else {
        alert(error_text);
    }
}
function reflect(mass){
    for(let i = 0; i < 4; i++) {
        for(let j = 0; j < 4; j++)
            if(mass[i][j]==0 && i==j){return "Функция анти рефлексивная";};
    }
    return "Функция рефлексивная";
}
function symmetr(mass){
    var refl="";
    for(let i = 0; i < 4; i++) {
        for(let j = 0; j < 4; j++)
            if(mass[i][j] != mass[j][i] ){return "Функция не симметричная";};
    }
    return "Функция не симметричная";
}
function cosymmetr(mass){
    var refl="";
    for(let i = 0; i < 4; i++) {
        for(let j = 0; j < 4; j++)
            if(mass[i][j]==1 && mass[i][j] == mass[j][i] && i!=j){return "Функция не кососимметричная";};
    }
    return "Функция кососимметричная";
}
function transit(mass){
    var refl="";
    tempmass=pow2mass(mass);
    for(let i = 0; i < 4; i++) {
        for(let j = 0; j < 4; j++)
            if(mass[i][j]!=tempmass[i][j]){return "Функция не транзитивна";};
    }
    return "Функция транзитивна";
}
function pow2mass(mass) // Перемножение бинарных матриц 
{   

    let mass1 = [];
    for (let i = 0; i < 4; i++)
        mass1[i] = []; 
    for (let i = 0; i < 4; i++) {
         for (let j = 0; j < 4; j++) { 
             let temp = 0;
             for (let ij = 0;ij < 4; ij++)
                 temp += mass[j][ij] * mass[ij][i];
             mass1[j][i] = temp % 2;
        }
     }
    return mass1;
}