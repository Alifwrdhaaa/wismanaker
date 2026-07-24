const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                // Kemnaker primary — Pantone 7546C (#2C4C63)
                kemnaker: {
                    50:  '#f0f6fa',
                    100: '#ddeaf2',
                    200: '#b3ccda',
                    300: '#7a9fb8',
                    400: '#4f7a9e',
                    500: '#3a6080',
                    600: '#2C4C63',
                    700: '#253f54',
                    800: '#1f3849',
                    900: '#1a2d3a',
                    950: '#0e1c25',
                },
                // Aksen emas premium
                gold: {
                    50:  '#fdf9f0',
                    100: '#faf0d7',
                    200: '#f3dfa6',
                    300: '#e8c07a',
                    400: '#D9A855',
                    500: '#C9923A',
                    600: '#b37d2c',
                    700: '#8f6020',
                    800: '#6e4a1a',
                    900: '#4f3514',
                },
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.8s ease-out',
                'float': 'float 6s ease-in-out infinite',
                'slide-in': 'slideIn 0.3s ease-out',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                slideIn: {
                    '0%': { opacity: 0, transform: 'translateX(-10px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
            },
            boxShadow: {
                'kemnaker': '0 4px 20px rgba(44, 76, 99, 0.3)',
                'kemnaker-lg': '0 8px 40px rgba(44, 76, 99, 0.4)',
                'gold': '0 4px 20px rgba(201, 146, 58, 0.3)',
            },
        },
    },

    plugins: [forms],
};
