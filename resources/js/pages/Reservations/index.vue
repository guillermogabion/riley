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

        <template v-slot:item.status="{ item }">
        <v-switch
            color="primary"
            v-model="item.status"
            @click="status(item)"
            ></v-switch>
        </template>
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
                { text: 'Event Theme', value: 'event_theme' },
                { text: 'Start Date', value: 'start' },
                { text: 'End Date', value: 'end' },
                { text: 'Package', value: 'package' },
                { text: 'Dish', value: 'dish' },
                { text: 'Status', value: 'status' },
            ],
            reserve: [],
            search: '',
        }
    },

    
    methods: {
        showAll(){
            axios.get('show').then(response => {
                console.log(response.data)
                this.reserve = response.data
            })
        },
        status(item){
            axios.put('statusReserve/' + item.id).then(response => {
                console.log(response.data)
            })
        }
    },
    mounted() {
        this.showAll()
    }
}

</script>