// https://nuxt.com/docs/api/configuration/nuxt-config

export default defineNuxtConfig({
    devtools: {enabled: true},
    app: {
        head: {
            'title': 'Мое Nuxt.js приложение',
            'meta': [
                {'charset': 'utf-8'},
                {'name': 'viewport', content: 'width=device-width, initial-scale=1'},
                {'hid': 'description', name: 'description', content: 'Мое замечательное Nuxt.js приложение'}
            ],
            link: [
                {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
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
