export default {
    state: {
        title: '',
        breadcrumbsTitle: '',
        desc: '',
        afterTitle: '',
        breadcrumbs: [],
        meta: {
            title: '',
        },
        cls: '',
        postTitle: '',
        postfix: 'App'
    },
    mutations: {
        postTitle(state, arg) {
            state.postTitle = arg;
        },
        page(state, page) {
            if (page.title !== 'prev_rt') {
                state.title = page.title;
                state.desc = page.desc ? page.desc : '';
            } else {
                if (!state.title) {
                    state.title = page.title;
                }
                if (!state.desc) {
                    state.desc = page.desc;
                }
            }
            state.breadcrumbsTitle = page.breadcrumbsTitle ? page.breadcrumbsTitle : state.title;
            state.afterTitle = page.afterTitle ? page.afterTitle : '';

            let metaIsSet = false;

            if (page.meta_title) {
                state.meta.title = page.meta_title;
                metaIsSet = true;
            }
            if (!metaIsSet) {
                state.meta.title = page.title + ' | '+state.postfix;
            }
            state.breadcrumbs = page.breadcrumbs ? page.breadcrumbs : [];
            document.title = state.meta.title;
        },
    }
}
