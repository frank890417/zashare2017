<template lang="pug">
  div.svg_inline(v-html="svg_html", style="width: 100%;height: 100%;")
</template>


<script>
import axios from 'axios'
  export default {
    props: ["src"],
    data(){
      return {
        svg_html: ""
      }
    },
    mounted(){
      axios.get(this.src).then((r)=>{
        console.log(r)
        this.svg_html=r.data
      })
    }
  }
</script>

<style lang="sass?indentedSyntax">

=to_cen
  transform-origin: center

@mixin waving($panx:0px,$pany:0px,$rot:0deg)

  $kfname: waving_#{$panx}_#{$pany}_#{$rot}
  @if ($rot!=0deg)
    $kfname: waving_#{$panx}_#{$pany}_#{$rot}
  @else if ($pany!=0px)
    $kfname: waving_#{$panx}_#{$pany}
  @else 
    $kfname: waving_#{$panx}

  @keyframes #{$kfname}
    0%
      transform: rotate(-$rot/2) translateX($panx/2) translateY($pany/2)
      -webkit-transform: rotate(-$rot/2) translateX($panx/2) translateY($pany/2)
    50%
      transform: rotate($rot/2) translateX(-$panx/2) translateY(-$pany/2)
      -webkit-transform: rotate($rot/2) translateX(-$panx/2) translateY(-$pany/2)
    100%
      transform: rotate(-$rot/2) translateX($panx/2) translateY($pany/2)
      -webkit-transform: rotate(-$rot/2) translateX($panx/2) translateY($pany/2)

@keyframes display_ani
  0%,79%
    opacity: 0
  80%
    opacity: 1
  81,100%
    opacity: 0

@keyframes op_ani
  0%
    opacity: 0
  40%,60%
    opacity: 1
  100%
    opacity: 0


@mixin nth_random($n,$dur: 5s)
  @for $i from 1 through $n
    &:nth-of-type(#{$i})
      animation-delay: random()*$dur
      @content
// .d88cf9a9-842d-4ea9-a0c9-29e95fc7f5a0 
//   +waving(20px)
//   animation: waving_20px 4s infinite
//   &:nth-of-type(3)
//     animation-delay: 1s
//   +nth_random(20)

[data-name="plannet_normal"]
  [data-name="bird"]
    +waving(42px,45px)
    // display: none
    animation: waving_42px_45px 8s infinite
    +to_cen
    // +nth_random(50)
    // &:nth-of-type(3)
      // display: none

  [data-name="monster"]
    +waving(-10px,-5px,-5deg)
    animation: waving_-10px_-5px_-5deg 2s infinite
    +to_cen

  +waving(0px,0px,7deg)
  @for $i from 1 through 10
    [data-name="tree#{$i}"]
      transform-origin: 50% 100%
      animation: waving_0px_0px_7deg 4s #{random(4)*-0.4}s infinite

  +waving(0px,20px,5deg) 
  @for $i from 1 through 3
    [data-name="rock#{$i}"]
      transform-origin: 50% 100%
      animation: waving_0px_20px_5deg 4s #{random(10)*-0.4}s infinite
  
[data-name="plannet_ink"]
  +waving(0px,20px,3deg)
  @for $i from 1 through 10
    [data-name="book#{$i}"]
      transform-origin: 50% 100%
      animation: waving_0px_20px_3deg 4s #{random(10)*-$i}s infinite
  @for $i from 1 through 4
    [data-name="ink#{$i}"]
      transform-origin: 50% 100%
      animation: waving_0px_20px_3deg 4s #{random(10)*-$i}s infinite
  +waving(15px,0px,2deg)
  @for $i from 1 through 4
    [data-name="pen#{$i}"]
      transform-origin: 50% 100%
      animation: waving_15px_0px_2deg 1s #{random(5)*-0.1}s infinite


[data-name="planet_pencil"]
  +waving(0px,30px,3deg)
  @for $i from 1 through 10
    [data-name="lt#{$i}"]
      transform-origin: 50% 100%
      animation: waving_0px_30px_3deg 4s #{random(10)*-$i}s infinite

  +waving(10px,5px,1deg)
  [data-name="pencil"]
    transform-origin: 50% 100%
    animation: waving_10px_5px_1deg 8s #{random(10)}s infinite

  +waving(0px,0px,20deg)
  [data-name="eyes"]
    transform-origin: 50% 50%
    animation: waving_0px_0px_20deg 10s #{random(5)}s infinite


[data-name="planet_music"]
  +waving(0px,15px)
  @for $i from 1 through 5
    [data-name="cir#{$i}"]
      animation: waving_0px_15px 4s #{$i*-0.4}s infinite

  +waving(5px,20px,4deg)
  @for $i from 1 through 10
    [data-name="m#{$i}"]
      animation: waving_5px_20px_4deg 4s #{$i*-0.4}s infinite


[data-name="planet_station"]
  +waving(0px,30px)
  @for $i from 1 through 15
    [data-name="light#{$i}"]
      animation: waving_0px_30px 4s #{$i*-0.4}s infinite

  +waving(5px,20px,4deg)
  @for $i from 1 through 10
    [data-name="m#{$i}"]
      animation: waving_5px_20px_4deg 4s #{$i*-0.4}s infinite
  [data-name="paper"]
    animation: waving_0px_30px 3s -1s infinite
  [data-name="target"]
    animation: waving_0px_30px 3s -2s infinite
  [data-name="eye"]
    animation: waving_0px_30px 3s -3s infinite
    

[data-name="planet_elec"]
  
  [data-name="cloud"]
    animation: waving_0px_30px 4s infinite

  +waving(5px,20px,4deg)

  @for $i from 1 through 10
    [data-name="m#{$i}"]
      animation: waving_5px_20px_4deg 4s #{$i*-0.4}s infinite
  [data-name="paper"]
    animation: waving_0px_30px 3s -1s infinite
  [data-name="target"]
    animation: waving_0px_30px 3s -2s infinite
  [data-name="eye"]
    animation: waving_0px_30px 3s -3s infinite
    

  @for $i from 1 through 10
    [data-name="cir#{$i}"]
      animation: op_ani 4s #{$i*0.5}s infinite

  
  @for $i from 1 through 10
    [data-name="p#{$i}"]
      animation: display_ani 4s #{$i*0.8}s infinite

[data-name="planet_play"]
  +waving(0px,0px,10deg) 
  transform-origin: 50% 50%
  animation: waving_0px_0px_10deg 10s -3s infinite


  [data-name="baby1"]
    transform-origin: 50% 50%
    animation: waving_5px_20px_4deg 3s -3s infinite
    
  [data-name="baby2"]
    transform-origin: 50% 50%
    animation: waving_5px_20px_4deg 3s -3s infinite

  [data-name="baby3"]
    transform-origin: 50% 50%
    animation: waving_5px_20px_4deg 3s -3s infinite

  +waving(5px,2px,20deg)
  [data-name="horse"]
    transform-origin: 50% 50%
    animation: waving_5px_2px_20deg 4s -3s infinite

  +waving(5px,0px,20deg)
  [data-name="bell"]
    transform-origin: 100% 50%
    animation: waving_5px_0px_20deg 4s -3s infinite

  +waving(5px,0px,30deg)
  [data-name="bell_inner"]
    transform-origin: 100% 100%
    animation: waving_5px_0px_30deg 2s -3s infinite



[data-name="planet_sweet"]
  +waving(0px,0px,5deg) 
  transform-origin: 50% 50%
  animation: waving_0px_0px_5deg 20s -3s infinite

  +waving(5px,20px,4deg)

  @for $i from 1 through 10
    [data-name="light#{$i}"]
      animation: waving_5px_20px_4deg 4s #{$i*-0.4}s infinite

  +waving(0px,5px)
  @for $i from 1 through 10
    [data-name="hand#{$i}f"],[data-name="hand#{$i}b"]
      animation: waving_0px_5px 4s #{$i*-0.4}s infinite

  +waving(35px)
  [data-name="car"]
    animation: waving_35px 4s 1s infinite




[data-name="planet_car"]
  +waving(0px,0px,5deg) 
  transform-origin: 50% 50%
  animation: waving_0px_0px_5deg 20s -3s infinite

  +waving(40px)

  @for $i from 1 through 3
    [data-name="car#{$i}"]
      animation: waving_40px 4s #{$i*-0.4}s infinite

  +waving(80px)
  [data-name="bus"]
    animation: waving_80px 10s 1s infinite
  +waving(40px)
  [data-name="bicycle"]
    animation: waving_40px 10s 1s infinite

  +waving(0px,0px,20deg)
  @for $i from 1 through 5
    [data-name="hand#{$i}"],
    [data-name="hand#{$i}_1"],
    [data-name="hand#{$i}_2"]
      animation: waving_0px_0px_20deg 4s #{$i*-0.4}s infinite

  [data-name="hand1"]
    transform-origin: 0% 100%
  [data-name="hand2"]
    transform-origin: 100% 50%
  [data-name="hand3_2"]
    transform-origin: 100% 0%
  [data-name="hand3_1"]
    transform-origin: 100% 50%

</style>