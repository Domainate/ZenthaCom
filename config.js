module.exports = {
    breakpoints: {
        xs: "475px",
        sm: "640px",
        md: "768px",
        lg: "1024px",
        xl: "1280px",
        "2xl": "1536px",
    },

    spacing: [0, 1, 2, 3, 4, 5, 6, 8, 10, 12, 16, 20],

    fontSizes: {
        xs: "0.75rem",
        sm: "0.875rem",
        base: "1rem",
        lg: "1.125rem",
        xl: "1.25rem",
        "2xl": "1.5rem",
        "3xl": "1.875rem",
        "4xl": "2.25rem",
        "5xl": "3rem",
    },

    fontWeights: {
        thin: 100,
        extralight: 200,
        light: 300,
        normal: 400,
        medium: 500,
        semibold: 600,
        bold: 700,
        extrabold: 800,
        black: 900,
    },

    colors: {
        transparent: "transparent",
        white: "#ffffff",
        black: "#000000",
        gray: {
            100: "#f7fafc",
            200: "#edf2f7",
            300: "#e2e8f0",
            400: "#cbd5e0",
            500: "#a0aec0",
            600: "#718096",
            700: "#4a5568",
            800: "#2d3748",
            900: "#1a202c",
        },
        red: { 500: "#ef4444" },
        green: { 500: "#22c55e" },
        blue: { 500: "#3b82f6" },
        yellow: { 500: "#eab308" },
    },

    enable: {
        flex: true,
        grid: true,
        spacing: true,
        typography: true,
        backgrounds: true,
        cursor: true,
    },
};
