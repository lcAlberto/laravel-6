<template>
  <div class="card">
    <div class="card-header">
      dkxfdlk
    </div>
    <div class="card-body">
      <div class="background" id="editor-area">
        <drr
          class="draggable"
          style="background-color: #000000"
          :x="x"
          :y="y"
          :w="w"
          :h="h"
          :angle="angle"
          :outer-bound="limit"
          :hasActiveContent="true"
          @change="itemChange"
          :aspectRatio="true">
        </drr>
        x: {{x}}
        y: {{y}}
      </div>
    </div>
  </div>
</template>

<script>
import drr from '@minogin/vue-drag-resize-rotate'

export default {
  name: "editor-area",
  components: {
    drr
  },

  data() {
    return {
      x: 300,
      y: 300,
      w: 100,
      h: 100,
      angle: 0,
      limit: undefined
    }
  },

  mounted() {
    let element = $(`#editor-area`);
    if (element && element.length > 0) {
      console.log(element.width)
      let elementCenterX = (element.width() / 2);
      let elementCenterY = (element.height() / 2);
      console.log({
        x: elementCenterX,
        y: elementCenterY,
        w: element.width(),
        h: element.height(),
      })
      this.limit = {
        x: elementCenterX,
        y: elementCenterY,
        w: element.width(),
        h: element.height(),
      };
    }
  },

  methods: {
    itemChange(event) {
      this.x = event.x
      this.y = event.y
      this.w = event.w
      this.h = event.h
      this.angle = event.angle
    },
  }
}
</script>

<style scoped>
.background {
  background-color: #4f7cfd;
  width: 90%;
  height: 80vh;
  padding: 0;
  position: absolute;
}

.draggable{
  position: absolute;
  margin: 0;
  padding: 0;
  background-color: #18181c;
}
</style>
