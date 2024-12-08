import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import Layout from "./Layouts/Layout.vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/src/js";

createInertiaApp({
    title: (title) => `${title} - Nexora`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];

        if (page.default.layout === undefined) {
            page.default.layout = Layout;
        } else if (page.default.layout === null) {
            page.default.layout = null;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#29d",
        showSpinner: false,
        includeCSS: true,
    },
});
