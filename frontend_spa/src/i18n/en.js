let data = {
  page_about: {
    sub_slogan: `” ZA SHARE setup fantastic scenes and explorations into life, connecting the diversity of education and culture to be recognized as Asia’s most influential innovation and exhibition brand.”`
  },
  regist_expo: {
    sections: [
      // {
      //   id: 0,
      //   title: "A. Exhibition information",
      //   // questions: [
      //   //   {
      //   //     prop: "type",
      //   //     options: [
      //   //       { label: "Basic booth(width 1m x depth 1m x height 2.5m)", value: "基礎單位 (1m*1m 限高2.5m)"}
      //   //     ]
      //   //   }
      //   // ]
      // }
    ]
  }
}


// 1. Booth type
// ＿＿ Basic booth(width 1m x depth 1m x height 2.5m)
// ＿＿ Standard booth(width 3m x depth 2m x height 2.5m)
// ＿＿ Advanced booth(width 6m x depth 2m x height 2.5m)
// 2. Exhibitor category(The organizer reserves the ultimate right to assign the exhibitor to
// specific categories)
// ＿＿ Education innovation
// ＿＿ Cultural practice
// ＿＿ Life exploration
// ＿＿ Professional training
// 3. Have you participated in Za Share’s past exhibitions ?
// ＿＿ First - timer
// ＿＿ 2015 Naughty Education Fest
// ＿＿ 2016 ZA SHARE EXPO
// ＿＿ 2017 ZA SHARE EXPO

import zh_base from './zh'
let sts = zh_base.regist_expo.sections
sts.forEach(st => {
  let engst = data.regist_expo.sections.find(stt => stt.id == st.id)
  let clone = JSON.parse(JSON.stringify(st))
  if (engst){
    Object.assign(clone, engst)
    Object.assign(engst, clone)
  }else{
    data.regist_expo.sections.push(clone)
  }

})


export default data