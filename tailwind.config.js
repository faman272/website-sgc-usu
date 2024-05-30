import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
                Bayon: ['Bayon', ...defaultTheme.fontFamily.sans],
                Poetsen: ['Poetsen One', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#EFF9F1',
                'accent': '#08A243',
                'accent2': '#53B175'
            }
        },
    },

    plugins: [forms, require('flowbite/plugin')],
};
