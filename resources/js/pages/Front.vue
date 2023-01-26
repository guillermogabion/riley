<template>
    <v-app>
        <navigation :color="color" :flat="flat" />
        <v-main class="pt-0">
            <home />
            <services />
        </v-main>
        <v-scale-transition>
        <v-btn
            fab
            v-show="fab"
            v-scroll="onScroll"
            dark
            fixed
            bottom
            right
            color="secondary"
            @click="toTop"
        >
            <v-icon>mdi-arrow-up</v-icon>
        </v-btn>
        </v-scale-transition>
    </v-app>
</template>
<style scoped>
.v-main {
  /* background-image: url("../assets/bgMain.png"); */
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
}
</style>

<script>
import navigation from './front/Navigation.vue'
import home from './front/Home.vue'
import services from './front/Services.vue'


export default {
    data: () => ({
        fab: null,
        color: "",
        flat: null,
    }),
    created() {
        const top = window.pageYOffset || 0;
        if (top <= 60) {
        this.color = "transparent";
        this.flat = true;
        }
    },
    watch: {
        fab(value) {
        if (value) {
            this.color = "secondary";
            this.flat = false;
        } else {
            this.color = "transparent";
            this.flat = true;
        }
        },
    },
    methods: {
        onScroll(e) {
            if (typeof window === "undefined") return;
            const top = window.pageYOffset || e.target.scrollTop || 0;
            this.fab = top > 60;
        },
        toTop() {
            this.$vuetify.goTo(0);
        },
    },
    components : {
        navigation,
        home,
        services,
    }
}
</script>