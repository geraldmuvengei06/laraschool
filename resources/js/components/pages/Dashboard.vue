<template>
    <div>
        <v-container
        class="fill-height"
        fluid
      >
        <v-row
         
        >
          <v-col
          cols="12"
          md="3"
          sm="6"
          xs="12"
          elevation="10"
           v-for="(card, i) in cards" :key="i">
            <v-card
            :color="card[4]">
                <v-row
                justify="center"
                align="center">
                  <v-col cols="6"
                  align="center"
                  justify="center">
                    <v-icon size="60" class="lighten4" :class="card[0]">{{ card[1] }}</v-icon>
                  </v-col>
                  <v-col cols="6">
                    <p class="display-1" :class="card[0]"><strong>{{ card[2] }}</strong></p>
                    <p class="subtitle-1" :class="card[0]">{{ card[3] }}</p>
                  </v-col>
                </v-row>
            </v-card>
          </v-col>
        </v-row>

        <v-row
        align="center"
        justify="center">
          <v-col
          cols="12"
          lg="6"
          md="8"
          sm="10"
          xs="12"
          >
            <v-chip
            text-color="white"
            class="ma-2"
            color="primary lighten-1">
              <v-avatar
                left
              >
                <v-icon>account_circle</v-icon>
              </v-avatar>
              This Year
            </v-chip>

            <v-chip close
            text-color="white"
            class="ma-2"
            color="secondary lighten-2">
              This Term
              <v-avatar
                right
                class="secondary lighten-2"
              >
                <v-icon>lock</v-icon>
              </v-avatar>
            </v-chip>


            <v-chip close
            text-color="white"
            class="ma-2"
            color="error">
              This Month
              <v-avatar
                color="error"
                right
              >
                <v-icon>iconName</v-icon>
              </v-avatar>

            </v-chip>
            
          </v-col>

          <!-- CHIPS -->

          <v-col
          cols="12"
          lg="10"
          md="10"
          sm="12"
          xs="12"
          >

            <v-card>
              <v-card-title>
                Fee Balances
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
                :items="desserts"
                :search="search"
              >
                <template v-slot:item.calories="{ item }">
                  <v-chip :color="getColor(item.calories)" dark>{{ item.calories }}</v-chip>
                </template>

                <template v-slot:item.actions="{ item }">
                  <v-icon
                    small
                    class="mr-2"
                    @click="editItem(item)"
                  >
                    mdi-pencil
                  </v-icon>
                  <v-icon
                    small
                    @click="deleteItem(item)"
                  >
                    mdi-delete
                  </v-icon>
                </template>
              </v-data-table>
            </v-card>
          </v-col>
          
        </v-row>
      </v-container>
    </div>
</template>

<script>
export default {
  data() {
    return {
      cards: [
        ['white--text darken-1', 'person', '123', 'Students', 'primary'],
        ['white--text darken-1', 'euro', '123k', 'Fees Paid', 'success'],
        ['white--text darken-1', 'euro', '13k', 'Fees Balance', 'warning'],
        ['white--text darken-1', 'dashboard', 'B+', 'Mean Grade', 'purple'],
      ],

        search: '',
        headers: [
          {
            text: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            value: 'name',
          },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' },
          { text: 'Action', value: 'action', sortable: false }
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%',
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1%',
          },
          {
            name: 'Eclair',
            calories: 262,
            fat: 16.0,
            carbs: 23,
            protein: 6.0,
            iron: '7%',
          },
          {
            name: 'Cupcake',
            calories: 305,
            fat: 3.7,
            carbs: 67,
            protein: 4.3,
            iron: '8%',
          },
          {
            name: 'Gingerbread',
            calories: 356,
            fat: 16.0,
            carbs: 49,
            protein: 3.9,
            iron: '16%',
          },
          {
            name: 'Jelly bean',
            calories: 375,
            fat: 0.0,
            carbs: 94,
            protein: 0.0,
            iron: '0%',
          },
          {
            name: 'Lollipop',
            calories: 392,
            fat: 0.2,
            carbs: 98,
            protein: 0,
            iron: '2%',
          },
          {
            name: 'Honeycomb',
            calories: 408,
            fat: 3.2,
            carbs: 87,
            protein: 6.5,
            iron: '45%',
          },
          {
            name: 'Donut',
            calories: 452,
            fat: 25.0,
            carbs: 51,
            protein: 4.9,
            iron: '22%',
          },
          {
            name: 'KitKat',
            calories: 518,
            fat: 26.0,
            carbs: 65,
            protein: 7,
            iron: '6%',
          },
        ],
    }
  },
  methods: {
    getColor(calories){
      if(calories > 400) return "red"
      else if(calories > 200) return "orange"
      else return "green"
    },

    editItem (item){

    },

    deleteItem(item){
      
    }
  },
  mounted() {
      console.log('Dashboard mounted.')
  }
}
</script>