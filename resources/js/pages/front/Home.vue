<template>
    <section id="hero">
        
        <v-parallax
            height="700"
            :src="hero"
            class="bottom-spacing"
            contain
        >
            <v-row>
                <v-col>
                    <v-col>
                        <div>
                            <span class="wpr top"><span class="small-title">Riley's Catering Services</span></span>
                            <span class="wpr"><span class="big-title">One of the best</span></span>
                            <span class="wpr"><span class="big-title">food catering</span></span>
                            <span class="wpr"><span class="big-title">and events services</span></span>
                            <span class="wpr"><span class="big-title">in Region IV-A</span></span>

                         
                            <span class="wpr bottom-1 small-title">Excellent cuisine and catering tailored to your</span>
                            <span class="wpr bottom small-title">preferences and budget.</span>
                           
                            <v-btn
                                rounded
                                outlined
                                large
                                @click="$vuetify.goTo('#services')"
                                class="mt-5 wpr buttoned from-left"
                            >
                                Explore Now
                                <v-icon class="ml-2">mdi-arrow-down</v-icon>
                            </v-btn>
                        </div>
                        
                       
                    </v-col>
                </v-col>
                <v-col>
                </v-col>
            </v-row>
        </v-parallax>
        <!-- <v-parallax
            height="800"
            :src="hero"
            jumbotron
            fade-img-on-scroll
        >
    dawdaw
    </v-parallax> -->
    <div class="my-3 mx-2">

        <v-row class="mx-5">
            <v-col>
                <v-img
                    :src="image"
                    height="500px"
                    width="860px"
                    class="rounded-lg rounded-img"
                ></v-img>
            </v-col>
            <v-col>
                <v-row align="center"
                justify="center" class="font-weight-bold content top">EVENT WE CATER</v-row>

                <v-row>
                    <p align="center" class="text-content my-4"> Our years of experience and attention to detail ensure that all of your catering needs are met flawlessly. 
                        We are always ready to serve our clients, whether it is a small gathering of fifty people or a large event with hundreds of people.
                    </p>
                </v-row>
            </v-col>
        </v-row>
    </div>
    <div class="my-3 mx-2">

        <v-row>
            <v-col
            class="ma-4"
            >
                <v-sheet>
                    <v-row align="center"
                    justify="center" class="font-weight-bold content top">EVENT THEMES</v-row>

                    <p align="center" class="text-content my-4">Looking to create a one-of-a-kind and lovely atmosphere for your event?</p>
                    <p align="center" class="text-content my-4">Our event stylists will collaborate with you to create the look and feel you want. Find ideas for your event by looking through our past event styles and designs.</p>
                    <div align="center">
                       <v-btn
                       color="yellow"
                       @click="ClickMe()"
                       >View Our Themes Collection</v-btn>
                    </div>
                    
                </v-sheet>
            </v-col>
            <v-col
            class="ma-4"
            >
                <v-img
                :src="image"
                height="500px"
                width="860px"
                class="rounded-lg rounded-img"
                ></v-img>
            </v-col>
        </v-row>
    </div>
    <div class="my-3 mx-2">

        <v-row class="mx-5">
            <v-col>
                <v-img
                :src="image3"
                height="500px"
                width="860px"
                class="rounded-lg rounded-img"
                style="border-radius: 10px 0 0 10px;"
                ></v-img>
            </v-col>
            <v-col>
                <v-row align="center"
                justify="center" class="font-weight-bold content top">FOOD ORDER and DELIVERY</v-row>
               <p align="center" class="text-content my-4">Our priority is always quality food, cooked to perfection and delivered safely and on time.</p>
               <p align="center" class="text-content my-4">Browse food packed and food trays that are perfect for 10 pax!</p>
               <div align="center">
                    <v-btn
                    @click="$vuetify.goTo('#services')"
                    color="yellow"
                    >Order Now</v-btn>
                </div>
            </v-col>
            {{ this.items }}
        </v-row>
    </div>
     <div class="my-3 mx-2">

        <v-row>
            <v-col
            class="ma-4"
            >
                <v-sheet>
                    <v-row align="center"
                    justify="center" class="font-weight-bold content top">Party needs Rental</v-row>

                    <p align="center" class="text-content my-4">As One of the best food catering and events services in the Region IV-A. Riley’s Catering Services is committed to providing rentals of party needs for your events.</p>
                    <div align="center">
                       <v-btn
                       color="yellow"
                       @click="$vuetify.goTo('#services')"
                       >Rent Now!</v-btn>
                    </div>
                    
                </v-sheet>
            </v-col>
            <v-col
            class="ma-4"
            >
                <v-img
                :src="image"
                height="500px"
                width="860px"
                class="rounded-lg rounded-img"
                ></v-img>
            </v-col>
        </v-row>
    </div>

   
    </section>
</template>
<script>
import hero from '../../assets/front/theme15.4.jpg'
import image from '../../assets/front/theme13.4.jpg'
import image2 from '../../assets/front/theme13.4.jpg'
import image3 from '../../assets/food/cover_food.jpg'
import axios from '../../plugins/axios'


export default {
    data() {
        return {
            gallery: false,
            items : [],
            image,
            image2,
            image3,
            hero,
          
        }
    },
    // mounted() {
    //     this.getPictures()
    // },
    methods : {
        getPictures(){
            axios.get('getGalleries').then(response => {
                console.log(response.data)
                this.items = response.data
            })
      }, 
      ClickMe() {
        this.$emit("dialogs")
      }
    },
   
}
</script>
<style scoped>
    .bg-image {
    /* The image used */
        background-image: url("../../assets/front/theme15.4.jpg");

        /* Add the blur effect */
        filter: blur(5px);
        -webkit-filter: blur(3px);

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .big-title {
        font-size: 2.5vw;
        font-weight: bold;
        background: -webkit-linear-gradient(#d29002 ,  #a1fb12);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(2px 2px #333);
    }
    .small-title {
        font-size: 1vw;
        font-weight: bold;
        background: -webkit-linear-gradient(#d29002 ,  #9dd406);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(2px 2px #333);
    }
    .wpr
    {
        float:right;
        clear:both;
    }
    .top {
        padding-top: 5em;
    }
    .bottom-1 {
        padding-top: 2em;
    }
    .bottom {
        padding-top: 0em;
    }
    .buttoned {
        position: relative;	
        padding: 1.4rem 4.2rem;
        padding-right: 3.1rem;
        font-size: 1.4rem;
        color: var(--inv);
        text-transform: uppercase;
        transition: all 500ms cubic-bezier(0.77, 0, 0.175, 1);	
        cursor: pointer;
        user-select: none;
    }
    .buttoned:before, .buttoned:after {
	content: '';
	position: absolute;	
	transition: inherit;
	z-index: -1;
    }

    .buttoned:hover {
        color: var(--def);
        transition-delay: .5s;
    }

    .buttoned:hover:before {
        transition-delay: 0s;
    }

    .buttoned:hover:after {
        background: var(--inv);
        transition-delay: .35s;
    }
    .from-left:before, 
    .from-left:after {
        top: 0;
        width: 0;
        height: 100%;
    }

    .from-left:before {
        right: 0;
        border: 1px solid var(--inv);
        border-left: 0;
        border-right: 0;	
    }

    .from-left:after {
        left: 0;
    }

    .from-left:hover:before,
    .from-left:hover:after {
        width: 100%;
    }
    .text-content {
        font-size: 1vw;
        justify-content: center;
    }
    .content {
        font-size: 2vw;
    }
    .v-image__image, .v-image__placeholder{
    border-radius: 100%;
    }
    .rounded-img {
        border-radius: 150% !important; 
        height:500px;
        width:860px;
    }
    /* .bottom-spacing {
        margin-bottom: -3%;
    }
   */


    
</style>
