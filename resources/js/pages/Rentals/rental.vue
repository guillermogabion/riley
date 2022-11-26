<template>
    <div>
       <v-card>
        <v-card-title>
        Rentals
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
        :items="rentals"
        :search="search"
        >
        </v-data-table>
       </v-card>
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
                { text: 'Rents', value: 'supply' },
                { text: 'Quantity', value: 'quantity' },
                { text: 'Start Date', value: 'start_date' },
                { text: 'End Date', value: 'end_date' },
                { text: 'Status', value: 'status' },
            ],
            reserve: [],
        }
    },

    
    methods: {
        showAll(){
            axios.get('show').then(response => {
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