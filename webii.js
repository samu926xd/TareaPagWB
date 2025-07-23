
//const filtroInput = document.querySelector("#events");
//const itemList = document.querySelector("#even");
//const addButton = document.querySelector("#addButton");
//const result = document.querySelector("#results-container");

//addButton.addEventListener("click", function () {
    //const term = filtroInput.value.toLowerCase();
  //  const items = itemList.getElementsByTagName("li");
    
//result.innerHTML = "<h3>Resultados de búsqueda</h3>";
//let found = false;

//Array.from(items).forEach(function (item) {
   // if (item.textContent.toLowerCase().includes(term)) {
  //  const div = document.createElement("div");
  //  div.innerHTML = `<p>${item.textContent}</p>`;
 //   result.appendChild(div);
//    found = true;
//}
//});
///if (!found) {
//result.innerHTML += "<p>No se encontraron eventos.</p>";
//}
//});

const input = document.querySelector("#CashInput");
const doButton = document.querySelector("#Donar");
const CashList = document.querySelector("#Cashlist"); 

doButton.addEventListener("click", function(){
    if(input.value.trim()!=""){
        let nuevaDon = document.createElement("li");
        nuevaDon.innerText = input.value;
        CashList.appendChild(nuevaDon);
        input.value="";

    }
})
let Tcash = document.createElement("p");
Tcash.id = "TCash";
Tcash.innerText = "Total Donado: $0.000";
CashList.parentNode.insertBefore(Tcash, CashList.nextSibling);

let Total = 0; 

doButton.addEventListener("click", function(){
    let valor = parseFloat(input.value || CashList.lastChild.innerText);
    if(!isNaN(valor)){
        Total += valor; 
        Tcash.innerText = `Total Donado: $${Total.toFixed(2)}`;

    }
})
Tcash.addEventListener("click", function(){
    if (Total >= 10000){
        alert("Monto Superado");
    }

})
