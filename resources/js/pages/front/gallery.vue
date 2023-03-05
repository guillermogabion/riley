<template>
      <v-card
      class="pa-6 ma-10"
      >
            <div
            style="display: flex; justify-content: center; align-items: center;"
            >
                <span style="font-size: 50px;">
                    Gallery
                </span>
            </div>

           <v-row>
                <v-col
                v-for="item in items"
                :key="item.id"
                class="d-flex child-flex"
                cols="4" :lg="2" :sm="8" :md="2" :xs="10" 
                >
                <v-img
                    :src="item.photo"
                    :lazy-src="item.photo"
                    aspect-ratio="1"
                    class="grey lighten-2"
                >
                    <template v-slot:placeholder>
                    <v-row
                        class="fill-height ma-0"
                        align="center"
                        justify="center"
                    >
                        <v-progress-circular
                        indeterminate
                        color="grey lighten-5"
                        ></v-progress-circular>
                    </v-row>
                    </template>
                </v-img>
                </v-col>
            </v-row>
        </v-card>
</template>
<script>
import axiosInstance1 from '../../plugins/axios2'
export default {
    data() {
        return {
            gallery: false,
            items : [],
          
        }
    },
    mounted() {
        this.getPictures()
    },
    methods : {
        getPictures(){
           axiosInstance1.get('getGalleries').then(response => {
                console.log(response.data)
                this.items = response.data
            })
      }, 
     
    },
   
}
</script>