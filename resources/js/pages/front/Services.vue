<template>
    <section id="services">
        <v-container class="my-5">
            <div style="display: flex; justify-content: center; align-items: center;">
                <h2 style=" font-size: 40px;" class="font-weight-bold">Services</h2>
            </div>
            <v-row>
                <v-col>
                    <div class="d-flex align-center justify-center">
                    <v-hover
                        v-slot="{ hover }"
                        >
                            <v-card
                            :elevation="hover ? 12 : 2"
                            width="80%"
                            class="ma-4"
                            >
                                <!-- <div
                                class="center"
                                > -->
                                <div class="d-flex justify-center">
                                    <span class="mdi mdi-silverware-fork-knife sized"></span>
                                </div>
                                

                                <!-- </div> -->
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
                    </div>
                </v-col>
                <v-col>
                    <div class="d-flex align-center justify-center">
                    <v-hover
                        v-slot="{ hover }"
                        >
                            <v-card
                            :elevation="hover ? 12 : 2"
                            width="80%"
                            class="ma-4"
                            >
                                <!-- <div
                                class="center"
                                > -->
                                <div class="d-flex justify-center">
                                    <span class="mdi mdi-silverware-fork-knife sized"></span>
                                </div>
                                

                                <!-- </div> -->
                                <v-card-text
                                class="text-center"
                                >
                                   <span style="font-size: 20px">Food Tray Services</span> 
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                    text
                                    @click="trayDialog = true"
                                    >
                                        Order Now
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
                    </div>
                </v-col>
                <v-col>
                    <div class="d-flex align-center justify-center">
                    <v-hover
                        v-slot="{ hover }"
                        >
                            <v-card
                            :elevation="hover ? 12 : 2"
                            width="80%"
                            class="ma-4"
                            >
                                <!-- <div
                                class="center"
                                > -->
                                <div class="d-flex justify-center">
                                    <span class="mdi mdi-silverware-fork-knife sized"></span>
                                </div>
                                

                                <!-- </div> -->
                                <v-card-text
                                class="text-center"
                                >
                                   <span style="font-size: 20px">Party Need Rentals</span> 
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                    text
                                    @click="trayDialog = true"
                                    >
                                        Rent Now
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-hover>
                    </div>
                </v-col>
            </v-row>
         
        </v-container>
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
                    outlined
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
                    outlined
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
                <span v-if="payload.payment_type == 'Down Payment'" style="display: none;">{{(this.payload.amount = (this.price * this.payload.head)/2)}}</span>
                <span v-else style="display: none;">{{this.payload.amount = this.price * this.payload.head}}</span>
            </v-col>
            <v-col>
                <v-select
                v-model="payload.payment_type"
                :items="downpayment"
                outlined
                label="Payment Type"
                >
                </v-select>
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
                            v-model="payloadTray.start"
                            label="Desired Date to Deliver"
                            prepend-icon="mdi-calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                        ></v-text-field>
                        </template>
                        <v-date-picker
                        v-model="payloadTray.start"
                        @input="menu2 = false"
                        ></v-date-picker>
                    </v-menu>
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
    </section>
</template>
<!-- <script>
import fork from '../../assets/logos/Untitled-removebg-preview (2).png'
import fork2 from '../../assets/logos/Untitled2-removebg-preview (2).png'
import fork3 from '../../assets/logos/Untitled3-removebg-preview.png'
export default {
    data() {
        return {
            menu2: false,
            menu: false,
            fork,
            fork2,
            fork3,
            items : [
                { id: '1', icon: 'mdi-hospital', title : 'Paralysis Disability', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '2', icon: 'mdi-hospital', title : 'Patient of Beding', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '3', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '5', icon: 'mdi-hospital', title : 'Health Laboratory', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '6', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '7', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '4', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  }
            ],
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
            model : null,
            cateringDialog: false,
            trayDialog: false,
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
                payloadTray: {
                    order: '',
                    pricetray: '',
                    quantity: '',
                    total: '',
                    start: '',
                    gcashtray: '',
                    emailtray: ''
                },
                packages:[],
                show: [],
                price: '',
                downpayment : [
                    "Full Payment",
                    "Down Payment"
                ],
                food: [],
                tray: [],
        }
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
                    this.snackbar = true
                    
                })

            },
            serveTray(){
                axios.post('serveTray', this.payloadTray).then(response => {
                    console.log(response.data)
                    this.trayDialog = false
                    this.snackbar = true
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
                this.snackbar = true
                
            })
           },
           submitRent(){
            axios.put('updateIspaid').then(response=> {
                console.log(response.data)
                this.getmyCheck();
                this.snackbar = true
                
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
    watch : {
        "cateringDialog": {
            handler(val){
                val || this.close
            }
        }
    }
}
</script> -->
<script>


import fork from '../../assets/logos/Untitled-removebg-preview (2).png'
import fork2 from '../../assets/logos/Untitled2-removebg-preview (2).png'
import fork3 from '../../assets/logos/Untitled3-removebg-preview.png'
import axios from '../../plugins/axios'
    export default {
        data() {
        return {
            menu2: false,
            menu: false,
            fork,
            fork2,
            fork3,
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
            model : null,
            cateringDialog: false,
            trayDialog: false,
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
                payloadTray: {
                    order: '',
                    pricetray: '',
                    quantity: '',
                    total: '',
                    start: '',
                    gcashtray: '',
                    emailtray: ''
                },
                packages:[],
                show: [],
                price: '',
                downpayment : [
                    "Full Payment",
                    "Down Payment"
                ],
                food: [],
                tray: [],
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
                    this.snackbar = true
                    
                })

            },
            serveTray(){
                axios.post('serveTray', this.payloadTray).then(response => {
                    console.log(response.data)
                    this.trayDialog = false
                    this.snackbar = true
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
                this.snackbar = true
                
            })
           },
           submitRent(){
            axios.put('updateIspaid').then(response=> {
                console.log(response.data)
                this.getmyCheck();
                this.snackbar = true
                
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
<style scoped>
 .flex-padding {
    padding: 20px;
}
.sized {
    font-size:70px;
}
</style>