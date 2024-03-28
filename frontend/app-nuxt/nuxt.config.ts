// https://nuxt.com/docs/api/configuration/nuxt-config

export default defineNuxtConfig({
    devtools: {enabled: true},
    app: {
        head: {
            'title': 'СТРОЙ ЭКСПЕРТ',
            link: [
                {rel: 'icon', type: 'image/x-icon', href: '/images/favicon.ico'}
            ]
        }
    },
    alias: {
        "~": "/<srcDir>",
        "@": "/<srcDir>",
        "~~": "/<rootDir>",
        "@@": "/<rootDir>",
        "assets": "/<srcDir>/assets",
        "public": "/<srcDir>/public"
    },
})
