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
                value: 'users.fullname',
                },
                { text: 'Rents', value: 'supply_name' },
                { text: 'Quantity', value: 'quantity' },
                { text: 'Status', value: 'status' },
            ],
            rentals: [],
            search: '',
        }
    },
    mounted(){
        this.showAll()
    },  
    
    methods: {
        showAll(){
            axios.get('shows').then(response => {
                console.log(response.data)
                this.rentals = response.data
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