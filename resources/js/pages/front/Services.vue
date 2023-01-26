<template>
    <section id="services">
        <v-container class="my-5">
            <v-row>
                <v-col>1</v-col>
                <v-col>2</v-col>
                <v-col>3</v-col>
            </v-row>
         
        </v-container>
    </section>
</template>
<script>
export default {
    data() {
        return {
            image,
            items : [
                { id: '1', icon: 'mdi-hospital', title : 'Paralysis Disability', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '2', icon: 'mdi-hospital', title : 'Patient of Beding', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '3', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '5', icon: 'mdi-hospital', title : 'Health Laboratory', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '6', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '7', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '4', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  }
            ],
            model : null
        }
    },
}
</script>
<style scoped>
 .flex-padding {
    padding: 20px;
}

</style>