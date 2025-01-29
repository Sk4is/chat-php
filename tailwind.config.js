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
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    1: "#012A4A",
                    2: "#013A63",
                    3: "#01497C",
                    4: "#014F86",
                    5: "#2A6F97",
                    6: "#2C7DA0",
                    7: "#468FAF",
                    8: "#61A5C2",
                    9: "#89C2D9",
                    10: "#A9D6E5",
                },
            },
        },
    },
    plugins: [],
};
