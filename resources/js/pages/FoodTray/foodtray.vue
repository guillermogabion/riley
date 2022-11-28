<template>
    <div>
        <div>
       <v-card>
        <v-card-title>
        Food Tray Orders
        <v-spacer></v-spacer>
        <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
        ></v-text-field>
        </v-card-title>
        <v-data-table
        :headers="headers"
        :items="reserve"
        :search="search"
        >
        </v-data-table>
       </v-card>
    </div>
    </div>
</template>
<script>
import axios from '../../plugins/axios'
export default {
    data () {
        return {
            headers: [
                {
                text: 'Name',
                align: 'start',
                sortable: false,
                value: 'name',
                },
                { text: 'Order', value: 'order' },
                { text: 'Quantity', value: 'quantity' },
                { text: 'Price', value: 'price' },
                { text: 'Quantity', value: 'quantity' },
                {text: 'Total', value: 'total'},
                { text: 'Status', value: 'status' },
            ],
            reserve: [],
            search: ''
        }
    },

    
    methods: {
        showAll(){
            axios.get('getTray').then(response => {
                console.log(response.data)
                this.reserve = response.data
            })
        },
        status(){
            axios.put('statusReserve' + this.payload.id).then(response => {
                console.log(response.data)
            })
        }
    },
    mounted() {
        this.showAll()
    }
}

</script>