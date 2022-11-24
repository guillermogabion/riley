<template>
    <div
    v-if="$is_user()"
    >

        <div>
            <v-card
            justify-center
            style="padding-left: 3em"
            elevation="0"
            >
            <v-card-text
            class="justify-center"
            style="padding-left: 3em"
            >
            <div
            class="center"
            >
            <v-img
            :lazy-src="logo"
            max-height="40%"
            max-width="80%"
            :src="logo"
           ></v-img>
        </div>
          
       </v-card-text>
       </v-card>
    </div>
    <div>
        <v-card>
            <div
            class="center"
            >
          
            <v-row>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                        <v-card
                        :elevation="hover ? 12 : 2"
                        class="pa-2"
                        >
                            <v-img
                            :src="fork"
                            max-height="350"
                            max-width="550"
                            >
                            </v-img>
                            <v-card-text>
                                <span
                                style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                >
                                    Catering Services
                                </span> 
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn>
                                    Book Now
                                </v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                        <v-card
                        :elevation="hover ? 12 : 2"
                        class="pa-2"

                        >
                            <v-img
                            :src="fork2"
                            max-height="350"
                            max-width="550"
                            >
                            </v-img>
                            <v-card-text>
                                <span
                                style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                >
                                    Food Tray Service
                                </span> 
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>

                                <v-btn>
                                    Order Now
                                </v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col> 
                    <v-hover
                    v-slot="{ hover }"
                    >
                        <v-card
                        :elevation="hover ? 12 : 2"
                        class="pa-2"

                        >
                            <v-img
                            :src="fork3"
                            max-height="350"
                            max-width="550"
                            >
                            </v-img>
                            <v-card-text>
                                <span
                                style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                >
                                    Party Supplies
                                </span> 
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn>
                                    Book Now
                                </v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>

                        </v-card>
                    </v-hover>  
                </v-col>
            </v-row>
            <v-row>
                <v-carousel v-model="model">
                    <v-carousel-item
                    v-for="(color, i) in colors"
                    :key="color"
                    >
                    <v-sheet
                        :color="color"
                        height="100%"
                        tile
                    >
                        <v-row
                        class="fill-height"
                        align="center"
                        justify="center"
                        >
                        <div class="text-h2">
                            Slide {{ i + 1 }}
                        </div>
                        </v-row>
                    </v-sheet>
                    </v-carousel-item>
                </v-carousel>
                <span>Featured Dish</span>
            </v-row>
            </div>
            <div
            class="center"
            >
                <span> Themes  </span>
            </div>
          
            <v-row
            class="ma-2"
            >
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >

                        <v-img
                        :src="pc1"
                        max-height="350"
                        max-width="550"
                        >
                    </v-img>
                    </v-card>
                    </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                        <v-img
                        :src="pc2"
                        height="349"
                        max-width="550"
                        >
                        </v-img>
                    </v-card>
                    </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                        <v-img
                        :src="pc3"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
            </v-row>
            <v-row
            class="ma-2"
            >
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc6"
                        max-height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc7"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc8"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
            </v-row>
            <v-row
            class="ma-2"
            >
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc4"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc5"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
                <v-col>
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                    :elevation="hover ? 20 : 2"
                    width="545"
                    >
                    <v-img
                        :src="pc9"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                        </v-card>
                        </v-hover>
                </v-col>
            </v-row>
            <v-row>
                <v-col>FAQ</v-col>
                <v-col>ABOUT</v-col>
                <v-col>CONTACT</v-col>
            </v-row>
           
        </v-card>
    </div>
</div>
<div
v-else
>
Page Not Found
</div>
</template>
<script>
import pc1 from '../assets/themes/theme1-1.jpg'
import pc2 from '../assets/themes/theme2-1.jpg'
import pc3 from '../assets/themes/theme3-1.jpg'
import pc4 from '../assets/themes/theme4-1.jpg'
import pc5 from '../assets/themes/theme5-1.jpg'
import pc6 from '../assets/themes/theme6-1.jpg'
import pc7 from '../assets/themes/theme7-1.jpg'
import pc8 from '../assets/themes/theme8-1.jpg'
import pc9 from '../assets/themes/theme9-1.jpg'
import pc10 from '../assets/themes/theme10-1.jpg'
import pc11 from '../assets/themes/theme11-1.jpg'
import pc12 from '../assets/themes/theme12-1.jpg'
import pc13 from '../assets/themes/theme13-1.jpg'
import pc14 from '../assets/themes/theme14-1.jpg'
import pc15 from '../assets/themes/theme15-1.jpg'
import pc16 from '../assets/themes/theme16-1.jpg'

import fork from '../assets/logos/Untitled-removebg-preview (2).png'
import fork2 from '../assets/logos/Untitled2-removebg-preview (2).png'
import fork3 from '../assets/logos/Untitled3-removebg-preview.png'
import logo from '../assets/rileylogo.png'
    export default {
        data() {
            return {
                logo,
                pc1,
                pc2, 
                pc3, 
                pc4, 
                pc5, 
                pc6, 
                pc7, 
                pc8,
                pc9, 
                pc10,
                pc11, 
                pc12, 
                pc13, 
                pc14, 
                pc15, 
                pc16,
                fork,
                fork2,
                fork3,
                model: 0,
                colors: [
                    'primary',
                    'secondary',
                    'yellow darken-2',
                    'red',
                    'orange',
                ],
            }
        }
    }
</script>
<style >
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}

</style>
