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
        :loading="loading"
        >
        <template v-slot:item.status="{ item }">
        <v-btn
        icon
        @click="status(item)"
        >
        <v-icon
        v-if="(item.status == 1)"
        >
         mdi-checkbox-marked-circle
        </v-icon>
        <v-icon
        v-else
        >
         mdi-close-circle
        </v-icon>
        </v-btn>
       
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
                { text: 'Rents', value: 'supply_name' },
                { text: 'Quantity', value: 'quantity' },
                { text: 'Status', value: 'status' },
            ],
            rentals: [],
            search: '',
            loading : true
        }
    },
    mounted(){
        this.showAll()
    },  
    
    methods: {
        showAll(){
            axios.get('shows').then(response => {
                console.log(response.data)
                this.loading = false
                this.rentals = response.data
            })
        },
        status(item){
            axios.put('statusRent/' + item.id).then(response => {
                console.log(response.data)
                this.loading = true
                this.showAll()
            })
        }
    },
    mounted() {
        this.showAll()
    }
}

</script>