
export default {
  preload_all: function (array_img) {
    let promises = array_img.map(url => {
      return new Promise((resolve, reject) => {
        let i = new Image()
        i.onload = function () {
          // console.log("loaded")
          resolve("ok")
          console.log(url)
        }
        i.src = url
      })
    })
    return Promise.all(promises)
  }
}