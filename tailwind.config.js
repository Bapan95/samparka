import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/**/*.blade.php',  // Added for deeply nested views or components
        './resources/js/**/*.js',               // Added for JavaScript files
        './resources/views/components/**/*.blade.php', // Added for Blade components
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    darkMode: 'class', // Enables toggling dark mode via a class (e.g., <html class="dark">)

    plugins: [forms],
};
