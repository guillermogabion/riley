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
            justify="center"
            style="padding-left: 5em"
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
                <v-col>
                    <v-row
                    align="center"
                    justify="center"
                    padding="20px"
                    >
                        <v-hover
                        v-slot="{ hover }"
                        >
                            <v-card
                            :elevation="hover ? 12 : 2"
                            width="25%"
                            class="ma-4"
                            >
                                <div
                                class="center"
                                >
                                    <v-img
                                    :src="fork"
                                    max-height="150"
                                    max-width="350"
                                    contain
                                    >
                                    </v-img>
                                </div>
                                <v-card-text
                                class="text-center"
                                >
                                   <span style="font-size: 20px">Catering Services</span> 
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                    text
                                    @click="cateringDialog = true"
                                    >
                                        Book Now
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
               
                        <v-hover
                        v-slot="{ hover }"
                        >
                        <v-card
                            :elevation="hover ? 12 : 2"
                            width="25%"
                            class="ma-4"
                            >
                                <div
                                class="center"
                                >
                                    <v-img
                                    :src="fork2"
                                    max-height="150"
                                    max-width="350"
                                    contain
                                    >
                                    </v-img>
                                </div>
                                <v-spacer></v-spacer>
                                <v-card-text
                                class="text-center"
                                >
                                   <span style="font-size: 20px">Food Tray Services</span> 
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                    @click="trayDialog = true"
                                    text
                                    >
                                        Order Now
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
                        <v-hover
                        v-slot="{ hover }"
                        >
                            <v-card
                            :elevation="hover ? 12 : 2"
                            width="25%"
                            class="ma-4"
                            >
                                <div
                                class="center"
                                >
                                    <v-img
                                    :src="fork3"
                                    max-height="150"
                                    max-width="350"
                                    contain
                                    >
                                    </v-img>
                                </div>
                                <v-card-text
                                class="text-center"
                                >
                                   <span style="font-size: 20px">Party Need Rentals</span> 
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                    text
                                    @click="supplyDialog = true"
                                    >
                                        Book Now
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
                    </v-row>
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
                        
                    </div>
                </v-col>
            </div>
               
            
            
           
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
                label="Quantity"
                >
                </v-text-field>
                </v-col>
            </v-row>
            <v-col>
                <v-text-field
                    :rules="rulesAmount" 
                    readonly
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
                    readonly
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
                                mdi-check-circle
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
                            readonly
                        ></v-text-field> 
                        <v-text-field
                            :rules="rulesCash" 
                            v-model="editedItem.price"
                            label="Price"
                            outlined
                            readonly
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
                            readonly
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
                            readonly
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


import fork from '../assets/logos/Untitled-removebg-preview (2).png'
import fork2 from '../assets/logos/Untitled2-removebg-preview (2).png'
import fork3 from '../assets/logos/Untitled3-removebg-preview.png'
import logo from '../assets/rileylogo.png'
import axios from '../plugins/axios'
    export default {
        data() {
            return {
                logo,
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
