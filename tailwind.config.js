const defaultTheme = require('tailwindcss/defaultTheme');
const { colors: defaultColors } = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],
    safelist: [
        'bg-blue-600',
        'bg-blue-700',
        'bg-green-600',
        'bg-green-700',
        'bg-purple-600',
        'bg-purple-700',
        'bg-red-600',
        'bg-red-700',
      ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
