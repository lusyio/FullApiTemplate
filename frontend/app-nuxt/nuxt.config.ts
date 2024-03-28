// https://nuxt.com/docs/api/configuration/nuxt-config

export default defineNuxtConfig({
    devtools: {enabled: true},
    alias: {
        "~": "/<srcDir>",
        "@": "/<srcDir>",
        "~~": "/<rootDir>",
        "@@": "/<rootDir>",
        "assets": "/<srcDir>/assets",
        "public": "/<srcDir>/public"
    },
})
