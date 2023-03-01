<template>
    <div>
      <v-navigation-drawer
        v-model="drawer"
        app
        temporary
        dark
        >
        <v-list>
            <v-list-item>
            <v-list-item-avatar>
                <!-- <img src="../../assets/logo.png" alt="Logo" /> -->
            </v-list-item-avatar>
            <v-list-item-content>
                <v-list-item-title class="title">Riley's Catering</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </v-list>
        <v-divider />
        <v-list dense>
            <v-list-item
            v-for="([icon, text, link], i) in items"
            :key="i"
            link
            @click="$vuetify.goTo(link)"
            >
            <v-list-item-icon>
                <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title class="subtitle-1">{{
                text
                }}</v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </v-list>
      </v-navigation-drawer>
      <v-app-bar
      app
      :color="color"
      :flat="flat"
      dark
      class="px-15"
      :class="{ expand: flat }"
      >
        <!-- <v-avatar
        color="white"
        size="50"
        >
          <v-img
          :src="logo"
          contain
          />
        </v-avatar> -->
        <v-spacer></v-spacer>
        <v-app-bar-nav-icon
            @click.stop="drawer = !drawer"
            v-if="isXs"
        />
        <div v-else>
          <v-btn text @click="$vuetify.goTo('#hero')">
          <span class="mr-2">Home</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#services')">
          <span class="mr-2">Services</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#about')">
            <span class="mr-2">About</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#faq')">
          <span class="mr-2">FAQ</span>
          </v-btn>
        </div>
      </v-app-bar>
    </div>
</template>

<script>
// import logo from '../../assets/logo.png'
export default {
  data: () => ({
    drawer: null,
    isXs: false,
    items: [
      ["mdi-home-outline", "Home", "#hero"],
      ["mdi-information-outline", "Services", "#services"],
      ["mdi-information-outline", "About", "#about"],
      ["mdi-comment-question-outline", "Services", "#faq"],
    ],
  }),
  props: {
    color: String,
    flat: Boolean,
  },
  methods: {
    onResize() {
      this.isXs = window.innerWidth < 850;
    },
  },

  watch: {
    isXs(value) {
      if (!value) {
        if (this.drawer) {
          this.drawer = false;
        }
      }
    },
  },
  mounted() {
    this.onResize();
    window.addEventListener("resize", this.onResize, { passive: true });
  },
};
</script>