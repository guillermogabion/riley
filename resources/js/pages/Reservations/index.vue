<template>
    <div>
       <v-card>
        <v-card-title>
        Reservations
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

        <!-- <template v-slot:item.status = "{item}">
                
        </template> -->
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
                { text: 'Celebration', value: 'event_type' },
                { text: 'Event Theme', value: 'price' },
                { text: 'Start Date', value: 'start_date' },
                { text: 'End Date', value: 'end_date' },
                { text: 'Package', value: 'package' },
                { text: 'Dish', value: 'dish' },
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