<!-- a11y menu -->
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


<!-- a11y options contrast + doprogramowac klawiature do opcji -->
let theme = localStorage.getItem('theme') || 'standard';
const stdContrast = document.getElementById('contrast-std');
const highContrast = document.getElementById('contrast-high');
// const darkMode = document.getElementById('dark-mode');

stdContrast.addEventListener('click', () => {
    document.querySelector('body').classList.remove('contrasty');
    theme = 'standard'
    localStorage.setItem('theme', theme);
});

highContrast.addEventListener('click', () => {
    document.querySelector('body').classList.add('contrasty');
    theme = 'contrasty';
    localStorage.setItem('theme', theme);
});

if (theme === 'contrasty') {
    document.querySelector('body').classList.add('contrasty');
}
if (theme === 'standard') {
    document.querySelector('body').classList.remove('contrasty');
}
<!-- a11y options font size + doprogramowac klawiature do opcji + poprawic, zeby sie zapisywalo w sesji -->
let fontSize = localStorage.getItem('fontSize') || 'standard';
const stdFont = document.getElementById('font-std');
const smallFont = document.getElementById('font-small');
const bigFont = document.getElementById('font-big');
let defaultFontSize = window.getComputedStyle(document.body, null).getPropertyValue('font-size');

$(document).ready(function() {
    $(stdFont).click(function() {
        $('html').css('font-size', '1em');
        fontSize = 'standard';
        localStorage.setItem('fontSize', fontSize);
    });

    $(smallFont).click(function() {
        $('html').css('font-size', '0.7em');
        fontSize = 'small';
        localStorage.setItem('fontSize', fontSize);
    });

    $(bigFont).click(function() {
        $('html').css('font-size', '1.3em');
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

// if (fontSize === 'standard') {
//     $(document).ready(function() {
//         $(stdFont).click(function() {
//             $('html').css('font-size', '1em');
//         });
//     });
// }
// if (fontSize === 'small') {
//     $(document).ready(function() {
//         $(smallFont).click(function() {
//             $('html').css('font-size', '0.7em');
//         });
//     });
// }
// if (fontSize === 'big') {
//     $(document).ready(function() {
//         $(bigFont).click(function() {
//             $('html').css('font-size', '1.3em');
//         });
//     });
// }

<!-- a11y options font space + doprogramowac klawiature do opcji + zgodnie z WCAG 2.1 + poprawic, zeby sie zapisywalo w sesji -->
const stdSpace = document.getElementById('space-std');
const bigSpace = document.getElementById('space-big');
const biggerSpace = document.getElementById('space-bigger');
const html_tag = document.getElementsByTagName('html');
// letter-spacing, line-height, word-spacing
$(document).ready(function() {
    $(stdSpace).click(function() {
        $(html_tag).css('line-height', 'normal');
        $(html_tag).css('letter-spacing', 'normal');
        $(html_tag).css('word-spacing', 'normal');
    //    + między p
    });

    $(bigSpace).click(function() {
        $(html_tag).css('line-height', '1.5em');
        $(html_tag).css('letter-spacing', '0.12em');
        $(html_tag).css('word-spacing', '0.16em');
        //    + między p
    });

    $(biggerSpace).click(function() {
        $(html_tag).css('line-height', '2em');
        $(html_tag).css('letter-spacing', '0.24em');
        $(html_tag).css('word-spacing', '0.32em');
    });
});


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


//admin
// const opinions = document.getElementById('opinions');
// if(opinions) {
//     opinions.addEventListener('click', (e) => {
//         alert(1);
//     });
// }