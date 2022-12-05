<template>
<v-slide-x-transition>
    <div
    v-if="$is_admin()"
    >
    <v-row>
        <v-col>
            <v-card
            color="#ff461f"
            height="120px"
            >
                <v-card-title>
                    <span class="mdi mdi-account-group"></span>
                    <span
                    style="padding-left:0.8em;">Total Users</span>
                </v-card-title>
                <v-card-text>
                    <div style="float: right;">
                        <span
                        style="font-size: 30px;"
                        >
                            {{this.datas.clients}}
                        </span>
                    </div>

                </v-card-text>
            </v-card>
        </v-col>
        <v-col>
            <v-card
            color="#96e637"
            height="120px"
            >
                <v-card-title>
                    <span class="mdi mdi-clipboard-outline"></span>    
                    <span
                    style="padding-left:0.8em;">Total Catering Reservations</span>
                </v-card-title>
                <v-card-text>
                    <div style="float: right;">
                    <span
                    style="font-size: 30px;">
                        {{this.datas.catering}}
                    </span>
                    </div>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col>
            <v-card
            color="#019faf"
            height="120px"
            >
                <v-card-title>
                    <span class="mdi mdi-food"></span>
                    <span
                    style="padding-left:0.8em;">Total Food Tray Ordered</span>
                </v-card-title>
                <v-card-text>
                    <v-spacer></v-spacer>
                    <div style="float: right;">
                    <span
                    style="font-size: 30px;">
                        {{this.datas.tray}}
                    </span>
                    </div>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col>
            <v-card
            color="#f0b57b"
            height="120px"
            >
                <v-card-title>
                    <span class="mdi mdi-alpha-r-box"></span>
                    <span
                    style="padding-left:0.8em;"
                    >Total Rented Supplies</span>
                </v-card-title>
                <v-card-text>
                    <v-spacer></v-spacer>
                    <div style="float: right;">
                    <span
                    style="font-size: 30px;">
                        {{this.datas.rent}}
                    </span>
                    </div>  
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
        <v-card>
            <div>
                <v-row>
                    <v-col>
                        <v-card>
                        <div>
                            <v-toolbar-items>
                                <v-btn
                                    icon
                                    @click="decrementSold()" 
                                >
                                    <v-icon 
                                        color="green"
                                    >mdi-minus</v-icon>
                                </v-btn>
                                <span class="year" readonly min="0.00">{{yearSold}}</span>
                                <v-btn
                                    icon
                                    @click="incrementSold()"
                                >
                                    <v-icon 
                                        color="green"
                                    >mdi-plus</v-icon>
                                </v-btn>
                            </v-toolbar-items>
                            <vue-chart type="bar" :data="chartSold" v-if="is_loaded"></vue-chart>
                        </div>
                    </v-card>  
                    </v-col>
                    <v-col>
                        <v-card
                        height="100%"
                        >
                        <div
                        class="center"
                        >
                            <div id="chart">
                                <apexchart type="pie" style="padding-top: 80px" width="380" :options="PieOptions" :series="PieSeries"></apexchart>
                            </div>
                        </div>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                <v-col>
                    <v-sheet>
                        <span style="font-weight: bold; padding-left: 1em;">
                            Catering Schedule
                        </span>
                    </v-sheet>
                    <v-sheet>
                        <v-calendar
                            ref="calendar"
                            :weekdays="weekday"
                            :type="month"
                            :events="events"
                            :event-overlap-mode="mode"
                            :event-overlap-threshold="30"
                            @click:event="showEvent"
                            :now="today"
                        ></v-calendar>
                        <v-menu
                            v-model="selectedOpen"
                            :close-on-content-click="false"
                            :activator="selectedElement"
                            offset-x
                            >
                            <v-card
                                color="grey lighten-4"
                                min-width="350px"
                                flat
                            >
                                <v-toolbar
                                :color="selectedEvent.color"
                                dark
                                >
                                <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
                                </v-toolbar>
                                <v-card-text>
                                <span v-html="selectedEvent.event_type"></span><br>
                                <span v-html="selectedEvent.start"></span><br>
                                <span v-html="selectedEvent.package"></span><br>
                                <span v-html="selectedEvent.dish"></span>
                                </v-card-text>
                                <v-card-actions>
                                <v-btn
                                    text
                                    color="secondary"
                                    @click="selectedOpen = false"
                                >
                                    Cancel
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-menu>
                    </v-sheet>
                </v-col>
                
                
                <v-col>
                    <v-sheet>
                        <span style="font-weight: bold; padding-left: 1em;">
                            Order Delivery Schedule
                        </span>
                    </v-sheet>
                    <v-sheet>
                        <v-calendar
                            ref="calendar"
                            :weekdays="weekday"
                            :type="month"
                            :events="myshow"
                            :event-overlap-mode="mode"
                            :event-overlap-threshold="30"
                            :now="today"
                            @click:event="showEvent2"
                        ></v-calendar>
                        <v-menu
                            v-model="selectedOpen2"
                            :close-on-content-click="false"
                            :activator="selectedElement2"
                            offset-x
                            >
                            <v-card
                                color="grey lighten-4"
                                min-width="350px"
                                flat
                            >
                                <v-toolbar
                                :color="selectedEvent2.color"
                                dark
                                >
                                <!-- <v-toolbar-title v-html="selectedEvent2.fullname"></v-toolbar-title> -->
                                </v-toolbar>
                                <v-card-text>
                                <span v-html="selectedEvent2.order"></span><br>
                                <span v-html="selectedEvent2.quantity"></span><br>
                                </v-card-text>
                                <v-card-actions>
                                <v-btn
                                    text
                                    color="secondary"
                                    @click="selectedOpen2 = false"
                                >
                                    Cancel
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-menu>
                    </v-sheet>
                </v-col>
                <v-col>
                    <v-sheet>
                        <span style="font-weight: bold; padding-left: 1em;">
                            Rentals Schedule
                        </span>
                    </v-sheet>
                    <v-sheet>
                        <v-calendar
                            ref="calendar"
                            :weekdays="weekday"
                            :type="month"
                            :events="myrent"
                            :event-overlap-mode="mode"
                            :event-overlap-threshold="30"
                            :now="today"
                            @click:event="showEvent3"
                        ></v-calendar>
                        <v-menu
                            v-model="selectedOpen3"
                            :close-on-content-click="false"
                            :activator="selectedElement3"
                            offset-x
                            >
                            <v-card
                                color="grey lighten-4"
                                min-width="350px"
                                flat
                            >
                                <v-toolbar
                                :color="selectedEvent3.color"
                                dark
                                >
                                <!-- <v-toolbar-title v-html="selectedEvent2.fullname"></v-toolbar-title> -->
                                </v-toolbar>
                                <v-card-text>
                                <span v-html="selectedEvent3.supply_name"></span><br>
                                <span v-html="selectedEvent3.quantity"></span><br>
                                </v-card-text>
                                <v-card-actions>
                                <v-btn
                                    text
                                    color="secondary"
                                    @click="selectedOpen2 = false"
                                >
                                    Cancel
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-menu>
                    </v-sheet>
                </v-col>
            </v-row>
            </div>
        <br/>
    </v-card>
    </div>
    <div
    v-if="$is_user()"
    >
       <Home />
    </div>
   
</v-slide-x-transition>
</template>

<script>
import Home from '../../userspart/home.vue'
import axios from '../../plugins/axios'
import moment from 'moment'
export default {
    components : {
        Home
    },
    data() {
        
        return {
            selectedEvent: {},
            selectedElement: null,
            selectedOpen: false,
            selectedEvent2: {},
            selectedElement2: null,
            selectedOpen2: false,
            selectedEvent3: {},
            selectedElement3: null,
            selectedOpen3: false,
            weekday: [0, 1, 2, 3, 4, 5, 6],
            is_loaded: false,
            chartSold: {
            labels: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                        {
                            label : 'Total Event Served',
                            data : [0,0,0,0,0,0,0,0,0,0,0,0],
                            backgroundColor: 'green'
                        },
                    ],
                },
                yearSold: new Date().getFullYear(),
                datas: [],
                datatest: [],
                today: moment().format('YYYY-MM-DD'),
                events: [],
                trays : [
                name => users.fullname

                ],
                rents : [
                ],
                mode: 'stack',
                modes: ['stack', 'column'],
                month : 'month'
            }
    },
    computed: {
        PieOptions(){
            let labels = ['catering', 'tray', 'rent'];
            return {
                colors : ["#f3891c", "#243340", "#ffc107"],
                chart: {
                    width: "100%",
                    type: 'pie',
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                labels: labels
            }
        },
        PieSeries(){
            let series = []
            if (this.datas){
                this.datas.pie.forEach(data=> {
                    series.push(data)
                })
            }
            return series
        },
       myshow(){
        const trays = this.trays
        trays.forEach((element) => {
            element.start = element.start
            element.name = element.users.fullname
        })
        return trays
       },
       myrent(){
        const rents = this.rents
        rents.forEach((element) => {
            element.start = element.start
            element.name = element.users.fullname
        })
        return rents
       }
    },
    
    created(){
        this.show()
        this.showTray()
        this.showRent()
        this.details()
        console.log('created')
        this.is_loaded = false;
        let payload = {
            date: this.yearSold
        }
        console.log("payload", payload)
        this.chart(payload)
        this.details()
        this.$refs.calendar.scrollToTime('08:00')

    },
    async mounted() {
        await this.getMonthlySales();
    },
    
    methods: {
        showEvent ({ nativeEvent, event }) {
                const open = () => {
                this.selectedEvent = event
                this.selectedElement = nativeEvent.target
                requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen = true))
                }

                if (this.selectedOpen) {
                this.selectedOpen = false
                requestAnimationFrame(() => requestAnimationFrame(() => open()))
                } else {
                open()
                }

                nativeEvent.stopPropagation()
            },
        showEvent2 ({ nativeEvent, event }) {
                const open = () => {
                this.selectedEvent2 = event
                this.selectedElement2 = nativeEvent.target
                requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen2 = true))
                }

                if (this.selectedOpen2) {
                this.selectedOpen2 = false
                requestAnimationFrame(() => requestAnimationFrame(() => open()))
                } else {
                open()
                }

                nativeEvent.stopPropagation()
            },
        showEvent3 ({ nativeEvent, event }) {
                const open = () => {
                this.selectedEvent3 = event
                this.selectedElement3 = nativeEvent.target
                requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen3 = true))
                }

                if (this.selectedOpen3) {
                this.selectedOpen3 = false
                requestAnimationFrame(() => requestAnimationFrame(() => open()))
                } else {
                open()
                }

                nativeEvent.stopPropagation()
            },
        getEventColor (event) {
            return event.color
        },
        show(){
            axios.get('show').then(response => {
                console.log(response.data)
               this.events = response.data
            })
        },
        showTray(){
            axios.get('getTray').then(response => {
                console.log(response.data)
               this.trays = response.data
            })
        },
        showRent(){
            axios.get('shows').then(response => {
                console.log(response.data)
               this.rents = response.data
            })
        },
        incrementSold(){
            this.yearSold++;
            // monthlysold
            this.getMonthlySales()
        },

        decrementSold(){
            if (this.yearSold === 1) {
                alert("negative year not Allowed");
            }else{
                this.yearSold--;
                // monthlysold
                this.getMonthlySales()
            }
        },
        details(){
            axios.get('details').then(response => {
                console.log(response.data)
                this.datas = response.data
            })
        },

       
        chart(payload){
            axios.post('charts',payload).then(({data})=> {
                this.chartSold.datasets[0].data[0] = data[0][0]
                this.chartSold.datasets[0].data[1] = data[1][0]
                this.chartSold.datasets[0].data[2] = data[2][0]
                this.chartSold.datasets[0].data[3] = data[3][0]
                this.chartSold.datasets[0].data[4] = data[4][0]
                this.chartSold.datasets[0].data[5] = data[5][0]
                this.chartSold.datasets[0].data[6] = data[6][0]
                this.chartSold.datasets[0].data[7] = data[7][0]
                this.chartSold.datasets[0].data[8] = data[8][0]
                this.chartSold.datasets[0].data[9] = data[9][0]
                this.chartSold.datasets[0].data[10] = data[10][0]
                this.chartSold.datasets[0].data[11] = data[11][0]
                // this.chartSold.datasets[0].data = data.data

                this.is_loaded = true 
            })
        },

        async getMonthlySales(){
            this.is_loaded = false
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }
            this.timer = setTimeout(() => {
                let payload = {
                    date : this.yearSold,
                }
                console.log(payload, "cc")
                // get_monthlysold
                this.chart(payload)
            }, 400)

        }
        },
   
   
}
</script>
<style>
.center {
    margin-top: 100px;
  margin: auto;
  width: 50%;
  padding: 10px;
}
.my-event {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  border-radius: 2px;
  background-color: #1867c0;
  color: #ffffff;
  border: 1px solid #1867c0;
  font-size: 12px;
  padding: 3px;
  cursor: pointer;
  margin-bottom: 1px;
  left: 4px;
  margin-right: 8px;
  position: relative;
}

.my-event.with-time {
  position: absolute;
  right: 4px;
  margin-right: 0px;
}

</style>