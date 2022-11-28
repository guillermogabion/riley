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
                                <v-btn
                                @click="cateringDialog = true"
                                >
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

                                <v-btn
                                @click="trayDialog = true"
                                >
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
                <v-col>
                <v-carousel>
                    <v-carousel-item
                    v-for="(item,i) in items"
                    :key="i"
                    :src="item.photo"
                    reverse-transition="fade-transition"
                    transition="fade-transition"
                    >
                    <div id="bottom" style="padding-bottom: 5em; ">
                        <span class="spans" style="color:#ffc107;">{{ item.name }}</span>
                    </div>
                </v-carousel-item>
                    
                </v-carousel>
                </v-col>
                <v-col>
                    <div
                    style="text-align: center;"
                    >
                        <span
                        class="spans"
                        >Featured Dish</span>
                        <br>
                        <span class="spans padding"> Themes </span>
                    </div>
                </v-col>
            </v-row>
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
    <v-dialog
    v-model="cateringDialog"
    width="500px"
    >
    <v-card>
        <v-card-title>
            Book a Catering Schedule
        </v-card-title>
        <v-card-text>
            <v-col>
                <v-text-field
                    :rules="rulesEvent" 
                    v-model="payload.event_type"
                    label="Event"
                    outlined
                ></v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    v-model="payload.event_theme"
                    label="Theme"
                    outlined
                ></v-text-field>
            </v-col>
            <v-row>
                <v-col>
                    <v-menu
                        v-model="menu2"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="payload.start_date"
                            label="Start Date"
                            prepend-icon="mdi-calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                        ></v-text-field>
                        </template>
                        <v-date-picker
                        v-model="payload.start_date"
                        @input="menu2 = false"
                        ></v-date-picker>
                    </v-menu>
            </v-col>
            <v-col>
                <v-menu
                        v-model="menu"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="payload.end_date"
                            label="End Date"
                            prepend-icon="mdi-calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                        ></v-text-field>
                        </template>
                        <v-date-picker
                        v-model="payload.end_date"
                        @input="menu = false"
                        ></v-date-picker>
                    </v-menu>
            </v-col>
            </v-row>
            <v-col>
                <v-select
                    :items="packages"
                    v-model="payload.packages"
                    filled
                    item-text="name"
                    item-value="name"
                    label="Packages"
                ></v-select>
            </v-col>
            <v-row>
                <v-col>
                <v-select
                    :items="show"
                    v-model="price"
                    filled
                    item-text="price_per_head"
                    label="Available Price per Head"
                ></v-select>
                </v-col>
                <v-col>
                <v-text-field
                v-model="payload.head"
                outlined
                :rules="rules" 
                >
                </v-text-field>
                </v-col>
            </v-row>
            <v-col>
                <v-text-field
                    :rules="rulesAmount" 

                    v-model="payload.amount"
                    label="Amount"
                    outlined
                ></v-text-field>
                <span style="display: none;">{{this.payload.amount = this.price * this.payload.head}}</span>
            </v-col>
            <v-col>
                <span>Note: If you have set main dishes exceeds to number based on your set package, the first numbers will only be served</span>
                <v-select
                    v-model="payload.dish"
                    :items="food"
                    chips
                    label="Main Dishes"
                    multiple
                    outlined
                    item-text="name"
                ></v-select>
            </v-col>
            <v-col>
                <v-text-field
                    :rules="rulesCash" 

                    v-model="payload.gcash"
                    label="GCash Number"
                    outlined
                ></v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    :rules="rulesEmail" 

                    v-model="payload.email"
                    label="Email Address"
                    outlined
                ></v-text-field>
            </v-col>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
                <v-img
                    src="https://getpaid.gcash.com/assets/img/paynow.png"
                    max-height="84"
                    max-width="163"
                    @click="serve()"
                ></v-img>
            <v-spacer></v-spacer>
        </v-card-actions>
    </v-card>
    </v-dialog>
    <v-dialog
    v-model="trayDialog"
    width="500px"
    >
    <v-card>
       <v-card-title>
        Food Tray Order
       </v-card-title>
       <v-card-text>
        <v-col>
            <v-select
                :items="food"
                v-model="payloadTray.order"
                filled
                item-text="name"
                item-value="name"
                label="Order"
            ></v-select>
        </v-col>
        <span style="display:none;">{{payloadTray.pricetray = this.tray.price}}</span>
        <v-col>
                <v-text-field
                    :rules="rulesCash" 

                    v-model="payloadTray.pricetray"
                    label="Price"
                    outlined
                ></v-text-field>
            </v-col>
        <v-col>
                <v-text-field
                    :rules="rulesCash" 

                    v-model="payloadTray.quantity"
                    label="Quantity"
                    outlined
                ></v-text-field>
            </v-col>
            
            <span style="display:none;">{{payloadTray.total = payloadTray.quantity * payloadTray.pricetray}}</span>
            <v-col>
                <v-text-field
                    :rules="rulesCash" 

                    v-model="payloadTray.total"
                    label="Total Cost"
                    outlined
                ></v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    :rules="rulesCash" 
                    v-model="payloadTray.gcashtray"
                    label="Gcash Number"
                    outlined
                ></v-text-field>
            </v-col>
            <v-col>
                <v-text-field
                    :rules="rulesEmail" 
                    v-model="payloadTray.emailtray"
                    label="Email Address"
                    outlined
                ></v-text-field>
            </v-col>
       </v-card-text>
       <v-card-actions>
            <v-spacer></v-spacer>
                <v-img
                    src="https://getpaid.gcash.com/assets/img/paynow.png"
                    max-height="84"
                    max-width="163"
                    @click="serveTray()"
                ></v-img>
            <v-spacer></v-spacer>
        </v-card-actions>
    </v-card>
    </v-dialog>

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
import axios from '../plugins/axios'
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
                price: '',
                colors: [
                    'primary',
                    'secondary',
                    'yellow darken-2',
                    'red',
                    'orange',
                ],
                cateringDialog: false,
                trayDialog: false,
                packages:[],
                show: [],
                dish: [],
                food: [],
                tray: [],
                items: [],
                menu: false,
                modal: false,
                menu2: false,

                payload: {
                    amount:'',
                    event_type: '',
                    event_theme: '',
                    packages: '',
                    dish: '',
                    dish: '',
                    gcash: '',
                    email: '',
                    amount: '',
                    start_date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    end_date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    price_per_head: '',
                    head: '',
                  
                },
                payloadTray: {
                    order: '',
                    pricetray: '',
                    quantity: '',
                    total: '',
                    gcashtray: '',
                    emailtray: ''
                },
                rules: [
                    v => !!v || 'Required',
                    v => v >= 100 || 'Head count should not below 100',
                    v => v <= 1000 || 'Max should not be above 1000',
                ],
                rulesEvent: [
                    v => !!v || 'Required',
                ],
                rulesAmount: [
                    v => !!v || 'Required',
               
                ],
                rulesDish: [
                    v => !!v || 'Required',
                   
                ],
                rulesCash: [
                    v => !!v || 'Required',
                ],
                rulesEmail: [
                    v => !!v || 'Required',
                ],
            }
        },
        methods: {
            getPackage(){
                axios.get('getPack').then(response => {
                    console.log(response.data)
                    this.packages = response.data
                })
            },
            packageShow(key){
                axios.post('packShow', {searchkey:key}).then(response => {
                    this.show = response.data
                  
                })
            },
            OrderShow(key){
                axios.post('OrderShow', {searchkey:key}).then(response => {
                    this.tray = response.data
                  
                })
            },

            dishShow(){
                axios.get('getFood2').then(response=> {
                    console.log(response.data)
                    this.food = response.data
                })
            },
            serve(){
                axios.post('addReservation', this.payload).then(response => {
                    console.log(response.data)
                    this.payload.event_type = ''
                    this.payload.event_theme = ''
                    this.payload.start_date = (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    this.payload.end_date = (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                    this.payload.amount = ''
                    this.payload.packages = ''
                    this.payload.dish = ''
                    this.cateringDialog = false;
                    
                })

            },
            serveTray(){
                axios.post('serveTray', this.payloadTray).then(response => {
                    console.log(response.data)
                    this.close();
                    this.trayDialog = false
                    
                })

            },
            close(){
                this.cateringDialog = false
                this.payload = ''
            },
            foodPicture(){
                axios.get('foodpicture').then(response => {
                    console.log(response.data)
                    this.items = response.data
                })
            }
            
            


        },
        mounted(){
            this.getPackage()
            this.dishShow()
            this.foodPicture()
        },
        watch: {
            "payload.packages": {
            handler(val) {
               this.packageShow(val);
            },
            deep: true,
        },
        "payloadTray.order": {
        handler(val) {
            this.OrderShow(val);
        },
        deep: true,
        },

        "cateringDialog": {
            handler(val){
                val || this.close
            }
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
#bottom {
        position: absolute;
        bottom: 0;
        left: 0;
      }
.spans {
    display: inline-block;
    /* float:left;  remove */
    margin: 10px 10px 0 0;
    padding: 5px 10px;
    font-size: 20px;

}

.padding {
    padding-top: 2em;
}

</style>
