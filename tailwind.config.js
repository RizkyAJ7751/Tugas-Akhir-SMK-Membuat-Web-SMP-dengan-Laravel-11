import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#FFFFFF', // Putih
                secondary: '#16a34a', // Hijau
                'secondary-light': '#22c55e',
                'secondary-dark': '#15803d',
            },
            backgroundImage: {
                'gradient-green': 'linear-gradient(135deg, #16a34a 0%, #22c55e 50%, #4ade80 100%)',
                'gradient-green-hover': 'linear-gradient(135deg, #15803d 0%, #16a34a 50%, #22c55e 100%)',
            },
        },
    },

    plugins: [forms],
};
