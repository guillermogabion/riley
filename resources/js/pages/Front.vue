<template>
    <div id="app2">
    <v-app>
        <navigation :color="color" :flat="flat" />
        <v-main class="pt-0">
            <home />
            <services />
            <gallery />
            <foodpic /> 
            <about/>
            <faq />
            <v-footer
                dark
                padless
            >
                <v-card
                class="flex"
                flat
                tile
                >
                <div align="center" class="justify-center pt-1">
                    <v-img
                        :src="footer_image"
                        height="70px"
                        width="70px"
                        class="rounded-lg"
                        ></v-img>
                </div>
                <v-card-text class="py-2 white--text text-center">
                    <span>8:00 AM to 7:00 PM | Monday to Sunday &nbsp &nbsp &nbsp &nbsp 520 M. Santos St. Sta Cruz Cavite City, Cavite</span> <br>
                    <span>Catering Services (CP No.) |  (CP No.)  |  (Tel. No.) </span>  <br>
                    <span>Food Order  (CP No.) |  (Tel. No.)</span>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                        <v-btn
                            v-for="icon in icons"
                            :key="icon"
                            class="mx-4"
                            dark
                            icon
                            >
                            <v-icon size="24px">
                                {{ icon }}
                            </v-icon>
                        </v-btn>
                    <v-spacer></v-spacer>
                </v-card-actions>
                </v-card>
            </v-footer>
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
</div>
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
import about from './front/About.vue'
import faq from './front/FAQ.vue'
import foodpic from './front/foodpic.vue'
import gallery from './front/gallery.vue'
import footer_image from '../assets/rileylogo.png'
import axios from '../plugins/axios'

export default {
    data: () => ({
        gallery : false,
        footer_image,
        fab: null,
        color: "",
        flat: null,
        icons: [
        'mdi-facebook',
        'mdi-instagram',
      ],
      items : [],
    }),
    created() {
        const top = window.pageYOffset || 0;
        if (top <= 60) {
        this.color = "transparent";
        this.flat = true;
        }
    },
    mounted() {
        this.getPictures()
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
        getPictures(){
            axios.get('getGalleries').then(response => {
                console.log(response.data)
                this.items = response.data
            })
      },
      openMe(){
        this.gallery = true
      }
    },
    components : {
        navigation,
        home,
        services,
        about,
        faq,
        gallery,
        foodpic
    }
}
</script>