console.log("Hello, World!!!")
let a=10;
let b=20;
let sum=a+b;
console.log("Soma " + sum);
//typeof
console.log(typeof (a));
console.log(typeof (b));
console.log(typeof (sum));
a="Olá";
console.log(typeof(a));

console.log("Tipo de variaveis em JS");
//tipops de variaveis em JS
//Tipos primitivos do JS
let number = 42; //tipo number
let numberdecimal = 3.4; //tip number
let string = "Hello, World!";//tipo string
let boolean = true;//tipo boolean
let nullValue = null; //tipo null
let undefinedValue;
let bla;
let object = {name:"Alice", age: 30};
let object2 = {name: "Felipe", age: 20};
console.log("Nome:"+object.name);
console.log("Idade: "+object.age);
//tipo array
let array = [1, 2, 3, 4, 5];
let array2 = ["Apple", "Banana", "Cherry"];
let nomes=[];
nomes.push("Felipe");
nomes.push("Maria");
nomes.push("Joao");
console.log(nomes);

//formas de definicao de variaveis em JS
//VAR, LET, CONST

var xGlobal= "Sou uma variavel global";

if (true) {
    let xLocal = "Sou uma variavel local";
    console.log(xGlobal);
    console.log(xLocal);
}
    console.log(xGlobal);
   // console.log(xLocal);//Erro: xLocal is not defined
   const PI = 3.14;//constante, nao pode ser reatribuida

   //funcoes em JS
   function soma(a, b){
    return a+b;
   }
   console.log("A soma de 5 e 10 é: "+ soma(5, 10));
   console.log("A soma de 3.5 e 3.5 é: " + soma("2",  "2"));