<template>
    <div>
        <v-container
        class="fill-height"
        fluid
      >
        <v-row
          justify="center"
          align="center"
        >
          <v-col>
            <h4 class="display-1">Settings</h4>
            <div class="text-center">
            <v-btn
              color="blue"
              dark
              @click="sheet = !sheet"
            >
              Open v-model
            </v-btn>
            <v-bottom-sheet v-model="sheet">
              <v-sheet class="text-center" height="200px">
                <v-btn
                  class="mt-6"
                  text
                  color="red"
                  @click="sheet = !sheet"
                >close</v-btn>
                <div class="py-3">This is a bottom sheet using the controlled by v-model instead of activator</div>
              </v-sheet>
            </v-bottom-sheet>
          </div>
          </v-col>
        </v-row>
      </v-container>
    </div>
</template>

<script>
export default {
    data() {
      return {
        sheet: false,
      }
    },
    mounted() {
        console.log('Settings mounted.')
    }
}
</script>