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
      ]
    }
  },
    mounted() {
        console.log('Dashboard mounted.')
    }
}
</script>