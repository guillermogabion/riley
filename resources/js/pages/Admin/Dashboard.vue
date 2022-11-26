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
                <v-col>
                <v-sheet height="400">
                    <v-calendar
                    ref="calendar"
                    :now="today"
                    :value="today"
                    :events="events"
                    color="primary"
                    type="week"
                    ></v-calendar>
                </v-sheet>
                </v-col>
                
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
export default {
    components : {
        Home
    },
    data() {
        
        return {
          
           
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
                today: '2019-01-08',
                events: [
                    {
                    name: 'Weekly Meeting',
                    start: '2019-01-07 09:00',
                    end: '2019-01-07 10:00',
                    },
                    {
                    name: `Thomas' Birthday`,
                    start: '2019-01-10',
                    },
                    {
                    name: 'Mash Potatoes',
                    start: '2019-01-09 12:30',
                    end: '2019-01-09 15:30',
                    },
                ],
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
        }
    },
    
    created(){
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