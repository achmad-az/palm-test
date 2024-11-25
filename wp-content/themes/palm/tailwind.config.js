const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

const customColorMapper = (colors) => {
    let result = {};

    colors.forEach(function(color) {
        result[''+color.slug+''] = color.colorVar;
    });

    return result;
}

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './assets/src/css/*.css',
        './assets/src/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                md: '2rem',
                lg: '0rem'
            },
        },
        fontFamily: {
            'Verdana': ['Verdana']
        },
        extend: {
            colors: customColorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            lineHeight: tailpress.fontSizeMapper(tailpress.theme('settings.typography.lineHeight', theme)),
            boxShadow: {
                'footer-input': '0px 2px 2px -1px rgba(74, 74, 104, 0.10) inset',
                'btn-prm-focus': '0 0 0 4px rgba(114, 191, 68, 0.20)',
                'coming-soon-img': '0px 0px 5px 3px rgba(22, 33, 20, 1) inset'
            }
        },
        screens: {
            '2xs': '393px',
            'xs': '480px',
            'sm': '600px',
            'md': '768px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),
            'xl': tailpress.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        }
    },
    plugins: [
        tailpress.tailwind
    ]
};
