<template>
    <v-card>
      <v-card-title>
        Users
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
        :items="users"
        :search="search"
      >
    </v-data-table>
    </v-card>
  </template>
  <script>
  import axios from '../../plugins/axios'
  export default {
    data () {
      return {
        search: '',
        headers: [
          {
            text: 'Firstname',
            align: 'start',
            sortable: false,
            value: 'first_name',
          },
          { text: 'Lastname', value: 'last_name' },
          { text: 'Address', value: 'address' },
          { text: 'Contact', value: 'contact' },
          { text: 'email', value: 'email' },
          { text: 'Actions', value: 'actions' },
        ],
        users: [],
      }
    },
    mounted(){
        this.show()
    },
    methods: {
        show(){
            axios.get('search').then(response => {
                console.log(response.data)
                this.users = response.data
            })
        }
    }
  }
</script>