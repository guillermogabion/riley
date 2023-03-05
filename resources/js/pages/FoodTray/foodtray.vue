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
        :loading="loading"
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
                { text: 'Contact', value: 'contact' },
                { text: 'Order', value: 'order' },
                { text: 'Quantity', value: 'quantity' },
                { text: 'Price', value: 'price' },
                {text: 'Total', value: 'total'},
                { text: 'Status', value: 'status' },
            ],
            reserve: [],
            search: '',
            loading: true
        }
    },

    
    methods: {
        showAll(){
            axios.get('getTray').then(response => {
                console.log(response.data)
                this.loading = false
                this.reserve = response.data
            })
        },
        status(item){
            axios.put('trayStatus/' + item.id).then(response => {
                this.loading = true
                this.showAll()
                console.log(response.data)
            })
        }
    },
    mounted() {
        this.showAll()
    }
}

</script>