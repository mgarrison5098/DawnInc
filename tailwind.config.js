const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const colors = require('tailwindcss/colors')
module.exports = {
    // mode: 'jit',
    // purge: {
    //     layers: [],
    //     content: [
    //         './*/*.php',
    //         './**/*.php',
    //         './resources/css/*.css',
    //         './resources/js/*.js',
    //         './safelist.txt'
    //     ],
    //     whitelistPatterns: [/^text-/],
    // },
    variants: {
        extend: {
          // ...
         translate: ['active', 'group-hover', 'hover'],
         transform: ['hover', 'focus'],
        }
    },
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme))
        },
        screens: {
            'xs': '300px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': tailpress.theme('settings.layout.wideSize', theme),
        },
        fontFamily: {
            // 'bold': ['Oswald', 'ui-sans-serif', 'system-ui'],
            'body': ['Chivo', 'ui-sans-serif', 'system-ui'],
            // 'body': ['Lato', 'ui-sans-serif', 'system-ui'],
            'bold': ['Overpass', 'ui-sans-serif', 'system-ui'],
        },
        colors: {
            'dawn': {  DEFAULT: '#0EA5E9',  '50': '#DFF4FD',  '100': '#C7EBFC',  '200': '#97DAF9',  '300': '#67CAF6',  '400': '#37B9F3',  '500': '#0EA5E9',  '600': '#0B83B9',  '700': '#086189',  '800': '#053F59',  '900': '#021D29'},
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
        },
        borderColor: theme => ({
            ...theme('colors'),
        }),
    },
    plugins: [
        tailpress.tailwind,
        require('tailwind-safelist-generator')({
            patterns: [
              'text-{maxWidth}',
              'uppercase',
              'italic',
              'max-w-{maxWidth}',
              'min-w-{minWidth}',
              'max-h-{maxHeight}',
              'min-h-{minHeight}',
              'h-{height}',
              'w-{width}',
              'm-{margin}',
              'p-{padding}',
              'mx-{margin}',
              'px-{padding}',
              'my-{margin}',
              'py-{padding}',
            ],
        }),
    ]
};
