<template>
    <div>
        <v-footer
            dark
            padless
        >
            <v-card
            class="flex"
            flat
            tile
            >
            <v-card-title class="black">
                <strong class="subheading"></strong>

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
            </v-card-title>

            <v-card-text class="py-2 white--text text-center">
                2021 — <strong>Riley's Catering Services</strong>
            </v-card-text>
            </v-card>
        </v-footer>    
    </div>
</template>
<script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-instagram',
      ],
    }),
  }
</script>