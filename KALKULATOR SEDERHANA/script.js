const viewResult = document.querySelector(".story-result");
const display = document.querySelector(".view-result");
const previusResult = document.querySelector(".interim-result");
const inputBtn = document.querySelectorAll(".button");
const operations = document.querySelectorAll(".operation");
const equal = document.querySelector(".equal");
const clearAll = document.querySelector(".clear-all");
const clearLast = document.querySelector(".clear-last");

let num1 = "";
let num2 = "";
let result = null;
let lastOperation = "";
let haveDot = false;

inputBtn.forEach((val) => {
  val.addEventListener("click", (e) => {
    if (e.target.innerText === "." && !haveDot) {
      haveDot = true;
    } else if (e.target.innerText === "." && haveDot) {
      return;
    }
    num2 += e.target.innerText;
    display.innerText = num2;
    console.log(e.target.innerText);
  });
});

operations.forEach((operation) => {
  operation.addEventListener("click", (e) => {
    if (!num2) return;
    haveDot = false;
    const operationName = e.target.innerText;
    if (num2 && num1 && lastOperation) {
      mathOperation();
    } else {
      result = parseFloat(num2);
    }
    clearVar();
    lastOperation = operationName;
  });
});

equal.addEventListener("click", () => {
  if (!num1 || !num2) return;
  haveDot = false;
  mathOperation();
  clearVar();
  display.innerText = result;
  previusResult.innerText = "";
  num = result;
  num2 = "";
});

clearAll.addEventListener("click", () => {
  haveDot = false;
  num1 = "";
  num2 = "";
  (result = ""), (viewResult.innerText = "");
  display.innerText = "";
  previusResult.innerText = "";
  lastOperation = "";
});

clearLast.addEventListener("click", () => {
  display.innerText = "";
  num2 = "";
});

// INPUT KEYBOARD
window.addEventListener("keydown", (e) => {
  console.log(e.key);
  if (
    e.key === "0" ||
    e.key === "1" ||
    e.key === "2" ||
    e.key === "3" ||
    e.key === "4" ||
    e.key === "5" ||
    e.key === "6" ||
    e.key === "7" ||
    e.key === "8" ||
    e.key === "9"
  ) {
    clickButton(e.key);
  } else if (e.key === "+" || e.key === "-" || e.key === "%" || e.key === "/") {
    clickOperation(e.key);
  } else if (e.key === "*") {
    clickOperation("X");
  } else if (e.key === "Enter" || e.key === "=") {
    clickEqual();
  } else if (e.key === "Backspace") {
    clickClear();
  }
});

function clickButton(key) {
  inputBtn.forEach((button) => {
    if (button.innerText === key) {
      button.click();
    }
  });
}

function clickOperation(key) {
  operations.forEach((e) => {
    if (e.innerText === key) {
      e.click();
    }
  });
}

function clickEqual(key) {
  equal.click();
}

function clickClear(key) {
  clearAll.click();
}

// FUNGSI FUNGSI
function clearVar(name = " ") {
  num1 += num2 + " " + name + " ";
  viewResult.innerText = num1;
  result.innerText = "";
  num2 = "";
  previusResult.innerText = result;
}

// Operasi Matematika
function mathOperation() {
  if (lastOperation === "X") {
    result = parseFloat(result) * parseFloat(num2);
  } else if (lastOperation === "/") {
    result = parseFloat(result) / parseFloat(num2);
  } else if (lastOperation === "/") {
    result = parseFloat(result) / parseFloat(num2);
  } else if (lastOperation === "+") {
    result = parseFloat(result) + parseFloat(num2);
  } else if (lastOperation === "-") {
    result = parseFloat(result) - parseFloat(num2);
  } else if (lastOperation === "%") {
    result = parseFloat(result) % parseFloat(num2);
  }
}
