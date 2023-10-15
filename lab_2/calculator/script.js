var resultBox = document.getElementById('result-box');
var expression = resultBox.innerText;
var showedResult = false;

function number(n) {
    expression = expression + n;
    resultBox.innerText = expression;
}

function ce() { 
    expression = "";
    resultBox.innerText = expression;
}

function del() {
    expression = expression.toString().slice(0, -1);
    resultBox.innerText = expression;
}

function calculate() {
    try {
        expression = eval(expression);
    } catch {
        expression = "Invalid error!";
    }
    
    resultBox.innerText = expression;
    if (typeof expression === "string" || expression === Infinity)
        expression = "";
}
