<!-- a11y menu -->
    const a11yButton = document.getElementById('a11y-options');
    const a11yButtonExpanded = document.getElementById('a11y-options-expanded');
    let expanded = false;

    function a11yMenu() {
    if (!expanded) {
    a11yButton.style.transform = 'translateX(-150px)';
    a11yButtonExpanded.style.display = 'block';
    expanded = true;
}

    else if (expanded) {
    a11yButton.style.transform = 'translateX(0px)';
    a11yButtonExpanded.style.display = 'none';
    expanded = false;
}
}
    // dodac anulowanie przez Esc
    a11yButton.addEventListener('click', a11yMenu);
    a11yButton.addEventListener('keydown', function(e) {
    if (e.code === 'Space' || e.code === 'Enter') {
    e.preventDefault();
    a11yMenu();
}
});

<!-- a11y options -->
    const stdContrast = document.getElementById('constrast-std');
    const highContrast = document.getElementById('constrast-high');
    const darkMode = document.getElementById('dark-mode');

    const stdSpace = document.getElementById('space-std');
    const smallSpace = document.getElementById('space-small');
    const bigSpace = document.getElementById('space-big');

    const stdFont = document.getElementById('font-std');
    const smallFont = document.getElementById('font-small');
    const bigFont = document.getElementById('font-big');

    let defaultFontSize = window.getComputedStyle(document.body, null).getPropertyValue('font-size');



    // function overwriteFont() {
    //     elem = String(elem) + 'px';
    //     document.getElementsByTagName('body').style.fontSize = elem;
    // }

    // stdFont.addEventListener('click', function() {
    //     elem = parseInt(defaultFontSize);
    //     overwriteFont();
    // });
    // smallFont.addEventListener('click', function() {
    //     elem = parseInt(elem);
    //     elem -= 10;
    //     overwriteFont();
    // });
    // bigFont.addEventListener('click', function() {
    //     elem = parseInt(elem);
    //     elem += 10;
    //     overwriteFont();
    // });

    // let defaultFontSize = window.getComputedStyle(document.body, null).getPropertyValue('font-size');
    // let elem = window.getComputedStyle(document.body, null).getPropertyValue('font-size');

    <!-- scroll to top -->
    scrollBtn = document.getElementById('scroll-btn');

    window.onscroll = function() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    scrollBtn.style.display = 'block';
}
    else {
    scrollBtn.style.display = 'none';
}
};

    function moveToTop() {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0; // Others
}

    scrollBtn.addEventListener('click', moveToTop);
    scrollBtn.addEventListener('keydown', function(e) {
    if (e.code === 'Space' || e.code === 'Enter') {
    e.preventDefault();
    moveToTop();
}
});