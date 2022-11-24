<template>
    <div>
        <v-card>
            <div
            class="center"
            >
            <v-row>
                <v-col>
                    <v-card>

                        <v-img
                        :src="fork"
                        max-height="350"
                        max-width="550"
                        >
                        </v-img>
                    </v-card>
                </v-col>
                <v-col>
                    <v-img
                        :src="fork"
                        max-height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>3</v-col>
            </v-row>


            </div>
            <v-row
            class="ma-2"
            >
                <v-col>
                        <v-img
                        :src="pc1"
                        max-height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                        <v-img
                        :src="pc2"
                        height="349"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                        <v-img
                        :src="pc3"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
            </v-row>
            <v-row
            class="ma-2"
            >
                <v-col>
                    <v-img
                        :src="pc6"
                        max-height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                    <v-img
                        :src="pc7"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                    <v-img
                        :src="pc8"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
            </v-row>
            <v-row
            class="ma-2"
            >
                <v-col>
                    <v-img
                        :src="pc4"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                    <v-img
                        :src="pc5"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
                <v-col>
                    <v-img
                        :src="pc9"
                        height="350"
                        max-width="550"
                        >
                        </v-img>
                </v-col>
            </v-row>
        </v-card>
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

import fork from '../assets/logos/cc.png'

export default {
    data() {
        return {
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
            fork
        }
    }
}
</script>
<style>
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
</style>