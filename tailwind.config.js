import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Manrope', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    1: '#A9D6E5',
                    2: '#89C2D9',
                    3: '#61A5C2',
                    4: '#468FAF',
                    5: '#2C7DA0',
                    6: '#2A6F97',
                    7: '#014F86',
                    8: '#01497C',
                    9: '#013A63',
                    10: '#012A4A',
                },
            },
        },
    },
    plugins: [],
};
