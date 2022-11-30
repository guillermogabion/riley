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
            <div>
            <v-row>
                <v-col
                >
                    <v-hover
                    v-slot="{ hover }"
                    >
                        <v-card
                        :elevation="hover ? 12 : 2"
                        >
                            <v-img
                            :src="fork"
                            max-height="350"
                            max-width="550"
                            contain
                            >
                            </v-img>
                            <v-card-text>
                                <div class="center">
                                    <span
                                        style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                        >
                                        Catering Services
                                    </span> 
                                </div>
                                
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
                <v-col
                >
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                        :elevation="hover ? 12 : 2"
                        >
                            <v-img
                            :src="fork2"
                            max-height="350"
                            max-width="550"
                            contain
                            >
                            </v-img>
                            <v-spacer></v-spacer>
                            <v-card-text>
                                <div class="center">
                                    <span
                                        style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                        >
                                        Food Tray Services
                                    </span> 
                                </div>
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
                <v-col
                >
                    <v-hover
                    v-slot="{ hover }"
                    >
                    <v-card
                        :elevation="hover ? 12 : 2"
                        >
                            <v-img
                            :src="fork3"
                            max-height="350"
                            max-width="550"
                            contain
                            >
                            </v-img>
                            <v-card-text>
                                <div class="center">
                                    <span
                                        style="font-weight: bold; margin: 0 auto; font-size: 20px; padding-left: 1.2em;"
                                        >
                                        Party Supplies
                                    </span> 
                                </div>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                @click="supplyDialog = true"
                                >
                                    Book Now
                                </v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>
                <v-carousel class="container" style="padding-top: 1em; width:1000px;height:auto;">
                    <v-carousel-item
                    v-for="(item,i) in items"
                    :key="i"
                    :src="item.photo"
                    reverse-transition="fade-transition"
                    transition="fade-transition"
                    >
                    <div class="content" id="bottom" style="padding-bottom: 5em; ">
                        <span class="spans" style="color:#ffc107;">{{ item.name }}</span>
                    </div>
                </v-carousel-item>
                    
                </v-carousel>
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
               <v-col>
                        <v-card
                        width="70%"
                        class="container"
                        >
                        
                            <div>
                                <span class="spans">
                                    About
                                </span>
                            </div>
                                <v-list>
                                    <v-list-item-group>
                                        <v-list-item>
                                            <v-row>
                                                
                                                <v-col>
                                                <span class="mdi mdi-flag spaces">2015 -  December 2017 - Rodly Palma started with a position of manager in a well-known catering business located in Cavite city</span>
                                                </v-col>
                                            </v-row>
                                        </v-list-item>
                                        <v-list-item>
                                            <v-row>
                                                
                                                <v-col>
                                                <span class="mdi mdi-flag">January 2018 - Rodly Palma started his own catering business. He starts with planning and investing catering equipments.</span>
                                                </v-col>
                                            </v-row>
                                            
                                        </v-list-item>
                                        <v-list-item>
                                            <v-row>
                                            
                                                <v-col>
                                                <span class="mdi mdi-flag">January 2018 - Rodly Palma started his own catering business. He starts with planning and investing catering equipments.</span>
                                                </v-col>
                                            </v-row>
                                            
                                        </v-list-item>
                                        <v-list-item>
                                            <v-row>
                                                <v-col>
                                                <span class="mdi mdi-flag">Sept 2018- At the last quarter of the year, the business also starts to have a rentals when it comes to party needs.</span>
                                                </v-col>
                                            </v-row>
                                            
                                        </v-list-item>
                                        <v-list-item>
                                            <v-row>
                                                <v-col>
                                                <span class="mdi mdi-flag">2019-2020 - The business is booming. They started to offer food pax and package meals. They also added more equipments for party rentals such as; tables, chairs, and kitchen wares.</span>
                                                </v-col>
                                            </v-row>
                                            
                                        </v-list-item>
                                        <v-list-item>
                                            <v-row>
                                                <v-col>
                                                <span class="mdi mdi-flag spaces">2021- Present - The business is continuing to expand as they got more and more clients and events.</span>
                                                </v-col>
                                            </v-row>
                                            
                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>
                    </v-card>
               </v-col>
               
               
            </v-row>
            <v-row>
                <v-card width="70%" class="container">
                        <span class="spans">
                            Contact
                        </span>
                        <br>
                        <span class="spans"> For Inquiries, Please call or send a message to </span>
                        <br>
                        <span class="mdi mdi-phone-in-talk" style="font-size: 20px"></span> <span class="spans"> 0918936568 </span>
                        <br>
                        <span class="spans"> Or Email us </span>
                        <br>
                        <span class="mdi mdi-mail" style="font-size: 20px"></span><span class="spans">rodlypalma@gmail.com</span>
                        <br>
                        <span class="spans"> Or visit us on our place</span>
                        <br>
                        <span class="mdi mdi-home" style="font-size: 20px"></span><span class="spans"> 520 m. Santos st.  Sta cruz Cavite City </span>
                </v-card>
            </v-row>
            <v-row>
                <v-col>
                    <span class="spans">
                        FAQ's
                    </span>
                    <v-card>
                        <v-list>
                            <v-list-item-group>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">What type of event does Riley’s Catering Service specialize in planning?</span>
                                        </v-col>
                                    </v-row>
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">We specialize in wedding catering and offer birthday packages at reasonable prices, ensuring that clients receive delectable food at an affordable price.</span>
                                        <br>
                                        <span>Our full catering and events services include a menu selection as well as thematic floral decoration of the reception area. We assist with every aspect of the celebration, such as selecting a venue, selecting event themes and motifs, and arranging décor. Riley's Catering Service ensures a stress-free experience while staying true to your vision from beginning to end.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">What are your office hours?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">Office Hours: 8:00 AM – 6:00 PM</span>
                                        </v-col>
                                    </v-row>
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">Are there labor charges?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">Waiters are only available for up to 4 hours. Overtime will be charged at the rate of Php50.00 per waiter per hour. If the event is held in a building without a service elevator or if the loading/unloading area is more than 50 meters away from the venue, an additional Php50.00 per floor per waiter is charged</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        
                                        <v-col>
                                        <span class="mdi mdi-comment-question">Are there delivery charges?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">Yes, depending on the location, we charge an additional transportation fee.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        
                                        <v-col>
                                        <span class="mdi mdi-comment-question">Do you cater and style events on holidays?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">Yes, even on Christmas and New Year’s Day.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">How the items on your menu are packaged, presented, served, etc.?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">You can select between a buffet-style and a plated-style service (with additional cost). We also provide event staff with pre-packaged meals.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">What can I expect when I work with Riley’s Catering Service?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">Riley's Catering Service will handle your requests professionally, providing you with affordable catering, excellent service, a flexible menu, and a superior product. We will provide a lovely setup and a spotless clean-up. Our full-service catering ensures that your event runs smoothly and is enjoyable.</span>
                                        </v-col>
                                    </v-row>
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">How do I pay for my order/reservations?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">A reservation fee is required for booking confirmation. A 30% deposit is required 30 days before the event, with the remaining balance due 14 to 10 days before the event. On the day of the event, the client is responsible for any additional charges. Cash or gcash can be used to make payments.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">Can I change my order once it has been placed?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">The menu selection and guarantee of attendance are required 7 days prior to the event.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">What is your cancellation policy?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">The client shall inform the caterer of any cancellation of the function/banquet. The following will apply in the event of cancellation:</span>
                                        <br>
                                        <span>
                                            <li>Seventy percent (70%) of the guaranteed contract price will be charged 72 hours prior to the function date.</li>
                                            <li>Full payment of the guaranteed contract price will be charged 48 hours prior to the function date.</li>
                                            <li>A fee of 10% of the contract price will be charged if the contract is canceled "early."</li>
                                        </span>
                                        </v-col>
                                        
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-comment-question">Do you do tastings?</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                                <v-list-item>
                                    <v-row>
                                        <v-col>
                                        <span class="mdi mdi-alpha-a-box">We do, indeed. The tastings are free for the first two people who attend. If you want to bring more than two people, you can do so in advance, but there will be an additional fee per extra person that must be paid by the end of the tasting.</span>
                                        </v-col>
                                    </v-row>
                                    
                                </v-list-item>
                               
                            </v-list-item-group>
                        </v-list>
                        




                    </v-card>
                    
                </v-col>
            </v-row>
            
           
    </div>
   
    <v-dialog
    v-model="cateringDialog"
    width="500px"
    >
    <v-card>
        <v-card-title class="text-h5 grey lighten-2">
            Book a Catering Schedule
        </v-card-title>
        <v-card-text>
            <v-col>
                <v-text-field
                    :rules="rulesEvent" 
                    v-model="payload.name"
                    label="Event Name"
                    outlined
                ></v-text-field>
            </v-col>
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
        <v-card-title class="text-h5 grey lighten-2">
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
    <v-dialog
    v-model="supplyDialog"
    persistent
    >
    <v-card>
        <v-card-title class="text-h5 grey lighten-2">
        <span>
            Supplies Order
        </span>
        <v-spacer></v-spacer>
        <v-btn
        icon
        @click="clearRent()"
        >
        <span style="font-size: 20px" class="mdi mdi-alpha-x-circle"></span>
        </v-btn>
       </v-card-title>
       <v-card-text>
            <v-row>
                <v-col>
                    <v-card>
                        <v-data-table
                        :headers="headers"
                        :items="supply"
                        class="elevation-1"
                        >
                            <template v-slot:item.actions = {item}>
                                <v-icon
                                small
                                class="mr-2"
                                @click="editItemSupply(item)"
                                >
                                mdi-check
                                </v-icon>
                            </template>
                            <template v-slot:top>
                              <v-toolbar>
                                <v-toolbar-title>
                                    List of Supplies
                                </v-toolbar-title>
                              </v-toolbar>
                            </template>
                        </v-data-table>
                    </v-card>
                </v-col>
                <v-col>
                    <v-card>
                        <v-card-title>
                            Set your Order
                        </v-card-title>
                        <div
                        style="padding-top: 20px; padding-left: 20px; padding-right: 20px;"
                        >
                        <v-text-field
                            :rules="rulesCash" 
                            v-model="editedItem.name"
                            label="Name"
                            outlined
                        ></v-text-field> 
                        <v-text-field
                            :rules="rulesCash" 
                            v-model="editedItem.price"
                            label="Price"
                            outlined
                        ></v-text-field> 
                        <v-text-field
                            :rules="rulesCash" 
                            v-model="editedItem.quantity"
                            label="Quantity"
                            outlined
                        ></v-text-field> 
                        <span style="display: none">{{editedItem.total = editedItem.price * editedItem.quantity}}</span>
                        <v-text-field
                            :rules="rulesCash" 
                            v-model="editedItem.total"
                            label="Total"
                            outlined
                        ></v-text-field> 
                    </div>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                        @click ="closeSupply()"
                        color="warning"
                        >
                        Clear
                        </v-btn>
                        <v-btn
                        @click ="postmyRent()"
                        color="success"
                        >
                        Add to Cart
                        </v-btn>
                    </v-card-actions>
                    </v-card>
                </v-col>
                <v-col>
                    <v-card>

                        <v-data-table
                            :headers="headers2"
                            :items="rent"
                            class="elevation-1"
                            :loading="loading"
                            hide-default-footer
                            >
                                <template v-slot:item.actions = {item}>
                                    <v-icon
                                    small
                                    class="mr-2"
                                    @click="deleteItemRent(item)"
                                    >
                                    mdi-trash-can
                                </v-icon>
                            </template>
                            <template v-slot:top>
                              <v-toolbar>
                                <v-toolbar-title>
                                    Cart
                                </v-toolbar-title>
                              </v-toolbar>
                            </template>
                        </v-data-table>
                        <div class="justify-left">
                            
                        </div>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <span style="font-size: 20px; display: none;">Total : {{ this.totals.text=this.totalCost1() }}</span>
                            <br>
                            <v-text-field
                            :rules="rulesCash" 
                            v-model="totals.text"
                            label="Total"
                            outlined
                        ></v-text-field> 
                        </v-card-actions>
                        
                        <v-card-actions>
                            <v-spacer></v-spacer>
                                <v-img
                                    src="https://getpaid.gcash.com/assets/img/paynow.png"
                                    max-height="84"
                                    max-width="163"
                                    @click="submitPayment()"
                                ></v-img>
                            <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
       </v-card-text>
       
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
                supplyDialog: false,
                packages:[],
                show: [],
                dish: [],
                food: [],
                tray: [],
                items: [],
                menu: false,
                modal: false,
                menu2: false,
                supply: [],
                rent: [],
                payload: {
                    name: '',
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
                headers: [
                    { text: 'Name', value: 'name' },
                    { text: 'Price', value: 'price' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                headers2: [
                    { text: 'Name', value: 'supply_name' },
                    { text: 'Price', value: 'price' },
                    { text: 'Quantity', value: 'quantity' },
                    { text: 'Total', value: 'total' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                editedIndex: -1,
                editedItem: {
                id: '',
                name: '',
                price: '',
                quantity: '',
                total : ''
                },
                defaultItem: {
                name: '',
                avatar: '',
                },
                loading: true,
                totals : {
                    text : ''
                }

                
            }
        },
        created() {
            this.getAllSupply()
            this.getmyCheck();
        },
        methods: {
            totalCost1(){
                {
                let total = 0
                this.rent.forEach(item => {
                    let sum = item.price * item.quantity;
                    total = parseInt(total + sum);
                });
                return total
                }
              
            },
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
            },
            
            getAllSupply(){
                axios.get('getAllSupply').then(response => {
                    this.supply = response.data
                    console.log(response.data)
                })
            },
            editItemSupply(item){
                this.editedIndex = this.supply.indexOf(item)
                this.editedItem = Object.assign({}, item)
                console.log(this.editedItem)
            },
           closeSupply() {
            this.$nextTick(() => {
            this.editedItem = Object.assign({}, this.defaultItem)
            this.editedIndex = -1
            })
           },
           getmyCheck(){
            axios.get('getmyRent').then(response => {
                console.log(response.data)
                this.loading = false
                this.rent = response.data
            })
           },
           postmyRent(){
            axios.post('checkOut', this.editedItem).then(response => {
                this.loading = true
                console.log(response.data)
                this.getmyCheck();
            })
           },
           submitRent(){
            axios.put('updateIspaid').then(response=> {
                console.log(response.data)
                this.getmyCheck();
                
            })
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
                this.supplyDialog = false
           
           },

           submitPayment(){

                axios.post('payment', this.totals).then(response=> {
                    console.log(response.data)
                })
                this.$nextTick(() => {
                    this.submitRent()
                })
           },
           clearRent(){
            axios.delete('deleteUnPaid').then(response => {
                console.log(response.data)
                this.getmyCheck()
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
                this.supplyDialog = false
            })
           }, 
           deleteItemRent(item){
            // axios.delete('deleterent/' +)

            console.log(item.id)

            axios.delete('deleterent/' + item.id).then(response => {
                console.log(response.data)
                this.loading = true
                this.getmyCheck()
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
  padding: 5px;
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
.container .content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

.spaces { 
    display:block
}

</style>
