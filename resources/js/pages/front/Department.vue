<template>
    <section id="department">
        <v-container class="my-5">
            <v-row
                class="mb-6"
                no-gutters
            >
                <v-slide-group
                    v-model="model"
                    center-active
                    show-arrows
                >
                    <v-slide-item
                        v-for="item in items"
                        :key="item.id"
                    >
                        <v-flex
                        class="flex-padding"
                        xs12
                        md6
                        lg3
                        >
                            <v-card
                            height="365"
                            width="365"
                            >
                                <v-card-title
                                class="justify-center"
                                >
                                    <v-icon
                                    size="100px"
                                    >
                                    {{ item.icon }}
                                    </v-icon>
                    
                                </v-card-title>
                            </v-card>
                        </v-flex>
                    </v-slide-item>
                </v-slide-group>
            </v-row>
        </v-container>
            <!-- <v-row
                class="mb-6"
                no-gutters
            >
                <v-col
                v-for=" item in items"
                :key="item.id"
                cols="3"

                >
                    <v-card>
                        {{ item.title }}
                        {{ item.description }}
                    </v-card>

                </v-col>
            </v-row> -->
    </section>
</template>
<script>
export default {
    data() {
        return {
            items : [
                { id: '1', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '2', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '3', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
                { id: '5', icon: 'mdi-hospital', title : 'Emergency Care Services', img: '' , description: 'Lorem Ipsum Dolor'  },
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