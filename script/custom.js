function deselect(name) {
    var checkedInputs = document.getElementsByName(name);
    checkedInputs.forEach((checkedInput) => {
        checkedInput.checked = false;
    });
}

function toggleQuestion3(show) {
    var question3Inner = document.getElementById('question3-inner1');
    if (show) {
        question3Inner.style.display = 'block';
    } else {
        question3Inner.style.display = 'none';
        deselect("question3-in1[]");
    }
}

function toggleQuestion4(show) {
    var question4Inner1 = document.getElementById('question4-inner1');
    var question4Inner2 = document.getElementById('question4-inner2');
    if (show) {
        question4Inner1.style.display = 'block';
        question4Inner2.style.display = 'block';
    } else {
        question4Inner1.style.display = 'none';
        question4Inner2.style.display = 'none';
        deselect("question4-in1");
        deselect("question4-in2");
    }
}