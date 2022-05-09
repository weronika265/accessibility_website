const a11y_options_elem = document.getElementById('a11y-options');
let firstClick = true;

a11y_options_elem.addEventListener('click', function displayA11y() {
    if(firstClick) {
        document.body.style.backgroundColor = 'red';
        firstClick = false;
    }
    else {
        // document.body.style.removeProperty("backgroundColor");
        document.body.style.backgroundColor = null;
        firstClick = true;
    }
});

