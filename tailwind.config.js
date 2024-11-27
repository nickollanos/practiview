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
                pompiere: ['pompiere', 'sans-serif'],
                poppins: ['poppins', 'sans-serif'],
            },
            fonts: {
                pompiere: {100: '../fonts/Pompiere-Regular.ttf'},
                poppins: {
                  100: '../fonts/Poppins-Thin.ttf',
                  200: '../fonts/Poppins-ExtraLight.ttf',
                  300: '../fonts/Poppins-Light.ttf',
                  400: '../fonts/Poppins-Regular.ttf',
                  500: '../fonts/Poppins-Medium.ttf',
                  600: '../fonts/Poppins-SemiBold.ttf',
                  700: '../fonts/Poppins-Bold.ttf',
                  800: '../fonts/Poppins-ExtraBold.ttf',
                  900: '../fonts/Poppins-Black.ttf',
                },
            },
        },
    },

    plugins: [forms],
};
