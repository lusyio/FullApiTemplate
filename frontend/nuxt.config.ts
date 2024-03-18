// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: { enabled: true },
    experimental: {
        typedPages: true
    },
    modules: [
        // ...
        '@pinia/nuxt',
        '@nuxtjs/tailwindcss'
    ],
})
