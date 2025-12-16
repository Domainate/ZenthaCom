const fs = require("fs");
const path = require("path");
const config = require("./config");

const outFile = path.join(__dirname, "css", "global.css");
const outFileMin = path.join(__dirname, "css", "global.min.css");

function createDir() {
    const dir = path.join(__dirname, "css");
    if (!fs.existsSync(dir)) fs.mkdirSync(dir);
}

function writeCSS(content) {
    fs.writeFileSync(outFile, content);
    console.log(`✅ Generated: ${outFile}`);

    const minifiedContent = minifyCSS(content);
    fs.writeFileSync(outFileMin, minifiedContent);
    console.log(`✅ Generated: ${outFileMin}`);
}

function minifyCSS(css) {
    return css
        .replace(/\/\*[\s\S]*?\*\//g, "") // remove comments
        .replace(/(\r\n|\n|\r)/gm, "")   // remove newlines
        .replace(/\s\s+/g, ' ');         // replace multiple spaces with single space
}

function generateResponsiveClass(className, css) {
    let result = `.${className} { ${css} }\n`;

    for (const bp in config.breakpoints) {
        result += `@media (min-width: ${config.breakpoints[bp]}) {
      .${bp}\\:${className} { ${css} }
    }\n`;
    }
    return result;
}

function generateFlex() {
    return `
    /* Flex Utilities */
    ${generateResponsiveClass("flex", "display:flex;")}
    ${generateResponsiveClass("grid", "display:grid;")}
    ${generateResponsiveClass("flex-row", "flex-direction:row;")}
    ${generateResponsiveClass("flex-col", "flex-direction:column;")}
    ${generateResponsiveClass("flex-wrap", "flex-wrap:wrap;")}
    ${generateResponsiveClass("flex-nowrap", "flex-wrap:nowrap;")}
    ${generateResponsiveClass("justify-center", "justify-content:center;")}
    ${generateResponsiveClass("justify-between", "justify-content:space-between;")}
    ${generateResponsiveClass("items-center", "align-items:center;")}
    ${generateResponsiveClass("items-start", "align-items:flex-start;")}
    ${generateResponsiveClass("items-end", "align-items:flex-end;")}
  `;
}

function generateGrid() {
    let css = "";
    for (let i = 1; i <= 12; i++) {
        css += generateResponsiveClass(`grid-cols-${i}`, `grid-template-columns:repeat(${i},minmax(0,1fr));`);
        css += generateResponsiveClass(`col-span-${i}`, `grid-column:span ${i} / span ${i};`);
    }
    return css;
}

function generateSpacing() {
    let css = "";
    config.spacing.forEach((s) => {
        const val = `${s * 0.25}rem`;
        css += generateResponsiveClass(`p-${s}`, `padding:${val};`);
        css += generateResponsiveClass(`m-${s}`, `margin:${val};`);
        css += generateResponsiveClass(`gap-${s}`, `gap:${val};`);
    });
    return css;
}

function generateTypography() {
    let css = "";
    Object.entries(config.fontSizes).forEach(([name, size]) => {
        css += generateResponsiveClass(`text-${name}`, `font-size:${size};`);
    });
    Object.entries(config.fontWeights).forEach(([name, weight]) => {
        css += generateResponsiveClass(`font-${name}`, `font-weight:${weight};`);
    });
    css += `
    ${generateResponsiveClass("text-left", "text-align:left;")}
    ${generateResponsiveClass("text-center", "text-align:center;")}
    ${generateResponsiveClass("text-right", "text-align:right;")}
    ${generateResponsiveClass("text-justify", "text-align:justify;")}
  `;
    return css;
}

function generateBackgrounds() {
    let css = "";
    Object.entries(config.colors).forEach(([name, val]) => {
        if (typeof val === "string") {
            css += generateResponsiveClass(`bg-${name}`, `background-color:${val};`);
        } else {
            Object.entries(val).forEach(([shade, color]) => {
                css += generateResponsiveClass(`bg-${name}-${shade}`, `background-color:${color};`);
            });
        }
    });
    return css;
}

function generateCursors() {
    return `
    ${generateResponsiveClass("cursor-pointer", "cursor:pointer;")}
    ${generateResponsiveClass("cursor-default", "cursor:default;")}
    ${generateResponsiveClass("cursor-wait", "cursor:wait;")}
    ${generateResponsiveClass("cursor-move", "cursor:move;")}
    ${generateResponsiveClass("cursor-not-allowed", "cursor:not-allowed;")}
  `;
}

function generateBorders() {
    let css = `
    /* Border Utilities */
    ${generateResponsiveClass("border", "border-width: 1px; border-style: solid;")}
    ${generateResponsiveClass("border-0", "border-width: 0;")}
    ${generateResponsiveClass("border-2", "border-width: 2px;")}
    ${generateResponsiveClass("border-4", "border-width: 4px;")}
    ${generateResponsiveClass("border-8", "border-width: 8px;")}

    ${generateResponsiveClass("border-solid", "border-style:solid;")}
    ${generateResponsiveClass("border-dashed", "border-style:dashed;")}
    ${generateResponsiveClass("border-dotted", "border-style:dotted;")}
    ${generateResponsiveClass("border-double", "border-style:double;")}
    ${generateResponsiveClass("border-none", "border-style:none;")}
  `;

    Object.entries(config.colors).forEach(([name, val]) => {
        if (typeof val === "string") {
            css += generateResponsiveClass(`border-${name}`, `border-color:${val};`);
        } else {
            Object.entries(val).forEach(([shade, color]) => {
                css += generateResponsiveClass(`border-${name}-${shade}`, `border-color:${color};`);
            });
        }
    });

    css += `
    ${generateResponsiveClass("rounded-none", "border-radius: 0;")}
    ${generateResponsiveClass("rounded-sm", "border-radius: 0.125rem;")}
    ${generateResponsiveClass("rounded", "border-radius: 0.25rem;")}
    ${generateResponsiveClass("rounded-md", "border-radius: 0.375rem;")}
    ${generateResponsiveClass("rounded-lg", "border-radius: 0.5rem;")}
    ${generateResponsiveClass("rounded-xl", "border-radius: 0.75rem;")}
    ${generateResponsiveClass("rounded-2xl", "border-radius: 1rem;")}
    ${generateResponsiveClass("rounded-3xl", "border-radius: 1.5rem;")}
    ${generateResponsiveClass("rounded-full", "border-radius: 9999px;")}
  `;

    return css;
}

function generateShadows() {
    let css = `
    /* Shadow Utilities */
    ${generateResponsiveClass("shadow-sm", "box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);")}
    ${generateResponsiveClass("shadow", "box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);")}
    ${generateResponsiveClass("shadow-md", "box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);")}
    ${generateResponsiveClass("shadow-lg", "box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);")}
    ${generateResponsiveClass("shadow-xl", "box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);")}
    ${generateResponsiveClass("shadow-2xl", "box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);")}
    ${generateResponsiveClass("shadow-inner", "box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);")}
    ${generateResponsiveClass("shadow-none", "box-shadow: none;")}
  `;
    return css;
}

function buildCSS() {
    let css = "/* === Generated Tailwind-like CSS === */\n";

    if (config.enable.flex) css += generateFlex();
    if (config.enable.grid) css += generateGrid();
    if (config.enable.spacing) css += generateSpacing();
    if (config.enable.typography) css += generateTypography();
    if (config.enable.backgrounds) css += generateBackgrounds();
    if (config.enable.cursor) css += generateCursors();
    if (config.enable.borders) css += generateBorders();
    if (config.enable.shadows) css += generateShadows();

    return css;
}

createDir();
writeCSS(buildCSS());
