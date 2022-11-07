// let hasiludh = document.getElementById("hasiludh")
// let btn = document.getElementById("btn")
// let form = document.getElementById("form")

let data = [];

const tambah = () => {
    let input = document.getElementById("input").value
    let inputDate = document.getElementById("inputDate").value
    let hasilblm = document.getElementById("hasilblm")

    let hasil = input + "<br>" + inputDate

    data.push(hasil)
    
    hasilblm.innerHTML = [data]


}