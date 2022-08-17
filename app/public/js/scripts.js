// FIX TO DRY :/
/* -- a11y menu -- */
const a11yButton = document.getElementById('a11y-options');
const a11yButtonExpanded = document.getElementById('a11y-options-expanded');
let expanded = false;

function a11yMenu() {
    if (!expanded) {
        a11yButton.style.transform = 'translateX(-180px)';
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

/* -- a11y options contrast + doprogramowac klawiature do opcji -- */
let theme = localStorage.getItem('theme') || 'standard';
const stdContrast = document.getElementById('contrast-std');
const highContrast = document.getElementById('contrast-high');
// const darkMode = document.getElementById('dark-mode');
const contrastInfo = document.getElementById('contrast-info');

stdContrast.addEventListener('click', () => {
    document.querySelector('body').classList.remove('contrasty');
    contrastInfo.textContent = 'Normalny kontrast';
    stdContrast.style.backgroundColor = 'rgba(4, 116, 191, 0.3)'
    // highContrast.classList.remove('active-a11y');
    highContrast.style.backgroundColor = 'transparent';
    // stdContrast.classList.add('active-a11y');
    theme = 'standard'
    localStorage.setItem('theme', theme);
});

highContrast.addEventListener('click', () => {
    document.querySelector('body').classList.add('contrasty');
    contrastInfo.textContent = 'Wysoki kontrast';
    highContrast.style.backgroundColor = 'rgba(4, 116, 191, 0.3)'
    // stdContrast.classList.remove('active-a11y');
    stdContrast.style.backgroundColor = 'transparent';
    // highContrast.classList.add('active-a11y');
    theme = 'contrasty';
    localStorage.setItem('theme', theme);
});

if (theme === 'contrasty') {
    document.querySelector('body').classList.add('contrasty');
    highContrast.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
    stdContrast.style.backgroundColor = 'transparent';
    contrastInfo.textContent = 'Wysoki kontrast';
}
if (theme === 'standard') {
    document.querySelector('body').classList.remove('contrasty');
    stdContrast.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
    highContrast.style.backgroundColor = 'transparent';
    contrastInfo.textContent = 'Normalny kontrast';
}

/* -- a11y options font size + doprogramowac klawiature do opcji + poprawic, zeby sie zapisywalo w sesji -- */
let fontSize = localStorage.getItem('fontSize') || 'standard';
const stdFont = document.getElementById('font-std');
const smallFont = document.getElementById('font-small');
const bigFont = document.getElementById('font-big');
let defaultFontSize = window.getComputedStyle(document.body, null).getPropertyValue('font-size');
const fontSizeInfo = document.getElementById('size-info');


$(document).ready(function() {
    $(stdFont).click(function() {
        $('html').css('font-size', '1em');
        stdFont.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        smallFont.style.backgroundColor = 'transparent';
        bigFont.style.backgroundColor = 'transparent';
        fontSizeInfo.textContent = 'Normalna wielkość';
        fontSize = 'standard';
        localStorage.setItem('fontSize', fontSize);
    });

    $(smallFont).click(function() {
        $('html').css('font-size', '0.7em');
        stdFont.style.backgroundColor = 'transparent';
        smallFont.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        bigFont.style.backgroundColor = 'transparent';
        fontSizeInfo.textContent = 'Mały font';
        fontSize = 'small';
        localStorage.setItem('fontSize', fontSize);
    });

    $(bigFont).click(function() {
        $('html').css('font-size', '1.3em');
        stdFont.style.backgroundColor = 'transparent';
        smallFont.style.backgroundColor = 'transparent';
        bigFont.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        fontSizeInfo.textContent = 'Duży font';
        fontSize = 'big';
        localStorage.setItem('fontSize', fontSize);
    });

    if (fontSize === 'standard') {
        $(stdFont).click(function() {
            $('html').css('font-size', '1em');
        });
    }

    if (fontSize === 'small') {
        $(smallFont).click(function() {
            $('html').css('font-size', '0.7em');
        });
    }

    if (fontSize === 'big') {
        $(bigFont).click(function() {
            $('html').css('font-size', '1.3em');
        });
    }
});

/* -- a11y options font space + doprogramowac klawiature do opcji + zgodnie z WCAG 2.1 + poprawic, zeby sie zapisywalo w sesji -- */
const stdSpace = document.getElementById('space-std');
const bigSpace = document.getElementById('space-big');
const biggerSpace = document.getElementById('space-bigger');
const html_tag = document.getElementsByTagName('html');
const SpaceInfo = document.getElementById('space-info');
// letter-spacing, line-height, word-spacing
$(document).ready(function() {
    $(stdSpace).click(function() {
        $(html_tag).css('line-height', 'normal');
        $(html_tag).css('letter-spacing', 'normal');
        $(html_tag).css('word-spacing', 'normal');
        stdSpace.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        bigSpace.style.backgroundColor = 'transparent';
        biggerSpace.style.backgroundColor = 'transparent';
        SpaceInfo.textContent = 'Normalny odstęp';
    });

    $(bigSpace).click(function() {
        $(html_tag).css('line-height', '1.5em');
        $(html_tag).css('letter-spacing', '0.12em');
        $(html_tag).css('word-spacing', '0.16em');
        stdSpace.style.backgroundColor = 'transparent';
        bigSpace.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        biggerSpace.style.backgroundColor = 'transparent';
        SpaceInfo.textContent = 'Duży odstęp';
    });

    $(biggerSpace).click(function() {
        $(html_tag).css('line-height', '2em');
        $(html_tag).css('letter-spacing', '0.24em');
        $(html_tag).css('word-spacing', '0.32em');
        stdSpace.style.backgroundColor = 'transparent';
        bigSpace.style.backgroundColor = 'transparent';
        biggerSpace.style.backgroundColor = 'rgba(4, 116, 191, 0.3)';
        SpaceInfo.textContent = 'Większy odstęp';
    });
});


/* -- scroll to top -- */
scrollBtn = document.getElementById('scroll-btn');

window.onscroll = function() {
    if (document.body.scrollTop > 3000 || document.documentElement.scrollTop > 3000) {
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


    <!-- F’in sweet Webflow Hacks -->
    // set a short timeout before taking action
    // to allow hash to be set
    setTimeout(()=>{
    // uses HTML5 history API to manipulate the location bar
    history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
}, 5); // 5 millisecond timeout in this case


/* --- hamburger menu --- */
/*
const hamb = document.getElementById('hamb');
const closeHamb = document.getElementById('close-hamb');

hamb.addEventListener('click', () => {
    document.getElementById("myNav").style.width = "45%";
});
closeHamb.addEventListener('click', () => {
    document.getElementById("myNav").style.width = "0%";
});*/
