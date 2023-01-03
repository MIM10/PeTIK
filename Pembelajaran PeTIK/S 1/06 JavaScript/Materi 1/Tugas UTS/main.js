let form = document.getElementById("form")
let input = document.getElementById("input")
let inputDate = document.getElementById("inputDate")
let hasilblm = document.getElementById("hasilblm")
let hasiludh = document.getElementById("hasiludh")
let btn = document.getElementById("btn")

form.addEventListener("submit", (e) => {
    e.preventDefault();
    formValidation();
});

let formValidation = () => {
    if (input.value === "") {
        console.log("failure");
        alert("Gaboleh Kosong")
    } else if (inputDate.value === "") {
        console.log("failure");
        alert("Gaboleh Kosong")
    } else {
        console.log("success");
        acceptData();
    }
};

let data = [];

let acceptData = () => {
    data.push({
        text: input.value,
        date: inputDate.value,
        status: "Belum"
    });

    localStorage.setItem("data", JSON.stringify(data));

    console.log(data);

    createTasks()
};

let createTasks = () => {
    hasilblm.innerHTML = "";
    hasiludh.innerHTML = "";
    data.map((x, y) => {
        if (x.status === "Belum") {
            return (hasilblm.innerHTML += `
            <div class="isi-hasilblm" id=${y}>
                <div class="isi-hasilblm1">
                    <p class="fw-bold">${x.text}</p>
                    <p class="small text-secondary">${x.date}</p>
                </div>
    
                <!-- make icon check and trash -->
                <div class="isi-hasilblm2">
                    <p onClick="completeTask(this);createTasks()" id="iconUdh"><img class="img1" src="check-solid.svg" alt=""></p>
    
                    <p onClick="deleteTask(this)"><img class="img1" src="trash-solid.svg" alt=""></p>
                </div>
            </div>
            `);
        } else {
            return (hasiludh.innerHTML += `
            <div class="isi-hasilblm" id=${y}>
                <div class="isi-hasilblm1">
                    <p class="fw-bold">${x.text}</p>
                    <p class="small text-secondary">${x.date}</p>
                </div>
    
                <!-- make icon check and trash -->
                <div class="isi-hasilblm2">
                    <p onClick="completeTask(this);createTasks()" id="iconUdh"><img class="img1" src="rotate-solid.svg" alt=""></p>
    
                    <p onClick="deleteTask(this)"><img class="img1" src="trash-solid.svg" alt=""></p>
                </div>
            </div>
            `);
        }
    });

    resetForm();
};

let resetForm = () => {
    input.value = "";
    inputDate.value = "";
};

let deleteTask = (e) => {
    e.parentElement.parentElement.remove();

    data.splice(e.parentElement.parentElement.id, 1);

    localStorage.setItem("data", JSON.stringify(data));

    console.log(data);
};

let completeTask = (e) => {
	e.parentElement.parentElement.remove();
	let stat = data[e.parentElement.parentElement.id].status;
	if (stat == "Belum") {
		data[e.parentElement.parentElement.id].status = "Sudah";
	} else {
		data[e.parentElement.parentElement.id].status = "Belum";
	}
	localStorage.setItem("data", JSON.stringify(data));
};

(() => {
    data = JSON.parse(localStorage.getItem("data")) || [];
    console.log(data);
    createTasks();
})();